<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewConversationMessage extends Notification
{
    use Queueable;

    public $message;

    /**
     * Create a new notification instance.
     * @param array $message [subject, message]
     * @return void
     */
    public function __construct($message)
    {
        $this->message = (object) $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject($this->message->subject)
                    ->line('Você recebeu a seguinte mensagem do Recrutamento:')
                    ->line($this->message->message)
                    ->action('Acessar a Área do Candidato', url('/'))
                    ->line('Você também pode responder a esta mensagem diretamente por este e-mail.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
