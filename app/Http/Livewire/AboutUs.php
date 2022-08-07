<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Position;
use App\Models\SetAmbassador;

class AboutUs extends Component
{
    public function render()
    {
        return view('livewire.about-us', [
            'positions' => Position::all(),
            'ambassadors' => SetAmbassador::all()
        ])->layout('layouts.guest');
    }
}
