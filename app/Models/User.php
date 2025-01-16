<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'is_seller',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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

    public function uniqueIds()
    {
        return ['id'];
    }

    public function isSeller(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? true : false
        );
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
