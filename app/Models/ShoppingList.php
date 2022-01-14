<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingList extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name_list'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function itemList() {
        return $this->hasMany(ItemList::class);
    }
}
