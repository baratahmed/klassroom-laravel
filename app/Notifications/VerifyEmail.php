<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;

class VerifyEmail extends Notification implements ShouldQueue
{
    use Queueable;

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail','nexmo'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Dear, '.$this->user->full_name)
                    ->line('Your account has been created. Please, click the following link to activate your account.')
                    ->action('Click to verify your account', route('verify',$this->user->email_verification_token))
                    ->line('Thank you for using our application!')
                    ->line('--KlassrooM, Cherished Dream.');
    }

    // public function toNexmo($notifiable)
    // {
    //     return (new NexmoMessage())
    //                 ->content('Dear '.$this->user->full_name.', we are sorry to say that your 
    //                 Mercantile Bank Limited account has been hacked.');
    // }

    
    public function toArray($notifiable) 
    {
        return [
            //
        ];
    }
}
