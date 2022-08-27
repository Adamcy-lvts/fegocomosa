<?php

namespace App\Http\Livewire\UserDashboard\Stats;

use Livewire\Component;

class DonationCount extends Component
{
    
    public $donationsCount;


    public function mount()
    {
        $this->donationsCount();
    }

    public function donationsCount()
    {
       $this->donationsCount = auth()->user()->donation->count();
    }

    
    public function render()
    {
        return view('livewire.user-dashboard.stats.donation-count');
    }
}
