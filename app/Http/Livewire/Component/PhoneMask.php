<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;

class PhoneMask extends Component
{
    public $phone;


    public function render()
    {
        return view('livewire.component.phone-mask');
    }
}
