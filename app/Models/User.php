<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $shopping_limit
 * @property bool $notif_limit
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'no_hp',
        'address',
        'shopping_limit',
        'notif_limit',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function shoppingList()
    {
        return $this->hasMany(ShoppingList::class);
    }

    public function cart()
    {
        return $this->belongsToMany(Product::class, 'cart', 'user_id', 'product_id', 'id', 'id');
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function spendThisMonth(): int
    {
        return $this->hasMany(Order::class)
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->sum('amount');
    }

    public function orderPerMonth()
    {
        $dateS = Carbon::now()->startOfMonth()->subMonth(6);
        $dateE = Carbon::now()->endOfMonth();

        return $this->hasMany(Order::class)
            ->whereBetween('created_at', [$dateS, $dateE])
            ->get()
            ->sortBy('created_at')
            ->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('M');
            });
    }
}
