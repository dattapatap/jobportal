<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResumeDownload extends Notification
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

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $subject = sprintf('You\'ve got a new message from %s', config('app.name'));
        $greeting = sprintf('Hello %s!', $notifiable->name);
        return (new MailMessage)
                ->subject($subject)
                ->greeting($greeting)
                ->salutation('Yours Faithfully')
                ->line('Recruiter downloaded your Resume.')
                ->action('View', url(base_path().'/employee/notifications'));
    }

    public function toDatabase($notifiable)
    {
        return [
            'data' => 'Recruiter downloaded your resume',
            'employee' => $this->employee,
            'recruiter' => $this->recruiter,
            'link'=> base_path().'/employee/notifications',
        ];
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
