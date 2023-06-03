<?php

namespace App\Events;

use App\Models\PageRate;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewRateHasBeenCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * @var PageRate
     */
    public $pageRate;

    /**
     * Create a new event instance.
     *
     * @param PageRate $pageRate
     */
    public function __construct(PageRate $pageRate)
    {
        //
        $this->pageRate = $pageRate;
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
