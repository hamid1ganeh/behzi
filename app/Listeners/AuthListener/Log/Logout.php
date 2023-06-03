<?php

namespace App\Listeners\AuthListener\Log;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Logout
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
     * @param \Illuminate\Auth\Events\Logout $event
     * @return void
     */
    public function handle(\Illuminate\Auth\Events\Logout $event)
    {
        activity('logout occurred')->performedOn($event->user)->causedBy($event->user)->log('new logout action has been occurred');
    }
}
