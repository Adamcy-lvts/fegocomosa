<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactUsMessageNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $data;
    public $email;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data, $email)
    {
        $this->data = $data;
        $this->email = $email;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
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
                    ->from($this->data['email'], $this->data['name'])
                    ->subject('Contact Us Message')
                    ->greeting('Message from'.' '.$this->data['name'].' '.$this->data['email'])
                    ->line($this->data['message'])
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
            'user_id' => $this->data['user_id'] ?? '',
            'name'    => $this->data['name'],
            'email'   => $this->data['email'],
            'message'   => $this->data['message'],
            'datetime'  => $this->data['datetime']
        ];
    }
}
