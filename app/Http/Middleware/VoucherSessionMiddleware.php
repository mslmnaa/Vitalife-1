<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VoucherSessionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get the current route name
        $routeName = $request->route() ? $request->route()->getName() : null;
        
        // Routes where voucher should be preserved
        $voucherRoutes = [
            'spesialis.bayar', 
            'admin.apply.voucher',
            'admin.remove.voucher',
            'payments.store'
        ];
        
        // If we're not on a voucher-related page, clear voucher session data
        if (!in_array($routeName, $voucherRoutes)) {
            session()->forget([
                'applied_voucher',
                'discount_percentage',
                'discount_amount',
                'discounted_price',
                'voucher_id'
            ]);
        }
        
        return $next($request);
    }
}