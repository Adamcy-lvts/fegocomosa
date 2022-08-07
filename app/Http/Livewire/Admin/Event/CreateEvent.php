<?php

namespace App\Http\Livewire\Admin\Event;

use Carbon\Carbon;
use App\Models\Event;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\EventImages;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class CreateEvent extends Component
{

    use WithFileUploads;
    use Actions;

    public $eventId = null;
    public $title;
    public $body;
    public $image;
    public $eventTime;
    public $eventDate;
    public $eventVenue;
    public $eventImages = [];

    public function createEvent()
    {
        // dd('its working');
        $this->validate([
            'title'       => 'required',
            'eventTime'  => 'required',
            'eventDate'  => 'required',
            'eventVenue' => 'required'
        ]);

        $image_name = $this->image->getClientOriginalName();
      

        $this->image->storeAs('public/photos', $image_name);
        $event = new Event();
        $event->user_id        = auth()->user()->id;
        $event->title          = $this->title;
        $event->slug           = Str::slug($this->title);
        $event->event_time     = $this->eventTime;
        $event->event_date     = Carbon::create($this->eventDate);
        $event->event_venue    = $this->eventVenue;
        $event->body           = $this->body;
        $event->image          = $image_name;
        $event->save();


        foreach ($this->eventImages as $eventImage) {

            $image_name = $eventImage->getClientOriginalName();

            $eventImage->storeAs('public/photos', $image_name);

            $eventImages = new EventImages();

            $eventImages->images = $image_name;
            $eventImages->event_id = $event->id;

            $eventImages->save();

        }
        $this->notification()->success(
            $title = 'Created',
            $description = 'Event Created Successfully'
        );
         $this->emitUp('refreshParent');
         
        return redirect()->route('event.data');

        
    }

    public function render()
    {
        return view('livewire.admin.event.create-event')->layout('components.dashboard');
    }
}
