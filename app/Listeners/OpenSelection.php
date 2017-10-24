<?php

namespace App\Listeners;

use App\Events\JobClosed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Recruiting\Selection;

class OpenSelection
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
        // Create new Selection
        $selection = Selection::create(
                                        [
                                            'company_id' => $event->job->company_id,
                                            'job_id' => $event->job->id,
                                            'recruiter_id' => auth()->user()->recruiter->id,
                                            'label' => $event->job->position->label,
                                            'status' => 1
                                        ]
                                      );
        
        // Update the Job with the Selection ID
        $event->job->update(['selection_id' => $selection->id]);
    }
}
