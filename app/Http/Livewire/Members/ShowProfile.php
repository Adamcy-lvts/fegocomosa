<?php

namespace App\Http\Livewire\Members;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Artesaos\SEOTools\Facades\OpenGraph;

class ShowProfile extends Component
{
    public $member;

    public function mount(User $member)
    {
        
        $this->member = $member;

        OpenGraph::setTitle('Profile')
             ->setDescription('Some Person')
            ->setType('profile')
            ->setProfile([
                $this->member->first_name => 'string',
                $this->member->last_name => 'string',
                $this->member->username => 'string',
             
            ]);
      

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
