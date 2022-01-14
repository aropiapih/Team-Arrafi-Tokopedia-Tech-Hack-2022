<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $list_id
 * @property string $name_item
 * @property int $lower_price
 * @property int $upper_price
 *
 * @method static all($columns = ['*'])
 */
class ItemList extends Model
{
    use HasFactory;

    protected $fillable = [
        'list_id',
        'name_item',
        'lower_price',
        'upper_price',
    ];

    public function shoppingList()
    {
        return $this->belongsTo(ShoppingList::class);
    }
}
