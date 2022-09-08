<?php

namespace App\Http\Livewire\Admin\DashboardComponents;

use App\Models\User;
use Livewire\Component;

class SitetopActivityComponent extends Component
{
    public $setAmbassadorNotes;
    public $newAmbassador;
    public $AmbassadorFullName;
    public $user;
    public $newPostNotification;

    
    protected $listeners = [
    'markAsRead' => '$refresh',
    ];


    public function mount()
    {
        $this->user = auth()->user();
        $this->SetAmbassadorNotification();
        $this->postNotification();
    }
    
    public function markasreadAmbassador($notification)
    {
        
        $this->user->unreadNotifications->where('id', $notification['id'])->markAsRead();

        $this->emitSelf('markAsRead');
    }

    public function markasreadPost($notification)
    {
        $this->user->unreadNotifications->where('id', $notification['id'])->markAsRead();

        $this->emitSelf('markAsRead');
    }

    public function postNotification()
    {
         
        $this->newPostNotification = $this->user->unreadNotifications->where('type', 'App\Notifications\NewPostNotification')->where('created_at', '>=', now()->subDays(30));
        
    }

    public function SetAmbassadorNotification()
    { 

        $this->setAmbassadorNotes = $this->user->unreadNotifications->where('type', 'App\Notifications\NewSetAmbassadorNotification');        
           
    }

    public function render()
    {
        return view('livewire.admin.dashboard-components.sitetop-activity-component');
    }
}
