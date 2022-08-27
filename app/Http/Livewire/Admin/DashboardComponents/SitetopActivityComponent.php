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

    public function mount()
    {
        $this->user = auth()->user();
        $this->SetAmbassadorNotification();
        $this->postNotification();
    }
    

    public function postNotification()
    {
         
        $this->newPostNotification = $this->user->unreadNotifications->where('type', 'App\Notifications\NewPostNotification')->where('created_at', '>=', now()->subDays(30));
        
    }

    public function SetAmbassadorNotification()
    {
        

        $this->setAmbassadorNotes = $this->user->unreadNotifications->where('type', 'App\Notifications\NewSetAmbassadorNotification')->where('created_at', '>=', now()->subDays(30));
            
           foreach ($this->setAmbassadorNotes as $AmbassadorNote) {
            $this->newAmbassador = User::find($AmbassadorNote->data['user_id']);
           }
        
        
        if ($this->newAmbassador) {

            $this->AmbassadorFullName = $this->newAmbassador->first_name . ' ' . $this->newAmbassador->last_name;
        }
                
           
    }
    public function render()
    {
        return view('livewire.admin.dashboard-components.sitetop-activity-component');
    }
}
