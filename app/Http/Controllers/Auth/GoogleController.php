<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Str;
use App\Http\Controllers\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Mail\LoginSuccessNotification;
use Laravel\Socialite\Facades\Socialite;

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

            // Cari user berdasarkan google_id atau email
            $user = User::where('google_id', $googleUser->id)
                        ->orWhere('email', $googleUser->email)
                        ->first();

            $isNewUser = false;

            if ($user) {
                // Update user lama
                $user->update([
                    'google_id' => $googleUser->id,
                    'name' => $googleUser->name,
                    'avatar' => $googleUser->avatar,
                ]);
            } else {
                // Buat user baru
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'avatar' => $googleUser->avatar,
                    'email_verified_at' => now(),
                    'password' => bcrypt(Str::random(16)), // password acak
                ]);

                $isNewUser = true;
            }

            // Update last login
            $user->updateLastLogin();

            // Login
            Auth::login($user, true);

           if ($isNewUser) {
    \Log::info('User baru dibuat. Mengirim WelcomeEmail ke: ' . $user->email);

    try {
        Mail::to($user->email)->send(new WelcomeEmail($user));
        \Log::info('WelcomeEmail berhasil dikirim ke: ' . $user->email);
    } catch (\Exception $e) {
        \Log::error('Gagal kirim WelcomeEmail: ' . $e->getMessage());
    }
}


           try {
    Mail::to($user->email)->send(new LoginSuccessNotification($user));
    \Log::info('LoginSuccessNotification dikirim ke: ' . $user->email);
} catch (\Exception $e) {
    \Log::error('Gagal kirim LoginSuccessNotification: ' . $e->getMessage());
}


            return redirect()->route('dashboard')->with('success', 'Login berhasil! Email notifikasi telah dikirim.');

        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Terjadi kesalahan saat login dengan Google. Silakan coba lagi.');
        }
    }
}
