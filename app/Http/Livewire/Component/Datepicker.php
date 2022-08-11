<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;

class Datepicker extends Component
{
    public $entry_year_id;
    public $graduation_year_id;

    public function render()
    {
        return view('livewire.component.datepicker');
    }
}
