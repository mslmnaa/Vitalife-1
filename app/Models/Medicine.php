<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Medicine extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'id_medicine';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'nama',
        'harga',
        'deskripsi',
        'kategori',
        'stok',
        'tanggal_kadaluarsa',
        'produsen',
        'image'
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'tanggal_kadaluarsa' => 'date',
        'harga' => 'integer',
        'stok' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'deleted_at'
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        // Auto-generate slug or any other logic when creating
        static::creating(function ($medicine) {
            // You can add any logic here that should run when creating a medicine
        });

        // Clean up image when deleting
        static::deleting(function ($medicine) {
            if ($medicine->image && file_exists(public_path($medicine->image))) {
                unlink(public_path($medicine->image));
            }
        });
    }

    // ==================== ACCESSORS ====================

    /**
     * Get the formatted price attribute.
     */
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    /**
     * Get the stock status attribute.
     */
    public function getStockStatusAttribute()
    {
        if ($this->stok == 0) {
            return 'Habis';
        } elseif ($this->stok <= 10) {
            return 'Stok Menipis';
        } else {
            return 'Tersedia ';
        }
    }

    /**
     * Get the stock status color attribute.
     */
    public function getStockStatusColorAttribute()
    {
        if ($this->stok == 0) {
            return 'red';
        } elseif ($this->stok <= 10) {
            return 'yellow';
        } else {
            return 'green';
        }
    }

    /**
     * Get the expiry status attribute.
     */
    public function getExpiryStatusAttribute()
    {
        $today = Carbon::now();
        $expiryDate = $this->tanggal_kadaluarsa;
        
        if ($expiryDate->isPast()) {
            return 'Kadaluarsa';
        } elseif ($expiryDate->diffInDays($today) <= 30) {
            return 'Akan Kadaluarsa';
        } else {
            return 'Aman';
        }
    }

    /**
     * Get the expiry status color attribute.
     */
    public function getExpiryStatusColorAttribute()
    {
        $today = Carbon::now();
        $expiryDate = $this->tanggal_kadaluarsa;
        
        if ($expiryDate->isPast()) {
            return 'red';
        } elseif ($expiryDate->diffInDays($today) <= 30) {
            return 'yellow';
        } else {
            return 'green';
        }
    }

    /**
     * Get the days until expiry attribute.
     */
    public function getDaysUntilExpiryAttribute()
    {
        return Carbon::now()->diffInDays($this->tanggal_kadaluarsa, false);
    }

    /**
     * Get the stock value attribute.
     */
    public function getStockValueAttribute()
    {
        return $this->harga * $this->stok;
    }

    /**
     * Get the formatted stock value attribute.
     */
    public function getFormattedStockValueAttribute()
    {
        return 'Rp ' . number_format($this->stock_value, 0, ',', '.');
    }

    /**
     * Get the image URL attribute.
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset($this->image);
        }
        return asset('images/default-medicine.png'); // Default image
    }

    /**
     * Get the short description attribute.
     */
    public function getShortDescriptionAttribute()
    {
        return strlen($this->deskripsi) > 100 
            ? substr($this->deskripsi, 0, 100) . '...' 
            : $this->deskripsi;
    }

    // ==================== MUTATORS ====================

    /**
     * Set the nama attribute.
     */
    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = ucwords(strtolower($value));
    }

    /**
     * Set the kategori attribute.
     */
    public function setKategoriAttribute($value)
    {
        $this->attributes['kategori'] = ucwords(strtolower($value));
    }

    /**
     * Set the produsen attribute.
     */
    public function setProdusenAttribute($value)
    {
        $this->attributes['produsen'] = ucwords(strtolower($value));
    }

    // ==================== SCOPES ====================

    /**
     * Scope a query to only include available medicines.
     */
    public function scopeAvailable($query)
    {
        return $query->where('stok', '>', 0);
    }

    /**
     * Scope a query to only include medicines with low stock.
     */
    public function scopeLowStock($query, $threshold = 10)
    {
        return $query->where('stok', '<=', $threshold)->where('stok', '>', 0);
    }

    /**
     * Scope a query to only include out of stock medicines.
     */
    public function scopeOutOfStock($query)
    {
        return $query->where('stok', 0);
    }

    /**
     * Scope a query to only include expired medicines.
     */
    public function scopeExpired($query)
    {
        return $query->where('tanggal_kadaluarsa', '<', Carbon::now());
    }

    /**
     * Scope a query to only include medicines expiring soon.
     */
    public function scopeExpiringSoon($query, $days = 30)
    {
        return $query->where('tanggal_kadaluarsa', '<=', Carbon::now()->addDays($days))
                     ->where('tanggal_kadaluarsa', '>=', Carbon::now());
    }

    /**
     * Scope a query to only include medicines that are safe (not expiring soon).
     */
    public function scopeSafe($query, $days = 30)
    {
        return $query->where('tanggal_kadaluarsa', '>', Carbon::now()->addDays($days));
    }

    /**
     * Scope a query to filter by category.
     */
    public function scopeByCategory($query, $category)
    {
        return $query->where('kategori', $category);
    }

    /**
     * Scope a query to filter by manufacturer.
     */
    public function scopeByManufacturer($query, $manufacturer)
    {
        return $query->where('produsen', $manufacturer);
    }

    /**
     * Scope a query to search medicines.
     */
    public function scopeSearch($query, $search)
    {
        return $query->where(function($q) use ($search) {
            $q->where('nama', 'like', '%' . $search . '%')
              ->orWhere('kategori', 'like', '%' . $search . '%')
              ->orWhere('produsen', 'like', '%' . $search . '%')
              ->orWhere('deskripsi', 'like', '%' . $search . '%');
        });
    }

    // ==================== RELATIONSHIPS ====================

    /**
     * Get the stock movements for the medicine.
     * (You can create this relationship later if you want to track stock movements)
     */
    // public function stockMovements()
    // {
    //     return $this->hasMany(StockMovement::class, 'medicine_id', 'id_medicine');
    // }

    /**
     * Get the sales for the medicine.
     * (You can create this relationship later if you want to track sales)
     */
    // public function sales()
    // {
    //     return $this->hasMany(Sale::class, 'medicine_id', 'id_medicine');
    // }

    // ==================== STATIC METHODS ====================

    /**
     * Get all available categories.
     */
    public static function getCategories()
    {
        return self::distinct()->pluck('kategori')->sort()->values();
    }

    /**
     * Get all manufacturers.
     */
    public static function getManufacturers()
    {
        return self::distinct()->pluck('produsen')->sort()->values();
    }

    /**
     * Get medicines statistics.
     */
    public static function getStatistics()
    {
        return [
            'total' => self::count(),
            'available' => self::available()->count(),
            'low_stock' => self::lowStock()->count(),
            'out_of_stock' => self::outOfStock()->count(),
            'expired' => self::expired()->count(),
            'expiring_soon' => self::expiringSoon()->count(),
            'total_value' => self::sum(\DB::raw('harga * stok')),
        ];
    }

    /**
     * Get top selling categories.
     */
    public static function getTopCategories($limit = 5)
    {
        return self::select('kategori', \DB::raw('count(*) as count'))
                   ->groupBy('kategori')
                   ->orderBy('count', 'desc')
                   ->limit($limit)
                   ->get();
    }

    // ==================== HELPER METHODS ====================

    /**
     * Check if medicine is available.
     */
    public function isAvailable()
    {
        return $this->stok > 0;
    }

    /**
     * Check if medicine has low stock.
     */
    public function hasLowStock($threshold = 10)
    {
        return $this->stok <= $threshold && $this->stok > 0;
    }

    /**
     * Check if medicine is out of stock.
     */
    public function isOutOfStock()
    {
        return $this->stok == 0;
    }

    /**
     * Check if medicine is expired.
     */
    public function isExpired()
    {
        return $this->tanggal_kadaluarsa->isPast();
    }

    /**
     * Check if medicine is expiring soon.
     */
    public function isExpiringSoon($days = 30)
    {
        return $this->tanggal_kadaluarsa->diffInDays(Carbon::now()) <= $days && !$this->isExpired();
    }

    /**
     * Add stock to medicine.
     */
    public function addStock($quantity, $reason = null)
    {
        $this->stok += $quantity;
        $this->save();

        // You can log this action if you have a stock movement model
        // StockMovement::create([
        //     'medicine_id' => $this->id_medicine,
        //     'type' => 'in',
        //     'quantity' => $quantity,
        //     'reason' => $reason,
        //     'balance_after' => $this->stok
        // ]);

        return $this;
    }

    /**
     * Reduce stock from medicine.
     */
    public function reduceStock($quantity, $reason = null)
    {
        if ($this->stok >= $quantity) {
            $this->stok -= $quantity;
            $this->save();

            // You can log this action if you have a stock movement model
            // StockMovement::create([
            //     'medicine_id' => $this->id_medicine,
            //     'type' => 'out',
            //     'quantity' => $quantity,
            //     'reason' => $reason,
            //     'balance_after' => $this->stok
            // ]);

            return $this;
        }

        throw new \Exception('Insufficient stock. Available: ' . $this->stok . ', Requested: ' . $quantity);
    }

    /**
     * Set stock to specific amount.
     */
    public function setStock($quantity, $reason = null)
    {
        $oldStock = $this->stok;
        $this->stok = $quantity;
        $this->save();

        // You can log this action if you have a stock movement model
        // StockMovement::create([
        //     'medicine_id' => $this->id_medicine,
        //     'type' => $quantity > $oldStock ? 'adjustment_in' : 'adjustment_out',
        //     'quantity' => abs($quantity - $oldStock),
        //     'reason' => $reason,
        //     'balance_after' => $this->stok
        // ]);

        return $this;
    }
}
