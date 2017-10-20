<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Authenticated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterLoggedUserCompany
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
     * @param  IlluminateAuthEventsAuthenticated  $event
     * @return void
     */
    public function handle(IlluminateAuthEventsAuthenticated $event)
    {
        session(['company_id' => auth()->user()->company_id]);
    }
}
