<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Mail\LoginSuccessNotification;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;

class GoogleController extends Controller
{
    /**
     * Redirect to Google OAuth
     */
    public function redirect(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google OAuth callback
     */
    public function callback(): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            Log::info('Google OAuth Callback', [
                'google_id' => $googleUser->id,
                'email' => $googleUser->email,
                'name' => $googleUser->name
            ]);

            // Cari user berdasarkan google_id
            $userByGoogleId = User::where('google_id', $googleUser->id)->first();
            
            // Cari user berdasarkan email
            $userByEmail = User::where('email', $googleUser->email)->first();
            
            Log::info('User Search Results', [
                'found_by_google_id' => $userByGoogleId ? $userByGoogleId->id : null,
                'found_by_email' => $userByEmail ? $userByEmail->id : null,
                'email_has_google_id' => $userByEmail ? (bool)$userByEmail->google_id : null
            ]);

            $isNewUser = false;
            $isFirstGoogleLogin = false;

            if ($userByGoogleId) {
                // User sudah pernah login dengan Google
                $user = $userByGoogleId;
                Log::info('Existing Google user found', ['user_id' => $user->id]);
                
                // Update data jika perlu
                $user->update([
                    'name' => $googleUser->name,
                    'avatar' => $googleUser->avatar,
                ]);
                
            } elseif ($userByEmail) {
                // User ada tapi belum pernah login dengan Google
                $user = $userByEmail;
                $isFirstGoogleLogin = true;
                
                Log::info('Existing email user, first Google login', [
                    'user_id' => $user->id,
                    'had_google_id' => (bool)$user->google_id
                ]);
                
                // Link akun dengan Google
                $user->update([
                    'google_id' => $googleUser->id,
                    'name' => $googleUser->name,
                    'avatar' => $googleUser->avatar,
                    'email_verified_at' => $user->email_verified_at ?? now(),
                ]);
                
            } else {
                // User benar-benar baru
                Log::info('Creating new user via Google');
                
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'avatar' => $googleUser->avatar,
                    'email_verified_at' => now(),
                    'password' => bcrypt(Str::random(16)),
                ]);

                $isNewUser = true;
                Log::info('New user created', ['user_id' => $user->id]);
            }

            // Update last login
            $user->updateLastLogin();

            // Login user
            Auth::login($user, true);

            // Kirim Welcome Email untuk user baru atau first Google login
            if ($isNewUser || $isFirstGoogleLogin) {
                $emailType = $isNewUser ? 'new_user' : 'first_google_login';
                
                Log::info('Attempting to send WelcomeEmail', [
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'type' => $emailType,
                    'mail_driver' => config('mail.default'),
                    'mail_host' => config('mail.mailers.smtp.host'),
                ]);

                try {
                    // Test mail configuration
                    if (!config('mail.default')) {
                        throw new \Exception('Mail driver not configured');
                    }

                    Mail::to($user->email)->send(new WelcomeEmail($user));
                    
                    Log::info('WelcomeEmail sent successfully', [
                        'user_id' => $user->id,
                        'email' => $user->email,
                        'type' => $emailType
                    ]);
                    
                } catch (\Exception $e) {
                    Log::error('Failed to send WelcomeEmail', [
                        'user_id' => $user->id,
                        'email' => $user->email,
                        'type' => $emailType,
                        'error' => $e->getMessage(),
                        'trace' => $e->getTraceAsString()
                    ]);
                }
            } else {
                Log::info('Skipping WelcomeEmail', [
                    'user_id' => $user->id,
                    'is_new_user' => $isNewUser,
                    'is_first_google_login' => $isFirstGoogleLogin
                ]);
            }

            // Kirim Login Success Notification
            try {
                Mail::to($user->email)->send(new LoginSuccessNotification($user));
                Log::info('LoginSuccessNotification sent', ['user_id' => $user->id]);
            } catch (\Exception $e) {
                Log::error('Failed to send LoginSuccessNotification', [
                    'user_id' => $user->id,
                    'error' => $e->getMessage()
                ]);
            }

            return redirect()->route('dashboard')->with('success', 'Login berhasil! Email notifikasi telah dikirim.');

        } catch (\Exception $e) {
            Log::error('Google OAuth Error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect()->route('login')->with('error', 'Terjadi kesalahan saat login dengan Google. Silakan coba lagi.');
        }
    }
}