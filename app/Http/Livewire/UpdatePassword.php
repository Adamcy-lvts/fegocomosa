<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UpdatePassword extends Component
{
    public function render()
    {
        return view('livewire.profile.update-password')->layout('components.user-dashboard');
    }
}
