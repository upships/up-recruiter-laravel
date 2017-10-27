<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\Models\Conversation;
use App\Models\Conversation\ConversationMember;
use App\Models\Conversation\ConversationMessage;

class ConversationMessageSent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    public $message;
    public $conversation;
    public $sender;

    /**
     * Create a new event instance.
     * @param object $conversation
     * @param array $message
     * @param object $sender
     * @return void
     */

    public function __construct(Conversation $conversation, ConversationMember $sender, $message)
    {
        $this->message = $message;
        $this->conversation = $conversation;
        $this->sender = $sender;
    }
}
