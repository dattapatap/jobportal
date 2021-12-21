<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\This;

class AdminRegister extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $user;
    public function __construct( $recruiter, $user)
    {
        $this->user = $user;
        $this->recruiter =  $recruiter;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        if($this->user->role_id==2){
                return ([
                    'data' => "New Recruiter has been registered",
                    'recruiter_id' => $this->recruiter->id,
                    'link'=> '/admin/notifications',
                ]);
        }else{
            return ([
                'data' => "New Employee has been registered",
                'employee_id' => $this->recruiter->id,
                'link'=> '/admin/notifications',
            ]);
        }
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
