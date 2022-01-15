<?php

namespace App\Models;

use App\Events\ItemListSaving;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property int $list_id
 * @property string $name_item
 * @property int $lower_price
 * @property int $upper_price
 *
 * @method static ItemList[] all($columns = ['*'])
 */
class ItemList extends Model
{
    use HasFactory;

    protected $table = 'item_list';

    protected $fillable = [
        'list_id',
        'name_item',
        'lower_price',
        'upper_price',
    ];

    protected static function booted()
    {
        static::saving(function (ItemList $self) {
            $lower_price = DB::table('products')->whereRaw("match(name) against (?)", [$self->name_item])->orderBy('price')->value('price');
            $upper_price = DB::table('products')->whereRaw("match(name) against (?)", [$self->name_item])
                ->orderBy('price', 'desc')->value('price');

            $self->lower_price = $lower_price;
            $self->upper_price = $upper_price;
        }
        );
    }

    protected $dispatchesEvents = [
        'saving' => ItemListSaving::class,
    ];

    public function shoppingList()
    {
        return $this->belongsTo(ShoppingList::class);
    }
}
