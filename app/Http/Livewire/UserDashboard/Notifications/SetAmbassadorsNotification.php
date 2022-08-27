<?php

namespace App\Http\Livewire\UserDashboard\Notifications;

use Livewire\Component;

class SetAmbassadorsNotification extends Component
{
    protected $listeners = [
    'markAsRead' => '$refresh',
    ];

    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewSetAmbassadorNotification')->markAsRead();

        $this->emitSelf('markAsRead');
    }

    public function render()
    {
        return view('livewire.user-dashboard.notifications.set-ambassadors-notification');
    }
}
