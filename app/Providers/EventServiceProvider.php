<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],

        'App\Events\UserAddedToCompany' => ['App\Listeners\AddRecruiter'],
        'App\Events\UserRemovedFromCompany' => ['App\Listeners\RemoveRecruiter'],

        //'Illuminate\Auth\Events\Authenticated' => ['App\Listeners\RegisterLoggedUserCompany'],

        'App\Events\ConversationMessageSent' => ['App\Listeners\SendConversationMessageEmail'],

        'App\Events\JobClosed' => ['App\Listeners\CloseJob', 'App\Listeners\OpenSelection'],

        'App\Events\ApplicantsEliminated' => ['App\Listeners\EliminateApplicants'],
        'App\Events\ApplicantsQualified' => ['App\Listeners\UpdateApplicants'],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
