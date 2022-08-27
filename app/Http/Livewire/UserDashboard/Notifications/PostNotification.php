<?php

namespace App\Http\Livewire\UserDashboard\Notifications;

use Livewire\Component;

class PostNotification extends Component
{
    protected $listeners = [
    'markAsRead' => '$refresh',
    ];

    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->where('type', 'App\Notifications\PostNotification')->markAsRead();

        $this->emitSelf('markAsRead');
    }
    

    public function render()
    {
        return view('livewire.user-dashboard.notifications.post-notification');
    }
}
