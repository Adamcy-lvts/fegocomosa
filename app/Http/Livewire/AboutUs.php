<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Position;
use App\Models\SetAmbassador;
use App\Models\ExecutiveMember;


class AboutUs extends Component
{
    public function render()
    {
        return view('livewire.about-us', [
            'executives' => ExecutiveMember::all(),
            'ambassadors' => SetAmbassador::all()
        ])->layout('layouts.guest');
    }
}
