<?php

namespace App\Listeners;

use App\Events\ApplicantsEliminated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Recruiting\Application;
use App\Notifications\ApplicationRefused;

class EliminateApplicants implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  ApplicantsEliminated  $event
     * @return void
     */
    public function handle(ApplicantsEliminated $event)
    {
        $applications = Application::whereIn('id', $event->applications);

        if(count($applications) > 0)    {

            $applications->each( function($application) use ($event) {

                // Change status
                $application->update(['status' => 666]);

                // Send message
                if(is_array($event->message)) {

                    $message = (object) $event->message;

                    $application->profile->user()->first()->notify(new ApplicationRefused($application, $message));
                }
            });
        }
    }
}
