<?php

namespace App\Listeners;

use App\Events\UserRemovedFromCompany;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RemoveRecruiter
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
     * @param  UserRemovedFromCompany  $event
     * @return void
     */
    public function handle(UserRemovedFromCompany $event)
    {
        $event->recruiter->user()->update(['company_id' => null]);
        $event->recruiter->delete();
    }
}
