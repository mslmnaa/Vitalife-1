<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    public const ROLE_USER = 'user';
public const ROLE_ADMIN = 'admin';
public const ROLE_DOKTER = 'dokter'; // atau 'spesialis'

public function isDokter()
{
    return $this->role === self::ROLE_DOKTER;
}

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
        'image',
        'google_id',
        'avatar',
        'last_login_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
        public function specialist()
    {
        return $this->hasOne(Spesialis::class, 'user_id');
    }

    public function isSpecialist()
    {
        return $this->specialist()->exists();
    }

    public function spesialis()
{
    return $this->hasOne(Spesialis::class, 'user_id');
}

    protected static function booted()
{
    static::deleting(function ($user) {
        $user->spesialis()->delete();
    });
}

}
