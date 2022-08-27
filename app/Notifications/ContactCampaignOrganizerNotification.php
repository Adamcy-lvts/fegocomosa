<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactCampaignOrganizerNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
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
        return (new MailMessage)
                    ->from($this->data['email'])
                    ->subject($this->data['campaignTitle'])
                    ->line('Message from'.' '.$this->data['full_name'].' '.'about your Fundraiser'.' '.$this->data['campaignTitle'])
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
            'full_name'    => $this->data['full_name'],
            'email'   => $this->data['email'],
            'message'   => $this->data['message'],
            'campaignTitle' => $this->data['campaignTitle'],
            'timestamp'  => $this->data['timestamp']
        ];
    }
}
