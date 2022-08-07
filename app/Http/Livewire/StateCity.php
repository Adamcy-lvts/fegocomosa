<?php

namespace App\Http\Livewire;

use App\Models\Lga;
use App\Models\State;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class StateCity extends Component
{


    public $selectedState = null;
    public $selectedCity = null;
    public $cities = null;
    public $states = null;

    public function mount()
    {
       
        
    }

    public function updatedSelectedState($state_id)
    {
        $this->cities = Lga::where('state_id', $state_id)->get();
    }

    public function render()
    {
        $this->states = State::all();
        return view('livewire.state-city');
    }
}
