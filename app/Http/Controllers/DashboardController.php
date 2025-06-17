<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
   

    public function index()
    {
        $vouchers = Voucher::where(function($query) {
            $query->whereNull('expired_at')
                  ->orWhere('expired_at', '>', Carbon::now());
        })
        ->where(function($query) {
            $query->where('is_used', false)
                  ->orWhereNull('usage_limit')
                  ->orWhereRaw('usage_count < usage_limit');
        })
        ->orderBy('created_at', 'desc')
        ->get();        return view('dashboard', compact('vouchers'));
    }
    
}
