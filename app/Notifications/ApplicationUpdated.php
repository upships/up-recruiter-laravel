<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use App\Models\Recruiting\Application;

class ApplicationUpdated extends Notification
{
    use Queueable;

    protected $application;
    protected $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct(Application $application, $message)
    {
        $this->application = $application;
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
        if(!$this->message->message)  {
            
            $this->message->message = 'Sua candidatura foi atualizada para a seguinte etapa: ' . $this->application->step;
        }

        return (new MailMessage)
                    ->subject('Atualização de candidatura: ' . $this->message->subject)
                    ->greeting('Candidatura para vaga de ' . $this->application->job->position->label)
                    ->line($this->message->message)
                    ->line('Caso necessário, em breve entraremos em contato com instruções para a próxima etapa.');
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
