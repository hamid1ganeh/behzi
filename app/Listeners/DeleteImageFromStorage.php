<?php

namespace App\Listeners;

use App\Events\AnImageRecordDeletedFromImagesTable;
use App\Services\V1\ImageService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DeleteImageFromStorage
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
     * @param AnImageRecordDeletedFromImagesTable $event
     * @return void
     */
    public function handle(AnImageRecordDeletedFromImagesTable $event)
    {
        $imageService = new ImageService();

        $imageService->remove($event->image);
    }
}
