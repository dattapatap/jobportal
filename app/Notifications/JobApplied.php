<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class JobApplied extends Notification
{
    use Queueable;

    public $employee, $jobid;
    public function __construct($employee, $jobid)
    {
        $this->employee = $employee;
        $this->jobid = $jobid;
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
                ->line($this->employee->first_name)
                ->line('Candidate applied for job')
                ->action('View', url(base_path().'/recruiter/notifications'));
    }

    public function toArray($notifiable)
    {
        return [
            'data' => 'Candidate applied for job',
            'employee' => $this->employee->first_name,
            'link'=> '/recruiter/postedjobs/view/'. $this->jobid.'/',
        ];
    }
}
