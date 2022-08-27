<?php

namespace App\Http\Livewire\UserDashboard\Stats;

use Livewire\Component;

class ProfileViews extends Component
{
    public $profileViews;


    public function mount()
    {
        $this->profileViews();
    }

    public function profileViews()
    {
       $this->profileViews = auth()->user()->profile_views;
    }
    
    public function render()
    {
        return view('livewire.user-dashboard.stats.profile-views');
    }
}
