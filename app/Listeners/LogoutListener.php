<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Auth\Events\Logout;
use App\Models\LoginLogoutActivity;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\LogoutNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class LogoutListener
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
    public function handle(Logout $event)
    {
        $admins = User::role('admin')->get();

        $user = $event->user;

        $lastlogin = $user->authentications()->orderByDesc('login_at')->first();

        if($lastlogin) {
         $lastlogin->update([
            'logout_at'  => Carbon::now()->toDateTimeString(),
        ]);
        }
        $logoutime = $user->authentications()->orderByDesc('logout_at')->first();
        
        Notification::send($admins, new LogoutNotification($event->user, $logoutime));
    }
}
