<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'shipping_address',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function detail() {
        return $this->hasMany(OrderDetail::class);
    }
}
