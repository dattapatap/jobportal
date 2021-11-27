<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostJob extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public $user, $recruiter;

    public function __construct( $recruiter )
    {
        $this->recruiter = $recruiter;
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
                ->line($this->recruiter)
                ->line('You have posted new job successfully')
                ->action('View', url(base_path().'/employee/notifications'));
    }

    public function toDatabase($notifiable)
    {
        return [
            'data' => $this->recruiter.', you have posted new job successfully',
            'recruiter' => $this->recruiter,
            'link'=> base_path().'/employee/notifications',
        ];
    }

    public function toArray($notifiable)
    {
        return [  ];
    }
}
