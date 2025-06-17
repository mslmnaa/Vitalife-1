<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Pharmacy extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pharmacy';
    
    protected $fillable = [
        'name',
        'address',
        'phone',
        'whatsapp',
        'operating_hours',
        'latitude',
        'longitude',
        'description',
        'image',
        'facilities',
        'is_active'
    ];

    protected $casts = [
        'operating_hours' => 'array',
        'facilities' => 'array',
        'is_active' => 'boolean',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8'
    ];

    // Relationships
    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'pharmacy_medicines', 'pharmacy_id', 'medicine_id')
                    ->withPivot(['stock', 'price', 'is_available', 'notes'])
                    ->withTimestamps();
    }

    public function availableMedicines()
    {
        return $this->medicines()->wherePivot('is_available', true)->wherePivot('stock', '>', 0);
    }

    // Accessors
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return Storage::url($this->image);
        }
        return null;
    }

    public function getWhatsappLinkAttribute()
    {
        $cleanNumber = preg_replace('/[^0-9]/', '', $this->whatsapp);
        if (substr($cleanNumber, 0, 1) !== '6') {
            $cleanNumber = '62' . ltrim($cleanNumber, '0');
        }
        return "https://wa.me/{$cleanNumber}";
    }

    public function getFormattedOperatingHoursAttribute()
    {
        if (!$this->operating_hours) {
            return 'Contact for operating hours';
        }

        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $formatted = [];
        
        foreach ($days as $day) {
            $dayLower = strtolower($day);
            if (isset($this->operating_hours[$dayLower])) {
                $hours = $this->operating_hours[$dayLower];
                if ($hours['is_open']) {
                    $formatted[] = $day . ': ' . $hours['open'] . ' - ' . $hours['close'];
                } else {
                    $formatted[] = $day . ': Closed';
                }
            }
        }
        
        return implode('<br>', $formatted);
    }

    public function getIsOpenNowAttribute()
    {
        if (!$this->operating_hours) {
            return null; // Unknown
        }

        $now = now();
        $dayName = strtolower($now->format('l')); // monday, tuesday, etc.
        $currentTime = $now->format('H:i');

        if (!isset($this->operating_hours[$dayName])) {
            return false;
        }

        $todayHours = $this->operating_hours[$dayName];
        
        if (!$todayHours['is_open']) {
            return false;
        }

        return $currentTime >= $todayHours['open'] && $currentTime <= $todayHours['close'];
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeNearby($query, $latitude, $longitude, $radius = 10)
    {
        return $query->selectRaw("
            *,
            (6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS distance
        ", [$latitude, $longitude, $latitude])
        ->having('distance', '<', $radius)
        ->orderBy('distance');
    }

    public function scopeSearch($query, $term)
    {
        return $query->where(function ($q) use ($term) {
            $q->where('name', 'LIKE', "%{$term}%")
              ->orWhere('address', 'LIKE', "%{$term}%")
              ->orWhere('description', 'LIKE', "%{$term}%");
        });
    }

    public function scopeWithMedicine($query, $medicineId)
    {
        return $query->whereHas('medicines', function ($q) use ($medicineId) {
            $q->where('medicine_id', $medicineId)
              ->wherePivot('is_available', true)
              ->wherePivot('stock', '>', 0);
        });
    }

    // Helper methods
    public function hasMedicine($medicineId)
    {
        return $this->medicines()
                    ->where('medicine_id', $medicineId)
                    ->wherePivot('is_available', true)
                    ->wherePivot('stock', '>', 0)
                    ->exists();
    }

    public function getMedicineStock($medicineId)
    {
        $medicine = $this->medicines()->where('medicine_id', $medicineId)->first();
        return $medicine ? $medicine->pivot->stock : 0;
    }

    public function getMedicinePrice($medicineId)
    {
        $medicine = $this->medicines()->where('medicine_id', $medicineId)->first();
        return $medicine ? $medicine->pivot->price : null;
    }

    public function getTotalMedicinesCount()
    {
        return $this->medicines()->wherePivot('is_available', true)->wherePivot('stock', '>', 0)->count();
    }

    public static function getFacilitiesOptions()
    {
        return [
            'parking' => 'Parking Available',
            '24_hour' => '24 Hour Service',
            'consultation' => 'Pharmacy Consultation',
            'delivery' => 'Delivery Service',
            'wheelchair_accessible' => 'Wheelchair Accessible',
            'air_conditioning' => 'Air Conditioning',
            'credit_card' => 'Credit Card Accepted',
            'online_payment' => 'Online Payment',
        ];
    }
}