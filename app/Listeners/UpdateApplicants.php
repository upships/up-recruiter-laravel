<?php

namespace App\Listeners;

use App\Events\ApplicantsQualified;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Recruiting\Application;
use App\Notifications\ApplicationUpdated;

class UpdateApplicants implements ShouldQueue
{
    use InteractsWithQueue;

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
     * @param  ApplicantsQualified  $event
     * @return void
     */
    public function handle(ApplicantsQualified $event)
    {
        $applications = Application::whereIn('id', $event->applications);

        if(count($applications) > 0)    {

            $applications->each( function($application) use ($event) {

                // Check if the application already have a selection, and if not, get from job
                if(!$application->selection)    {

                    if($application->job->selection)    {

                        $application->selection_id = $application->job->selection->id;
                    }
                }

                // Change status
                $application->status = $event->status;

                // Save changes
                $application->save();

                // Send message
                if(is_array($event->message)) {

                    $message = (object) $event->message;

                    $application->profile->user()->first()->notify(new ApplicationUpdated($application, $message));
                }
            });
        }
    }
}
