<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spesialis extends Model
{
    use HasFactory;

    protected $table = 'spesialis';
    protected $primaryKey = 'id_spesialis';

    protected $fillable = [
        'nama',
        'harga',
        'spesialisasi',
        'tempatTugas',
        'alamat',
        'noHP',
        'image',
        'user_id',
        'is_online'
    ];

    /**
     * Get the user that owns the spesialis.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the full image URL
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return asset('images/default-doctor.png'); // Default image
    }

    /**
     * Format harga as currency
     */
    public function getFormattedHargaAttribute()
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }
}