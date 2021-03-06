<?php

namespace App\Listeners;

use App\Events\ConversationMessageSent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Notifications\NewConversationMessage;

use App\Models\Conversation\ConversationMessage;

class SendConversationMessageEmail implements ShouldQueue
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
     * @param  ConversationMessageSent  $event
     * @return void
     */
    public function handle(ConversationMessageSent $event)
    {
        // Create the message
        $message = ConversationMessage::make(
                                                [
                                                    'conversation_member_id' => $event->sender->id,
                                                    'type' => 2,
                                                    'subject' => $event->message->subject,
                                                    'message' => $event->message->message
                                                ]
                                            );

        $event->conversation->messages()->save($message);


        $event->conversation->members()->each( function($member) use ($event) {

            $member->user->notify(new NewConversationMessage($event->message));
        });
    }
}
