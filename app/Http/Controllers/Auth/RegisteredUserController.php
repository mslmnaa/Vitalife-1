<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\NewUserRegistered;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request)
{
    try {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'user',
            'password' => Hash::make($request->password),
            'provider' => $request->provider
        ]);

        event(new Registered($user));

        // Notify admins and send welcome email can be done in background jobs
        // for faster response
        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewUserRegistered($user));
        }

        Mail::to($user->email)->send(new WelcomeEmail($user));

        Auth::login($user);

        $redirectRoute = $user->role === 'admin' ? route('admin.dashboard') : route('dashboard');

        // Check if request is AJAX
        if ($request->header('X-Requested-With') == 'XMLHttpRequest') {
            return response()->json([
                'success' => true,
                'message' => 'Registration successful!',
                'redirect' => $redirectRoute
            ]);
        }

        return redirect($redirectRoute);
    } catch (\Illuminate\Validation\ValidationException $e) {
        if ($request->header('X-Requested-With') == 'XMLHttpRequest') {
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        }
        
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        if ($request->header('X-Requested-With') == 'XMLHttpRequest') {
            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred: ' . $e->getMessage()
            ], 500);
        }
        
        return redirect()->back()->with('error', 'An unexpected error occurred: ' . $e->getMessage())->withInput();
    }
}
}
