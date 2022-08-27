<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use App\Models\LoginLogoutActivity;
use App\Notifications\LoginNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class LoginListener
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
    public function handle(Login $event)
    {
        $admins = User::role('admin')->get();
// dd(session()->getId());
        $loginTimeStamp = LoginLogoutActivity::create([
            'user_id' => $event->user->id,
            'ip_address' => request()->ip(),
            'user_agent' => request()->header('user-agent'),
            'login_at'  => Carbon::now()->toDateTimeString(),
           
        ]);

        Notification::send($admins, new LoginNotification($event->user, $loginTimeStamp));
    }
}
