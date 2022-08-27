<?php

namespace App\Http\Livewire\Admin\DashboardComponents;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Campaign;
use App\Models\Donation;
use App\Models\LoginLogoutActivity;

class StatComponent extends Component
{
    public $allMembers;
    public $percentage; 
    public $logins;
    public $loginPercentage;
    public $registeredToday;
    public $todayPercentage;
    public $totalDonation;
    public $campaigns;
    public $donationPercentage;


    public function mount()
    {
        $this->allMembersCount();
        $this->loginCount();
        $this->registeredToday();
        $this->donationCount();
    }

    public function allMembersCount()
    {
         
       $this->allMembers = User::all()->count();
       $this->percentage = ($this->allMembers / 2000) * 100;               
                
    }

    public function loginCount()
    {
        
        $today =  Carbon::today();
        $this->logins = LoginLogoutActivity::whereDate('login_at', $today)->count();
        $this->loginPercentage = ($this->logins / $this->allMembers) * 100;
                  
    }

    public function registeredToday()
    {
      
        $today = Carbon::today();
        
        $this->registeredToday = User::whereDate('created_at', $today)->count();
       
        $this->todayPercentage = ($this->registeredToday / $this->allMembers) * 100;
                 
    }

    public function donationCount()
    {
       
        $this->totalDonation = Donation::count();
        
        $this->campaigns = Campaign::count();

        $this->donationPercentage = 0;

        if ($this->totalDonation) {

            $this->donationPercentage = ($this->campaigns / $this->totalDonation) * 100;
        }
                      
                  
    }
    public function render()
    {
        return view('livewire.admin.dashboard-components.stat-component');
    }
}
