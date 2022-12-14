<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LogoutNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $logoutime;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $logoutime)
    {
        $this->logoutime = $logoutime;
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
            'logout_at'         => $this->logoutime['logout_at'],
        ];
    }
}
