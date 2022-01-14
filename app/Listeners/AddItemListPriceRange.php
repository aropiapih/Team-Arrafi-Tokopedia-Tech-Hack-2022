<?php

namespace App\Listeners;

use App\Events\ItemListSaving;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class AddItemListPriceRange
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
     * @param  \App\Events\ItemListSaving  $event
     * @return void
     */
    public function handle(ItemListSaving $event)
    {
        $lower_price = DB::table('products')->whereRaw("match(name) against (?)", [$event->itemList->name_item])->orderBy('price')->value('price');
        $upper_price = DB::table('products')->whereRaw("match(name) against (?)", [$event->itemList->name_item])
            ->orderBy('price', 'desc')->value('price');

        $event->itemList->lower_price = $lower_price;
        $event->itemList->upper_price = $upper_price;
    }
}
