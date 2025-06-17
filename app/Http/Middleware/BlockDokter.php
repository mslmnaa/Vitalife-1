<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlockDokter
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'dokter') {
            return redirect()->route('doctor.dashboard'); // arahkan ke login dokter
        }

        return $next($request);
    }
}
