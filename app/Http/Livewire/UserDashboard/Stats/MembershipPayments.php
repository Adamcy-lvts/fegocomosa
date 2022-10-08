<?php

namespace App\Http\Livewire\UserDashboard\Stats;

use Livewire\Component;
use App\Models\MembershipPayment;

class MembershipPayments extends Component
{
    public $membershipPayment;
   
    public function mount()
    {
         $this->membershipPayment = MembershipPayment::where('user_id', auth()->user()->id)
                ->where('year', now()->year)
                ->first();
    }
          
      

    public function render()
    {
        return view('livewire.user-dashboard.stats.membership-payments');
    }
}
