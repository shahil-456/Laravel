<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class InactiveUserNotification extends Notification
{
    public function __construct()
    {
        //  parameters to customize the notification
    }

    public function via($notifiable)
    {
        return ['mail']; 
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Hello!')
                    ->line('You haven’t logged in for 30+ days.')
                    ->line('Thank you');
    }
}
