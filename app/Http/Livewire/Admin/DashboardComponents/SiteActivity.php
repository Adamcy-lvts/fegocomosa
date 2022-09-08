<?php

namespace App\Http\Livewire\Admin\DashboardComponents;

use App\Models\User;
use Livewire\Component;

class SiteActivity extends Component
{

    protected $listeners = [
    'markAsRead' => '$refresh',
    ];
    public $loginNotifications;
    public $logoutNotifications;


    public function mount()
    {
        $this->loginActivity();
        $this->logoutActivity();
    }

    public function loginActivity()
    {
        $this->loginNotifications = auth()->user()->unreadNotifications->where('type', 'App\Notifications\LoginNotification');

    }

    public function logoutActivity()
    {
        $this->logoutNotifications = auth()->user()->unreadNotifications->where('type', 'App\Notifications\LogoutNotification');
      
    }

    public function markLoginNotesAsRead()
    {
        auth()->user()->unreadNotifications->where('type', 'App\Notifications\LoginNotification')->markAsRead();

        $this->emitSelf('markAsRead');
    }

     public function deleteLoginNotifications()
    {
        $loginNotes = auth()->user()->notifications()->where('type', 'App\Notifications\LoginNotification');
        $loginNotes->delete();
        $this->emitSelf('markAsRead');
    }



    public function markLogoutNotesAsRead()
    {
        auth()->user()->unreadNotifications->where('type', 'App\Notifications\LogoutNotification')->markAsRead();

        $this->emitSelf('markAsRead');
    }

    public function deleteLogoutNotifications()
    {
        auth()->user()->notifications()->where('type', 'App\Notifications\LogoutNotification')->delete();
        $this->emitSelf('markAsRead');
    }
    
    public function render()
    {
        return view('livewire.admin.dashboard-components.site-activity');
    }
}
