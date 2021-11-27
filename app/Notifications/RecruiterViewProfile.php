<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RecruiterViewProfile extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public $user, $recruiter, $employee;

    public function __construct( $recruiter, $employee )
    {
        $this->recruiter = $recruiter;
        $this->employee = $employee;
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
                ->line('Recruiter viewd your profile.')
                ->action('View', url(base_path().'/employee/notifications'));
    }

    public function toDatabase($notifiable)
    {
        return [
            'data' => 'Recruiter '.$this->recruiter.' just viewed your profile',
            'employee' => $this->employee,
            'recruiter' => $this->recruiter,
            'link'=> base_path().'/employee/notifications',
        ];
    }

    public function toArray($notifiable)
    {
        return [

        ];
    }
}
