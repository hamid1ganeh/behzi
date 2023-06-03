<?php

namespace App\Listeners\AuthListener\Log;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Registered
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
     * @param \Illuminate\Auth\Events\Registered $event
     * @return void
     */
    public function handle(\Illuminate\Auth\Events\Registered $event)
    {
        activity('new user created')->performedOn($event->user)->log('new user has been created');
    }
}
