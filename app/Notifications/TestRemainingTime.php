<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TestRemainingTime extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public $user;

    public function __construct( $user )
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        $subject = sprintf('You\'ve got a new message from %s', config('app.name'));
        $greeting = sprintf('Hello %s!', $notifiable->name);
        return (new MailMessage)
                ->subject($subject)
                ->greeting($greeting)
                ->salutation('Yours Faithfully')
                ->line('Your Sheduledd test start within 15 Minutes.')
                ->line('Take the test as per you sheduled')
                ->action('Take Test', url(env('APP_URL').'employee/assessment'))
                ->line('Thank you for using our application!');
    }

    public function toDatabase($notifiable)
    {
        return ([
            'data' => "Your Sheduledd test start within 15 Minutes"
        ]);
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
