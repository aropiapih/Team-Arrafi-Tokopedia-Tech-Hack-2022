<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemList extends Model
{
    use HasFactory;

    protected $fillable = [
        'list_id',
        'name_item',
    ];

    public function shoppingList() {
        return $this->belongsTo(ShoppingList::class);
    }
}
