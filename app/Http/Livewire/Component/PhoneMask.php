<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PhoneMask extends Component
{
    public $phone;

    public function mount()
    {
        if (Auth::user()) {
           $this->phone = Auth::user()->phone;
        }
        
    }

    public function render()
    {
        return view('livewire.component.phone-mask');
    }
}
