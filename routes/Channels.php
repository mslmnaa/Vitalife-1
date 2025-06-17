<?php

use App\Models\Chat;
use App\Models\Payment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Broadcast;

// Enhanced channel authorization untuk chat
Broadcast::channel('chat.{paymentId}', function ($user, $paymentId) {
    Log::info('=== CHAT CHANNEL AUTHORIZATION START ===');
    Log::info('Chat channel authorization attempt:', [
        'user_id' => $user->id,
        'user_name' => $user->name,
        'user_role' => $user->role,
        'payment_id' => $paymentId,
        'timestamp' => now()
    ]);
    
    // Cek apakah user memiliki akses ke payment ini
    $payment = Payment::find($paymentId);
    if (!$payment) {
        Log::warning('Payment not found for channel auth', [
            'payment_id' => $paymentId,
            'user_id' => $user->id
        ]);
        return false;
    }
    
    Log::info('Payment found:', [
        'id' => $payment->id,
        'user_id' => $payment->user_id,
        'specialist_id' => $payment->specialist_id,
        'status' => $payment->status
    ]);
    
    // User bisa akses jika dia adalah pemilik payment atau specialist yang terkait
    $hasAccess = false;
    
    if ($user->role === 'admin' || $user->role === 'dokter') {
        // Untuk admin/dokter, cek apakah mereka adalah specialist untuk payment ini
        $specialist = \App\Models\Spesialis::where('id_spesialis', $payment->specialist_id)
            ->where('user_id', $user->id)
            ->first();
        
        Log::info('Specialist check for admin/dokter:', [
            'specialist_found' => $specialist ? true : false,
            'specialist_id' => $specialist->id_spesialis ?? null,
            'specialist_user_id' => $specialist->user_id ?? null,
            'payment_specialist_id' => $payment->specialist_id
        ]);
        
        $hasAccess = $specialist ? true : false;
    } else {
        // Untuk user biasa, cek apakah mereka pemilik payment
        $hasAccess = ($payment->user_id === $user->id);
        
        Log::info('Regular user access check:', [
            'payment_user_id' => $payment->user_id,
            'current_user_id' => $user->id,
            'has_access' => $hasAccess
        ]);
    }
        
    Log::info('Chat channel authorization result:', [
        'user_id' => $user->id,
        'payment_id' => $paymentId,
        'has_access' => $hasAccess,
        'user_role' => $user->role
    ]);
    Log::info('=== CHAT CHANNEL AUTHORIZATION END ===');
    
    return $hasAccess;
});

// Enhanced channel authorization untuk user personal
Broadcast::channel('user.{id}', function ($user, $id) {
    Log::info('=== USER CHANNEL AUTHORIZATION START ===');
    Log::info('User channel authorization attempt:', [
        'auth_user_id' => $user->id,
        'auth_user_name' => $user->name,
        'requested_user_id' => $id,
        'timestamp' => now()
    ]);
    
    $authorized = (int) $user->id === (int) $id;
    
    Log::info('User channel authorization result:', [
        'authorized' => $authorized,
        'auth_user_id' => $user->id,
        'requested_user_id' => $id
    ]);
    Log::info('=== USER CHANNEL AUTHORIZATION END ===');
    
    return $authorized;
});