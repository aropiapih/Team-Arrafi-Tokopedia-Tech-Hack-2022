<?php

namespace App\Models;

use App\Events\ProductDeleted;
use App\Events\ProductSaved;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property string $name
 * @property int $price
 * @property string $description
 *
 * @method static Builder where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Product find($id, $columns = ['*'])
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
    ];

    protected $dispatchesEvents = [
        'saved' => ProductSaved::class,
        'deleted' => ProductDeleted::class,
    ];

    protected static function booted()
    {
        static::saved(function (Product $product) {
            $item_lists = ItemList::all();

            foreach ($item_lists as $item_list) {
                $lower_price = DB::table('products')->whereRaw("match(name) against (?)", [$item_list->name_item])->orderBy('price')->value('price');
                $upper_price = DB::table('products')->whereRaw("match(name) against (?)", [$item_list->name_item])
                    ->orderBy('price', 'desc')->value('price');

                $item_list->lower_price = $lower_price;
                $item_list->upper_price = $upper_price;
                $item_list->save();
            }
        });

        static::deleted(function (Product $product) {
            $item_lists = ItemList::all();

            foreach ($item_lists as $item_list) {
                $lower_price = DB::table('products')->whereRaw("match(name) against (?)", [$item_list->name_item])->orderBy('price')->value('price');
                $upper_price = DB::table('products')->whereRaw("match(name) against (?)", [$item_list->name_item])
                    ->orderBy('price', 'desc')->value('price');

                $item_list->lower_price = $lower_price;
                $item_list->upper_price = $upper_price;
                $item_list->save();
            }
        });

    }
}
