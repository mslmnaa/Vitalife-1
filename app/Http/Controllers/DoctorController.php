<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Models\Spesialis;
use App\Models\User;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        // Pastikan hanya dokter yang bisa mengakses
        if ($user->role !== 'dokter') {
            abort(403, 'Unauthorized');
        }

        // Ambil spesialisasi dokter berdasarkan user_id
        $specialist = Spesialis::where('user_id', $user->id)->first();
        
        if (!$specialist) {
            // Jika dokter belum memiliki profil spesialis
            return view('doctor.dashboard', [
                'specialist' => null,
                'totalPatients' => 0,
                'pendingPayments' => 0,
                'totalEarnings' => 0,
                'unreadMessages' => 0,
                'recentPatients' => collect(),
                'monthlyStats' => collect()
            ]);
        }

        // Total pasien yang pernah konsultasi ke dokter ini
        $totalPatients = Payment::where('specialist_id', $specialist->id_spesialis)
            ->whereNotNull('user_id')
            ->distinct('user_id')
            ->count('user_id');

        // Pembayaran yang masih pending
        $pendingPayments = Payment::where('specialist_id', $specialist->id_spesialis)
            ->where('status', 'pending')
            ->count();

        // Total pendapatan dari pembayaran yang confirmed
        $totalEarnings = Payment::where('specialist_id', $specialist->id_spesialis)
            ->where('status', 'confirmed')
            ->sum('total_amount'); // Menggunakan total_amount sesuai skema

        // Pesan belum dibaca oleh dokter (receiver_id = user_id dokter)
        $unreadMessages = Chat::whereHas('payment', function($query) use ($specialist) {
                $query->where('specialist_id', $specialist->id_spesialis);
            })
            ->where('receiver_id', $user->id)
            ->where('is_read', false)
            ->count();

        // Pasien terbaru (5 terakhir)
        $recentPatients = Payment::with('user')
            ->where('specialist_id', $specialist->id_spesialis)
            ->whereNotNull('user_id')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Statistik bulanan pasien dan pendapatan
        $monthlyStats = Payment::selectRaw('MONTH(created_at) as month, COUNT(DISTINCT user_id) as total_patients, SUM(total_amount) as total_earnings')
            ->where('specialist_id', $specialist->id_spesialis)
            ->where('status', 'confirmed')
            ->whereNotNull('user_id')
            ->whereYear('created_at', date('Y')) // Hanya tahun ini
            ->groupByRaw('MONTH(created_at)')
            ->orderBy('month', 'asc')
            ->get();

        return view('doctor.dashboard', compact(
            'specialist',
            'totalPatients',
            'pendingPayments',
            'totalEarnings',
            'unreadMessages',
            'recentPatients',
            'monthlyStats'
        ));
    }

    public function patients()
    {
        $user = Auth::user();
        $specialist = Spesialis::where('user_id', $user->id)->first();
        
        if (!$specialist) {
            return redirect()->route('doctor.dashboard')->with('error', 'Profil spesialis tidak ditemukan');
        }

        $patients = Payment::with('user')
            ->where('specialist_id', $specialist->id_spesialis)
            ->whereNotNull('user_id')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('doctor.patients', compact('patients', 'specialist'));
    }

    public function patientDetail($paymentId)
    {
        $user = Auth::user();
        $specialist = Spesialis::where('user_id', $user->id)->first();
        
        $payment = Payment::with('user')
            ->where('id', $paymentId)
            ->where('specialist_id', $specialist->id_spesialis)
            ->firstOrFail();

        return view('doctor.patient-detail', compact('payment', 'specialist'));
    }

    public function chats()
    {
        $user = Auth::user();
        $specialist = Spesialis::where('user_id', $user->id)->first();
        
        if (!$specialist) {
            return redirect()->route('doctor.dashboard')->with('error', 'Profil spesialis tidak ditemukan');
        }

        // Ambil daftar chat berdasarkan payment yang terkait dengan dokter
        $chatSessions = Payment::with(['user', 'chats' => function($query) {
                $query->orderBy('created_at', 'desc')->take(1);
            }])
            ->where('specialist_id', $specialist->id_spesialis)
            ->whereHas('chats')
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('doctor.chats', compact('chatSessions', 'specialist'));
    }

    public function chatDetail($paymentId)
    {
        $user = Auth::user();
        $specialist = Spesialis::where('user_id', $user->id)->first();
        
        $payment = Payment::with(['user', 'chats'])
            ->where('id', $paymentId)
            ->where('specialist_id', $specialist->id_spesialis)
            ->firstOrFail();

        // Mark messages as read
        Chat::where('payment_id', $paymentId)
            ->where('receiver_id', $user->id)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        $chats = $payment->chats()->orderBy('created_at', 'asc')->get();

        return view('doctor.chat-detail', compact('payment', 'chats', 'specialist'));
    }

    public function sendMessage(Request $request, $paymentId)
    {
        $user = Auth::user();
        $specialist = Spesialis::where('user_id', $user->id)->first();
        
        $payment = Payment::where('id', $paymentId)
            ->where('specialist_id', $specialist->id_spesialis)
            ->firstOrFail();

        $request->validate([
            'message' => 'required|string'
        ]);

        Chat::create([
            'payment_id' => $paymentId,
            'sender_id' => $user->id,
            'receiver_id' => $payment->user_id,
            'message' => $request->message,
            'is_read' => false
        ]);

        return redirect()->back()->with('success', 'Pesan berhasil dikirim');
    }

    public function profile()
    {
        $user = Auth::user();
        $specialist = Spesialis::where('user_id', $user->id)->first();

        return view('doctor.profile', compact('specialist'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $specialist = Spesialis::where('user_id', $user->id)->first();

        $request->validate([
            'nama' => 'required|string|max:255',
            'spesialisasi' => 'required|string|max:255',
            'tempatTugas' => 'required|string|max:255',
            'alamat' => 'required|string',
            'noHP' => 'required|string|max:20',
            'harga' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->only(['nama', 'spesialisasi', 'tempatTugas', 'alamat', 'noHP', 'harga']);

        if ($request->hasFile('image')) {
            // Handle image upload
            $imagePath = $request->file('image')->store('specialists', 'public');
            $data['image'] = $imagePath;
        }

        if ($specialist) {
            $specialist->update($data);
        } else {
            $data['user_id'] = $user->id;
            if (!isset($data['image'])) {
                $data['image'] = 'default-doctor.png'; // default image
            }
            Spesialis::create($data);
        }

        return redirect()->route('doctor.profile')->with('success', 'Profil berhasil diperbarui');
    }

    public function toggleOnline(Request $request)
{
    $user = auth()->user();

    $spesialis = $user->spesialis;
    $spesialis->is_online = !$spesialis->is_online;
    $spesialis->save();

    return back()->with('status', 'Status updated successfully!');
}
}