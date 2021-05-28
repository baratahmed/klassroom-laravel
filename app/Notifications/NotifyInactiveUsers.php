<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyInactiveUsers extends Notification implements ShouldQueue
{
    use Queueable;

   
    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('You are not using our services for a long time.')
                    ->action('Please, Login Now', route('login'))
                    ->line('Thank you for using our application!');
    }

}
