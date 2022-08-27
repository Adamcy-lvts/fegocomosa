<?php

namespace App\Http\Livewire\Admin\DashboardComponents;

use Carbon\Carbon;
use Livewire\Component;

class NewMembersComponent extends Component
{
    public $newMemberNotification;
    public $user;

    public function mount()
    {
        $this->user = auth()->user();
        $this->newMembers();
    }

    public function newMembers()
    {
        $today = Carbon::today();
      
        $this->newMemberNotification = $this->user->unreadNotifications->where('type', 'App\Notifications\NewRegisteredMember')
        ->where('created_at', '>=', now()->subDays(30));

    }

    public function render()
    {
        return view('livewire.admin.dashboard-components.new-members-component');
    }
}
