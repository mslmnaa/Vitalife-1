<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse|JsonResponse
    {
        try {
            $request->authenticate();
            $request->session()->regenerate();
    
            $user = $request->user();
    
            // Tentukan route berdasarkan role
            if ($user->role === 'dokter') {
                $redirectRoute = route('doctor.dashboard', absolute: false);
            } 
             if ($user->role === 'admin') {
                $redirectRoute = route('admin.dashboard', absolute: false);
            } 

            
            else {
                $redirectRoute = route('dashboard', absolute: false); // default untuk user
            }
    
            if ($request->wantsJson()) {
                return new JsonResponse([
                    'success' => true,
                    'message' => 'Logged in successfully!',
                    'redirect' => $redirectRoute
                ]);
            }
    
            return redirect()->intended($redirectRoute)->with('status', 'Logged in successfully!');
        } catch (\Throwable $e) {
            if ($request->wantsJson()) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'The provided credentials do not match our records.'
                ], 422);
            }
    
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
    }
    

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken(); 

        return redirect()->route('login')->with('status', 'Logged out successfully!');
    }
}
