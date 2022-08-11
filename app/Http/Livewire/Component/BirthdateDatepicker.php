<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;

class BirthdateDatepicker extends Component
{
    public $birthdate;
    
    public function render()
    {
        return view('livewire.component.birthdate-datepicker');
    }
}
