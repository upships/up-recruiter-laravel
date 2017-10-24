<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ApplicantsQualified
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    public $applications;
    public $message;
    public $status;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public function __construct($applications, $status, $message = null)
    {
        $this->applications = $applications;
        $this->message = $message;
        $this->status = $status;
    }
}
