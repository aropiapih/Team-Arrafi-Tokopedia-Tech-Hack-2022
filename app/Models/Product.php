<?php

namespace App\Models;

use App\Events\ProductCreated;
use App\Events\ProductDeleted;
use App\Events\ProductSaved;
use App\Events\ProductUpdated;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static Builder where($column, $operator = null, $value = null, $boolean = 'and')
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
        'created' => ProductCreated::class,
        'saved' => ProductSaved::class,
        'updated' => ProductUpdated::class,
        'deleted' => ProductDeleted::class,
    ];
}
