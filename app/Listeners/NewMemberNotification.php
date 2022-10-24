<?php

namespace App\Listeners;

use App\Models\User;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\NewRegisteredMember;
use App\Notifications\TelegramNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class NewMemberNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $users = User::all();


        Notification::send($users, new NewRegisteredMember($event->user));

        $user = User::find(1);

        $user->notify(new TelegramNotification($event->user));
    }
}
