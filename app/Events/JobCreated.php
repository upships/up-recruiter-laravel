<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\Models\Job;

class JobCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $job;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    
    public function __construct(Job $job)
    {
        $this->job = $job;
    }
}
