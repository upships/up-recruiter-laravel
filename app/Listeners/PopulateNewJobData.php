<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PopulateNewJobData
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $slugString = $event->job->position->label . ' ' . str_random(10);

        $event->job->expires_on = \Carbon\Carbon::now()->addDays(28);
        $event->job->slug = slug($slugString);
        
        $event->job->save();
    }
}
