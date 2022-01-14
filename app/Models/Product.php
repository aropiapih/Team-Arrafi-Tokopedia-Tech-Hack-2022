<?php

namespace App\Models;

use App\Events\ProductDeleted;
use App\Events\ProductSaved;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
