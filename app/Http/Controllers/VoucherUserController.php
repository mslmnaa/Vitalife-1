<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VoucherUserController extends Controller
{
    public function index()
    {
        // Ambil voucher yang masih aktif (belum expired dan belum mencapai batas penggunaan)
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
            ->get();
            
        return view('user.vouchers.index', compact('vouchers'));
    }
    
    public function show($id)
    {
        $voucher = Voucher::findOrFail($id);
        return view('user.vouchers.show', compact('voucher'));
    }

    
}