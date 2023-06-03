<?php

namespace App\Listeners\AuthListener\Log;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Login
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
     * @param \Illuminate\Auth\Events\Login $event
     * @return void
     */
    public function handle(\Illuminate\Auth\Events\Login $event)
    {
        activity('login occurred')->performedOn($event->user)->causedBy($event->user)->log('new login action has been occurred');

    }
}
