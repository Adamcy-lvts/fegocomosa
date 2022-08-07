<?php

namespace App\Http\Livewire\Members;

use App\Models\User;
use Livewire\Component;

class ShowProfile extends Component
{
    public $member;

    public function mount($id)
    {
        $this->member = User::find($id);
        // dd($this->member);

    }
    public function render()
    {
        return view('livewire.members.show-profile');
    }
}
