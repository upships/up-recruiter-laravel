<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use App\Models\Recruiting\Application;

class ApplicationRefused extends Notification
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
            
            $this->message->message = 'Após levar em consideração todos os requisitos da vaga e suas qualificações profissionais, decidimos não dar prosseguimento com a sua candidatura.';
        }

        return (new MailMessage)
                    ->subject('Atualização sobre sua candidatura para vaga de ' . $this->application->job->position->label)
                    ->greeting('Atualização sobre candidatura')
                    ->line($this->message->message)
                    ->line('Seu cadastro ficará no nosso banco de dados e será levado em consideração quando tivermos outras oportunidades que se encaixem no seu perfil.');
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
