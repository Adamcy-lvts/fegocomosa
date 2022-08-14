<?php

namespace App\Http\Livewire\Admin\DashboardComponents;

use Livewire\Component;

class Messages extends Component
{
    public function render()
    {
        $messageNotifications = auth()->user()->unreadNotifications->where('type', 'App\Notifications\ContactUsMessageNotification');

        return view('livewire.admin.dashboard-components.messages', [
            'messageNotifications' => $messageNotifications
        ]);
    }
}
