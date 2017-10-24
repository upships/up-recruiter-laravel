<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ApplicantsEliminated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $applications;
    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($applications, $message = null)
    {
        $this->applications = $applications;
        $this->message = $message;
    }
}
