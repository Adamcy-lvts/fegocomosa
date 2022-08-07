<?php

namespace App\Http\Livewire\Events;

use Carbon\Carbon;
use App\Models\Event;
use Livewire\Component;

class EventIndex extends Component
{
    public function render()
    {
        $currentDate = Carbon::now();
        
        $upcoming = Event::where('event_date', '>', $currentDate->toDateString())->get();
        $recent = Event::where('event_date', '<', $currentDate->toDateString())->get();
        
        // dd($upcoming);
        return view('livewire.events.event-index', [
            'upComingEvents' => $upcoming,
            'recentEvents' => $recent,
            'events' => Event::all()
        ]);
    }
}
