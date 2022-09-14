<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

     public $member;
     public $adminEmail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( User $member)
    {
        $this->member = $member;
        $this->adminEmail = User::role('Super-Admin')->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->from($this->adminEmail->email, 'Fegocomosa')->markdown('emails.welcome-mail');
    }
}
