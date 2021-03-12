<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\This;

class UserRegistration extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $user;
    public function __construct($user)
    {
        $this->user = $user;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $subject = sprintf('%s: You\'ve got a new message from %s!', config('app.name'), $this->user->name);
        $greeting = sprintf('Hello %s!', $this->user->name);
        if($this->user->role_id == 2){
            return (new MailMessage)
                    ->subject($subject)
                    ->greeting($greeting)
                    ->salutation('Yours Faithfully')
                    ->line('Your Registration is done successfully.')
                    ->line('Your User Id is - '.$this->user->email)
                    ->line('Please update your profile, and post the adds.')
                    ->action('Click To Login', url('http://127.0.0.1:8000/login'))
                    ->line('Thank you for using our application!');
        }else{
            return (new MailMessage)
                ->subject($subject)
                ->greeting($greeting)
                ->salutation('Yours Faithfully')
                ->line('Your Registration is done successfully.')
                ->line('Your User Id is - '.$this->user->email)
                ->line('Please update your profile, and take self assessment test for skills vefifications for further process.')
                ->action('Mail Action', url('http://127.0.0.1:8000/login'))
                ->line('Thank you for using our application!');
        }
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
