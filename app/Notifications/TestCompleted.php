<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TestCompleted extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public $user, $testSlot, $slottime;

    public function __construct($test)
    {
        $this->testSlot = $test;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        $subject = sprintf('%s: You\'ve got a new message from %s!', config('app.name'), $notifiable->name);
        $greeting = sprintf('Hello %s!', $notifiable->name);
        return (new MailMessage)
                ->subject($subject)
                ->greeting($greeting)
                ->salutation('Yours Faithfully')
                ->line('Your Test Completed Successfully.')
                ->line('Check your score')
                ->action('Check Score', url('http://localhost:8000/employee/assessment'))
                ->line('Thank you for using our application!');
    }

    public function toDatabase($notifiable)
    {
        return [
            'data' => "Your Test Completed Completed Successfully"
        ];
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
