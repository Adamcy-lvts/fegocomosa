<?php

namespace App\Http\Livewire\Events;

use App\Models\Event;
use Livewire\Component;

class ShowEvent extends Component
{
    public function mount($slug)
    {
        $this->event = Event::where('slug', $slug)->first();
    }
    public function render()
    {
        return view('livewire.events.show-event');
    }
}
