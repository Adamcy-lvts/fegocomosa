<?php

namespace App\Http\Livewire\Admin\DashboardComponents;

use App\Models\User;
use Livewire\Component;

class MembersStatsComponent extends Component
{
    public $maleMembers;
    public $allMembers;
    public $MalePercentage;
    public $FemalePercentage;
    public $activeMembers;
    public $activeMembersPercentage;
    public $inActiveMembers;

    public function mount()
    {
        $this->allMembers = User::all()->count();
        $this->MalePercentage();
        $this->FemalePercentage();
        $this->activeMembers();
        $this->inactiveMembers();
    }

    public function MalePercentage()
    {
        
       $this->maleMembers = User::where('gender_id', '1')->count();

       $this->MalePercentage = ($this->maleMembers / $this->allMembers) * 100;   

    }

    public function FemalePercentage()
    {
         
       $this->maleMembers = User::where('gender_id', '2')->count();

       $this->FemalePercentage = ($this->maleMembers / $this->allMembers) * 100;   

    }

    public function activeMembers()
    {
       $this->activeMembers = User::where('active', '1')->count();

       $this->activeMembersPercentage = ($this->activeMembers / $this->allMembers) * 100;  
    }

    public function inactiveMembers()
    {
       $inactiveMembers = User::where('active', '0')->count();

       $this->inActiveMembers = ($inactiveMembers / $this->allMembers) * 100;  
    }

    public function render()
    {
        return view('livewire.admin.dashboard-components.members-stats-component');
    }
}
