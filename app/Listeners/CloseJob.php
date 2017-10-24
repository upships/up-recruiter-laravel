<?php

namespace App\Listeners;

use App\Events\JobClosed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CloseJob
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
     * @param  JobClosed  $event
     * @return void
     */
    public function handle(JobClosed $event)
    {
        // Update the status
        $event->job->update(['status' => 2]);

        // Post on LinkedIn
    }
}
