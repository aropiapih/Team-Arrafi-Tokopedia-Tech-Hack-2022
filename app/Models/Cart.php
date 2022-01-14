<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id'
    ];

    public function cart() {
        return $this->belongsTo(User::class);
    }

    public function cartProduct() {
        return $this->hasMany(CartProduct::class);
    }
}
