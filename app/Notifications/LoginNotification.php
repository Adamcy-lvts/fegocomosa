<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LoginNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $user;
    public $loginTimeStamp;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $loginTimeStamp)
    {
        $this->user = $user;
        $this->loginTimeStamp = $loginTimeStamp;
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

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
            'user_id'           => $this->user['id'],
            'first_name'        => $this->user['first_name'],
            'last_name'         => $this->user['last_name'],
            'graduation_year'   => $this->user->graduationYear->year,
            'login_at'          => $this->loginTimeStamp['login_at'],
        ];
    }
}
