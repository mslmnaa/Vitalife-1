<?php

namespace app\Http\Controllers\Auth;

use app\Models\User;
use app\Mail\WelcomeEmail;
use Illuminate\Support\Str;
use app\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use app\Mail\LoginSuccessNotification;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

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
            Log::info('Google OAuth callback started');
            
            $googleUser = Socialite::driver('google')->user();
            Log::info('Google user data retrieved', [
                'email' => $googleUser->email,
                'name' => $googleUser->name,
                'google_id' => $googleUser->id
            ]);

            // Gunakan database transaction untuk memastikan konsistensi
            DB::beginTransaction();
            
            try {
                // Cek apakah user sudah ada berdasarkan email
                $existingUser = User::where('email', $googleUser->email)->first();
                
                // Cek apakah user sudah punya google_id
                $googleLinkedUser = User::where('google_id', $googleUser->id)->first();

                $isNewUser = false;
                $isFirstGoogleLogin = false;

                if (!$existingUser) {
                    // User benar-benar baru
                    Log::info('Creating new user from Google OAuth', ['email' => $googleUser->email]);
                    
                    $user = User::create([
                        'name' => $googleUser->name,
                        'email' => $googleUser->email,
                        'google_id' => $googleUser->id,
                        'avatar' => $googleUser->avatar,
                        'email_verified_at' => now(),
                        'password' => bcrypt(Str::random(16)),
                    ]);
                    
                    $isNewUser = true;
                    Log::info('New user created', ['user_id' => $user->id, 'email' => $user->email]);
                } else {
                    // User sudah ada, tapi mungkin belum link dengan Google
                    Log::info('Existing user found', ['user_id' => $existingUser->id, 'email' => $existingUser->email]);
                    
                    $user = $existingUser;
                    
                    if (!$user->google_id) {
                        $isFirstGoogleLogin = true;
                        Log::info('First time Google login for existing user', ['user_id' => $user->id]);
                    }
                    
                    $user->update([
                        'google_id' => $googleUser->id,
                        'name' => $googleUser->name,
                        'avatar' => $googleUser->avatar,
                    ]);
                }

                // Update last login
                $user->updateLastLogin();
                
                // Commit transaction sebelum mengirim email
                DB::commit();
                
                // Refresh user dari database untuk memastikan data terbaru
                $user = $user->fresh();
                
                Log::info('User data after refresh', [
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'name' => $user->name,
                    'google_id' => $user->google_id,
                    'last_login_at' => $user->last_login_at
                ]);

                // Login user
                Auth::login($user, true);
                Log::info('User logged in successfully', ['user_id' => $user->id]);

                sleep(2);


                // Kirim welcome email untuk user baru atau first Google login
                if ($isNewUser || $isFirstGoogleLogin) {
                    Log::info('Preparing to send WelcomeEmail', [
                        'user_id' => $user->id,
                        'email' => $user->email,
                        'is_new_user' => $isNewUser,
                        'is_first_google_login' => $isFirstGoogleLogin
                    ]);
                    
                    try {
                        // Kirim langsung tanpa queue untuk debugging
                        Mail::to('alfarizim168@gmail.com')->send(new WelcomeEmail($user));
                        
                        Log::info('WelcomeEmail sent successfully', ['email' => $user->email]);
                    } catch (\Exception $e) {
                        Log::error('Failed to send WelcomeEmail', [
                            'email' => $user->email,
                            'error' => $e->getMessage(),
                            'trace' => $e->getTraceAsString()
                        ]);
                    }
                }

                // Kirim login notification
                Log::info('Preparing to send LoginSuccessNotification', [
                    'user_id' => $user->id,
                    'email' => $user->email
                ]);
                
                try {
                    // Kirim langsung tanpa queue untuk debugging
                    Mail::to($user->email)->send(new LoginSuccessNotification($user));
                    Log::info('LoginSuccessNotification sent successfully', ['email' => $user->email]);
                } catch (\Exception $e) {
                    Log::error('Failed to send LoginSuccessNotification', [
                        'email' => $user->email,
                        'error' => $e->getMessage(),
                        'trace' => $e->getTraceAsString()
                    ]);
                }

                Log::info('Google OAuth callback completed successfully');
                return redirect()->route('dashboard')->with('success', 'Login berhasil!');
                
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }

        } catch (\Exception $e) {
            Log::error('Google OAuth Error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->route('login')->with('error', 'Terjadi kesalahan saat login dengan Google.');
        }
    }
}