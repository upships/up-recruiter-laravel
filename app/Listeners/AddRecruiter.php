<?php

namespace App\Listeners;

use App\Events\UserAddedToCompany;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Company\Recruiter;

class AddRecruiter
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
     * @param  UserAddedToCompany  $event
     * @return void
     */
    public function handle(UserAddedToCompany $event)
    {
        // Add Recruiter
        $recruiter = new Recruiter;
        $recruiter->company_id = $event->company->id;
        $recruiter->user_id = $event->user->id;
        $recruiter->save();

        // Add company to User
        $event->user->company_id = $event->company->id;
        $event->user->save();
    }
}
