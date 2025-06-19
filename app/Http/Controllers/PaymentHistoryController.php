<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentHistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $payments = Payment::with(['specialist.user'])
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('user.payment-history.index', compact('payments'));
    }
    
    public function show($id)
    {
        $payment = Payment::with(['specialist.user'])
            ->where('user_id', Auth::id())
            ->findOrFail($id);
            
        return view('payment-history.show', compact('payment'));
    }
    
    public function getConfirmedPayments()
    {
        $user = Auth::user();
        
        $confirmedPayments = Payment::with(['specialist.user'])
            ->where('user_id', $user->id)
            ->where('status', 'confirmed')
            ->orderBy('payment_date', 'desc')
            ->get();
            
        return view('chat.available-doctors', compact('confirmedPayments'));
    }
}
