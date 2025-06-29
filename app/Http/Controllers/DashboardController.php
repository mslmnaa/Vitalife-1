<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        // Remove auth middleware to allow public access
        // We'll handle authentication logic inside the method
    }

    public function index(): View
    {
        $user = auth()->user();
        
        // Get vouchers (available for both authenticated and guest users)
        $vouchers = Voucher::where(function ($query) {
                $query->whereNull('expired_at')
                      ->orWhere('expired_at', '>', Carbon::now());
            })
            ->where(function ($query) {
                $query->where('is_used', false)
                      ->orWhereNull('usage_limit')
                      ->orWhereRaw('usage_count < usage_limit');
            })
            ->orderBy('created_at', 'desc')
            ->get();

        // Additional data for authenticated users
        $dashboardData = [];
        
        if ($user) {
            $dashboardData = $this->getAuthenticatedUserData($user);
        } else {
            $dashboardData = $this->getGuestUserData();
        }

        return view('dashboard', array_merge([
            'user' => $user,
            'vouchers' => $vouchers,
        ], $dashboardData));
    }

    /**
     * Get data for authenticated users
     */
    private function getAuthenticatedUserData($user): array
    {
        // Check if user logged in via Google
        $isGoogleUser = !empty($user->google_id);
        
        // Get user statistics
        $userStats = [
            'total_transactions' => $this->getUserTransactionCount($user->id),
            'total_spent' => $this->getUserTotalSpent($user->id),
            'active_vouchers' => $this->getUserActiveVouchers($user->id),
            'last_login' => $user->last_login_at,
            'is_google_user' => $isGoogleUser,
            'account_verified' => !empty($user->email_verified_at),
        ];

        // Get recent activities
        $recentActivities = $this->getUserRecentActivities($user->id);

        // Get personalized recommendations
        $recommendations = $this->getPersonalizedRecommendations($user);

        return [
            'user_stats' => $userStats,
            'recent_activities' => $recentActivities,
            'recommendations' => $recommendations,
            'welcome_message' => $this->getWelcomeMessage($user, $isGoogleUser),
        ];
    }

    /**
     * Get data for guest users
     */
    private function getGuestUserData(): array
    {
        return [
            'featured_medicines' => $this->getFeaturedMedicines(),
            'upcoming_events' => $this->getUpcomingEvents(),
            'popular_specialists' => $this->getPopularSpecialists(),
            'guest_message' => 'Selamat datang! Silakan login untuk mengakses fitur lengkap.',
        ];
    }

    /**
     * Get user transaction count
     */
    private function getUserTransactionCount($userId): int
    {
        // Assuming you have a transactions table
        try {
            return DB::table('transactions')
                ->where('user_id', $userId)
                ->count();
        } catch (\Exception $e) {
            return 0;
        }
    }

    /**
     * Get user total spent
     */
    private function getUserTotalSpent($userId): float
    {
        try {
            return DB::table('transactions')
                ->where('user_id', $userId)
                ->where('status', 'completed')
                ->sum('total_amount') ?? 0;
        } catch (\Exception $e) {
            return 0;
        }
    }

    /**
     * Get user active vouchers
     */
    private function getUserActiveVouchers($userId): int
    {
        try {
            return DB::table('user_vouchers')
                ->where('user_id', $userId)
                ->where('is_used', false)
                ->where(function ($query) {
                    $query->whereNull('expired_at')
                          ->orWhere('expired_at', '>', Carbon::now());
                })
                ->count();
        } catch (\Exception $e) {
            return 0;
        }
    }

    /**
     * Get user recent activities
     */
    private function getUserRecentActivities($userId): array
    {
        $activities = [];
        
        try {
            // Get recent transactions
            $recentTransactions = DB::table('transactions')
                ->where('user_id', $userId)
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get(['id', 'type', 'amount', 'status', 'created_at']);

            foreach ($recentTransactions as $transaction) {
                $activities[] = [
                    'type' => 'transaction',
                    'description' => "Transaksi {$transaction->type} sebesar Rp " . number_format($transaction->amount),
                    'date' => Carbon::parse($transaction->created_at),
                    'status' => $transaction->status,
                ];
            }

            // Get recent chat sessions
            $recentChats = DB::table('payments')
                ->where('user_id', $userId)
                ->where('payment_type', 'consultation')
                ->orderBy('created_at', 'desc')
                ->limit(3)
                ->get(['id', 'amount', 'status', 'created_at']);

            foreach ($recentChats as $chat) {
                $activities[] = [
                    'type' => 'consultation',
                    'description' => "Konsultasi dengan dokter spesialis",
                    'date' => Carbon::parse($chat->created_at),
                    'status' => $chat->status,
                ];
            }

            // Sort by date
            usort($activities, function ($a, $b) {
                return $b['date']->timestamp - $a['date']->timestamp;
            });

            return array_slice($activities, 0, 8);
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * Get personalized recommendations
     */
    private function getPersonalizedRecommendations($user): array
    {
        $recommendations = [];

        try {
            // Recommend based on user's previous purchases or interests
            if ($user->google_id) {
                $recommendations[] = [
                    'type' => 'feature',
                    'title' => 'Sinkronisasi Google',
                    'description' => 'Akun Anda terhubung dengan Google untuk kemudahan akses',
                    'action' => 'Kelola Profil',
                    'url' => route('profile.edit'),
                ];
            }

            // Health recommendations
            $recommendations[] = [
                'type' => 'health',
                'title' => 'Konsultasi Kesehatan',
                'description' => 'Chat dengan dokter spesialis untuk konsultasi kesehatan',
                'action' => 'Mulai Konsultasi',
                'url' => route('spesialis'),
            ];

            // Medicine recommendations
            $recommendations[] = [
                'type' => 'medicine',
                'title' => 'Obat Terpopuler',
                'description' => 'Lihat koleksi obat-obatan yang tersedia',
                'action' => 'Lihat Obat',
                'url' => route('user.medicines.index'),
            ];

            return $recommendations;
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * Get welcome message based on user type
     */
    private function getWelcomeMessage($user, $isGoogleUser): string
    {
        $timeOfDay = $this->getTimeOfDay();
        $greeting = "Selamat {$timeOfDay}";
        
        if ($isGoogleUser) {
            return "{$greeting}, {$user->name}! Senang melihat Anda kembali. Akun Google Anda berhasil terhubung.";
        }
        
        return "{$greeting}, {$user->name}! Selamat datang kembali di platform kesehatan kami.";
    }

    /**
     * Get time of day for greeting
     */
    private function getTimeOfDay(): string
    {
        $hour = Carbon::now()->hour;
        
        if ($hour < 12) {
            return 'pagi';
        } elseif ($hour < 15) {
            return 'siang';
        } elseif ($hour < 18) {
            return 'sore';
        } else {
            return 'malam';
        }
    }

    /**
     * Get featured medicines for guest users
     */
    private function getFeaturedMedicines(): array
    {
        try {
            return DB::table('medicines')
                ->where('is_active', true)
                ->where('stock', '>', 0)
                ->orderBy('popularity', 'desc')
                ->limit(6)
                ->get(['id', 'name', 'price', 'image', 'description'])
                ->toArray();
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * Get upcoming events for guest users
     */
    private function getUpcomingEvents(): array
    {
        try {
            return DB::table('events')
                ->where('event_date', '>', Carbon::now())
                ->where('is_active', true)
                ->orderBy('event_date', 'asc')
                ->limit(3)
                ->get(['id', 'title', 'event_date', 'description', 'image'])
                ->toArray();
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * Get popular specialists for guest users
     */
    private function getPopularSpecialists(): array
    {
        try {
            return DB::table('spesialis')
                ->where('is_active', true)
                ->orderBy('rating', 'desc')
                ->limit(4)
                ->get(['id_spesialis', 'nama', 'spesialisasi', 'harga', 'foto', 'rating'])
                ->toArray();
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * Get website usage data for admin dashboard
     */
    public function getWebsiteUsageData(Request $request)
    {
        try {
            // Daily active users
            $dailyActiveUsers = User::whereDate('last_login_at', Carbon::today())->count();
            
            // Weekly active users
            $weeklyActiveUsers = User::whereBetween('last_login_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ])->count();
            
            // Monthly active users
            $monthlyActiveUsers = User::whereMonth('last_login_at', Carbon::now()->month)
                ->whereYear('last_login_at', Carbon::now()->year)
                ->count();

            // Google OAuth users
            $googleUsers = User::whereNotNull('google_id')->count();
            $totalUsers = User::count();
            $googleUserPercentage = $totalUsers > 0 ? round(($googleUsers / $totalUsers) * 100, 2) : 0;

            // Recent registrations
            $recentRegistrations = User::whereDate('created_at', '>=', Carbon::now()->subDays(7))
                ->count();

            // User growth data for chart
            $userGrowthData = [];
            for ($i = 6; $i >= 0; $i--) {
                $date = Carbon::now()->subDays($i);
                $userGrowthData[] = [
                    'date' => $date->format('Y-m-d'),
                    'users' => User::whereDate('created_at', $date)->count(),
                    'google_users' => User::whereDate('created_at', $date)
                        ->whereNotNull('google_id')->count(),
                ];
            }

            return response()->json([
                'daily_active_users' => $dailyActiveUsers,
                'weekly_active_users' => $weeklyActiveUsers,
                'monthly_active_users' => $monthlyActiveUsers,
                'google_users' => $googleUsers,
                'google_user_percentage' => $googleUserPercentage,
                'recent_registrations' => $recentRegistrations,
                'user_growth_data' => $userGrowthData,
                'total_users' => $totalUsers,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Unable to fetch website usage data',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get dashboard statistics for authenticated users
     */
    public function getUserDashboardStats(Request $request)
    {
        $user = auth()->user();
        
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        try {
            $stats = [
                'profile_completion' => $this->calculateProfileCompletion($user),
                'account_security' => $this->calculateAccountSecurity($user),
                'activity_score' => $this->calculateActivityScore($user),
                'recommendations_count' => count($this->getPersonalizedRecommendations($user)),
            ];

            return response()->json($stats);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Unable to fetch user stats',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Calculate profile completion percentage
     */
    private function calculateProfileCompletion($user): int
    {
        $fields = ['name', 'email', 'avatar', 'phone', 'address'];
        $completed = 0;
        
        foreach ($fields as $field) {
            if (!empty($user->$field)) {
                $completed++;
            }
        }
        
        return round(($completed / count($fields)) * 100);
    }

    /**
     * Calculate account security score
     */
    private function calculateAccountSecurity($user): int
    {
        $score = 0;
        
        // Email verified
        if ($user->email_verified_at) $score += 25;
        
        // Has password (not just Google OAuth)
        if ($user->password && !empty($user->password)) $score += 25;
        
        // Google OAuth connected
        if ($user->google_id) $score += 25;
        
        // Recent login activity
        if ($user->last_login_at && $user->last_login_at->diffInDays() < 7) $score += 25;
        
        return $score;
    }

    /**
     * Calculate user activity score
     */
    private function calculateActivityScore($user): int
    {
        $score = 0;
        
        try {
            // Recent transactions
            $recentTransactions = DB::table('transactions')
                ->where('user_id', $user->id)
                ->where('created_at', '>=', Carbon::now()->subDays(30))
                ->count();
            
            if ($recentTransactions > 0) $score += 30;
            if ($recentTransactions > 5) $score += 20;
            
            // Profile updates
            if ($user->updated_at && $user->updated_at->diffInDays() < 30) $score += 25;
            
            // Login frequency
            if ($user->last_login_at && $user->last_login_at->diffInDays() < 7) $score += 25;
            
        } catch (\Exception $e) {
            // If tables don't exist, return basic score
            $score = 50;
        }
        
        return min($score, 100);
    }
}
