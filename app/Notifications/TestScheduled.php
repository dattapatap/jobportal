<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TestScheduled extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public $user, $testSlot, $slottime;

    public function __construct( $testSlot, $slotTime)
    {
        $this->testSlot = $testSlot;
        $this->slottime = $slotTime;
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
                ->line('You Sheduled your assessment test successfully.')
                ->line('The test time slot is ' .$this->testSlot->test_sheduled.' '.Carbon::parse($this->slottime->from)->format('h:m A').'-'.Carbon::parse($this->slottime->to)->format('h:m A'))
                ->action('Take Test', url('http://localhost:8000/employee/assessment'))
                ->line('Thank you for using our application!');
    }

    public function toDatabase($notifiable)
    {
        return ([
            'data' => "Your Test Scheduled Successfully The test time slot is ".$this->testSlot->test_sheduled." ".Carbon::parse($this->slottime->to)->format('h:m A')."-".Carbon::parse($this->slottime->to)->format('h:m A')
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
