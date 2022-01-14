<?php

namespace App\Events;

use App\Models\ItemList;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ItemListSaving
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public ItemList $itemList;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ItemList $itemList)
    {
        //
        $this->itemList = $itemList;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
