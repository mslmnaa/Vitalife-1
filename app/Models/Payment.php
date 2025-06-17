<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'specialist_id',
        'full_name',
        'gender',
        'date_of_birth',
        'phone_number',
        'address',
        'medical_history',
        'complaints',
        'bank_name',
        'payment_code',
        'amount',
        'discount_amount',
        'total_amount',
        'voucher_code',
        'status',
        'payment_date',
    ];

    /**
     * Get the user associated with the payment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the specialist associated with the payment.
     */
    public function specialist()
    {                                                                                                                           
        return $this->belongsTo(Spesialis::class, 'specialist_id', 'id_spesialis');
    }
    
    /**
     * Get the chats for this payment.
     */
    public function chats()
    {
        return $this->hasMany(Chat::class);
    }
}