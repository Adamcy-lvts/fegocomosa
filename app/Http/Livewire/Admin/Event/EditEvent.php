<?php

namespace App\Http\Livewire\Admin\Event;

use Carbon\Carbon;
use App\Models\Event;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\EventImages;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditEvent extends Component
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
    public $postedEventImage;
    public $postedEventImages;

public function mount($slug)
{
    $event = Event::where('slug', $slug)->first();

        $this->eventId          = $event->id;
        $this->title            = $event->title;
        $this->eventTime        = $event->event_time;
        $this->eventDate        = $event->event_date;
        $this->eventVenue       = $event->event_venue;
        $this->body             = $event->body;
        $this->postedEventImage = $event->image; 
        $this->postedEventImages = $event->images()->get();

}

    public function updateEvent()
    {
        // dd('its working');
        $this->validate([
            'title'       => 'required',
            'eventTime'  => 'required',
            'eventDate'  => 'required',
            'eventVenue' => 'required'
        ]);

        if ($this->image) {
            Storage::delete('public/events_images/'. $this->postedEventImage);
            $this->postedEventImage = $this->image->getClientOriginalName();
            $this->image->storeAs('public/events_images/', $this->postedEventImage);
        }

        Event::find($this->eventId)->update([
            'title' => $this->title,
            'event_time' => $this->eventTime,
            'event_date' => Carbon::create($this->eventDate),
            'event_venue' => $this->eventVenue,
            'body' => $this->body,
            'image' => $this->postedEventImage
        ]);
        

        if ($this->eventImages) {

            $event = Event::find($this->eventId);
           
            foreach ($event->images as $imagesevent) {
                Storage::delete('public/events_images/'. $imagesevent->images);
                $imagesevent->delete();
            }

            foreach ($this->eventImages as $eventImage) {

                $image_name = $eventImage->getClientOriginalName();
    
                $eventImage->storeAs('public/events_images', $image_name);
    
                $eventImages = new EventImages();
    
                $eventImages->images = $image_name;
                $eventImages->event_id = $event->id;
                $eventImages->save();

            }
        }

        $this->notification()->success(
            $title = 'Updated',
            $description = 'Event Updated Successfully'
        );

        $this->emitUp('refreshParent');

         return redirect()->route('event.data')->with('message');
        
    }


    public function render()
    {
        return view('livewire.admin.event.edit-event', [
            'body' => $this->body
        ])->layout('components.dashboard');
    }
}
