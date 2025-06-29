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

        // Cek apakah user sudah ada berdasarkan email
        $existingUser = User::where('email', $googleUser->email)->first();
        
        // Cek apakah user sudah punya google_id
        $googleLinkedUser = User::where('google_id', $googleUser->id)->first();

        $isNewUser = false;
        $isFirstGoogleLogin = false;

        if (!$existingUser) {
            // User benar-benar baru
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'avatar' => $googleUser->avatar,
                'email_verified_at' => now(),
                'password' => bcrypt(Str::random(16)),
            ]);
            
            $isNewUser = true;
        } else {
            // User sudah ada, tapi mungkin belum link dengan Google
            $user = $existingUser;
            
            if (!$user->google_id) {
                $isFirstGoogleLogin = true;
            }
            
            $user->update([
                'google_id' => $googleUser->id,
                'name' => $googleUser->name,
                'avatar' => $googleUser->avatar,
            ]);
        }

        $user->updateLastLogin();
        Auth::login($user, true);

        // Kirim welcome email untuk user baru atau first Google login
        if ($isNewUser || $isFirstGoogleLogin) {
            Log::info('Mengirim WelcomeEmail ke: ' . $user->email);
            
            try {
                Mail::to($user->email)->send(new WelcomeEmail($user));
                Log::info('WelcomeEmail berhasil dikirim ke: ' . $user->email);
            } catch (\Exception $e) {
                Log::error('Gagal kirim WelcomeEmail: ' . $e->getMessage());
            }
        }

        // Kirim login notification
        try {
            Mail::to($user->email)->send(new LoginSuccessNotification($user));
            Log::info('LoginSuccessNotification dikirim ke: ' . $user->email);
        } catch (\Exception $e) {
            Log::error('Gagal kirim LoginSuccessNotification: ' . $e->getMessage());
        }

        return redirect()->route('dashboard')->with('success', 'Login berhasil!');

    } catch (\Exception $e) {
        Log::error('Google OAuth Error: ' . $e->getMessage());
        return redirect()->route('login')->with('error', 'Terjadi kesalahan saat login dengan Google.');
    }
}
}
