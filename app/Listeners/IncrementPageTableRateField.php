<?php

namespace App\Listeners;

use App\Events\NewRateHasBeenCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncrementPageTableRateField
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
     * @param  NewRateHasBeenCreated  $event
     * @return void
     */
    public function handle($event)
    {
        $page = $event->pageRate->page;
        $sumOfRates = $page->rates->sum('rate');
        $numberOfRateRecord = $page->rates->count();
        $page->rate = round($sumOfRates / $numberOfRateRecord, 2);
        $page->save();
    }
}
