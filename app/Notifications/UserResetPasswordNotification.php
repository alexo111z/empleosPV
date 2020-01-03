<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserResetPasswordNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
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
        ->subject('Notificación para reestablecer contraseña.')
            ->line(' Tu haz recibido este correo porque se realizó una solicitud de cambio de contraseña para tu cuenta.')
            ->action('Cambiar contraseña ', url(route('user.password.reset', ['token' => $this->token, 'email' => $notifiable->getEmailForPasswordReset()], false)))
            //->line(Lang::get('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
            ->line('Si tu no solicitaste un cambio de contraseña, puedes ignorar este correo.');
        /*->line('Reciviste este correo porque se realizo una solicitud de cambio de contraseña para tu cuenta.')
        ->action('Cambiar contraseña', route('user.password.reset', $this->token))
        ->line('Si tu no solicitaste un cambio de contraseña, puedes ignorar este correo.');*/
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