<?php

namespace App\Listeners;

use App\Events\ProductDeleted;
use App\Events\ProductSaved;
use App\Models\ItemList;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;

class UpdateItemListPriceRange implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param ProductSaved $event
     * @return void
     */
    public function handleProductSaved(ProductSaved $event)
    {
        $this->updatePriceRange();
    }

    public function handleProductDeleted(ProductDeleted $event)
    {
        $this->updatePriceRange();
    }

    private function updatePriceRange(): void
    {
        $item_lists = ItemList::all();

        foreach ($item_lists as $item_list) {
            $lower_price = DB::table('products')->whereRaw("match(name) against (?)", [$item_list->name_item])->orderBy('price')->value('price');
            $upper_price = DB::table('products')->whereRaw("match(name) against (?)", [$item_list->name_item])
                ->orderBy('price', 'desc')->value('price');

            $item_list->lower_price = $lower_price;
            $item_list->upper_price = $upper_price;
            $item_list->save();
        }
    }
}
