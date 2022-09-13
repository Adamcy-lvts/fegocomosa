<?php

namespace App\Http\Livewire\Members;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class ShowProfile extends Component
{
    public $member;

    public function mount(User $member)
    {
        
        $this->member = $member;
      

    }
    public function render()

    {
       $profileKey = 'profile_'.$this->member->id;

            if (!Session::has($profileKey)) {
                $this->member->incrementViewCount();//count the view
                Session::put($profileKey, 1);
            }


        return view('livewire.members.show-profile');
    }
}
