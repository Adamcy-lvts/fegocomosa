<?php

namespace App\Notifications;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CommentNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $commentator;
    public $post;
    public $comment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $commentator, Post $post, Comment $comment)
    {
        $this->commentator = $commentator;
        $this->post = $post;
        $this->comment = $comment;
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
        return (new MailMessage)
                    ->subject('Comment on your post'.' '.$this->post->title)
                    ->from($this->commentator->email)
                    ->greeting($this->commentator->name.' '.'Commented on your post.')
                    ->line($this->comment->comment)
                    ->action('view post', url($this->post->slug));
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
