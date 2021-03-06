<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * Create a notification instance.
     *
     * @param  string  $token
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Solicitud de restablecimiento de contraseña')
            ->greeting('Hola ' .$notifiable->name)
            ->line('Te hemos enviado este mensaje ya que fue solicitada un cambio de contraseña, porfavor da click en el siguiente boton: ')
            ->action('Restablecer contraseña', url(config('app.url').route('password.reset', $this->token, false)))
            ->line('si tu no has realizado esta peticion, por favor ignora este correo.')
            ->salutation('Gracias ' .$notifiable->name .' por preferirnos!')
            ;
    }

}
