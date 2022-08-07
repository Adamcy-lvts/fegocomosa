<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Event;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\EventImages;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EventDataTable extends Component
{


    use WithFileUploads;
    use WithPagination;
    use Actions;


    public $pagination = 5;
    public $eventId = null;
    public $showModalForm = false;
    public $showModalAlert = false;
    public $checkedEvents = [];
    public $checkAllItems = false;
    public $checkPageItems = false;
    public $search = "";


    public function DeleteConfirmaton($id)
    {
        $this->eventId = $id;
        $this->notification()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'You want delete the Event?',
            'acceptLabel' => 'Yes, Delete it',
            'method'      => 'deleteEvent',
            'params'      => 'Deleted',
        ]);
    }

    public function deleteEvent()
    {
        $event = Event::find($this->eventId);
        // dd($event->image);
        Storage::delete('public/photos', $event->image);
        $event->delete();

        foreach ($event->images as $imagesEvent) {
            Storage::delete('public/photos/'. $imagesEvent->images);
            $imagesEvent->delete();
        }

        $this->notification()->success(
            $title = 'Event Deleted',
            $description = 'Event Deleted Successfully'
        );

        $this->reset();
        session()->flash('flash.banner', 'Event Deleted Successfully');

    }


    public function  deleteRecords()
    {
        Event::whereKey($this->checkedEvents)->delete();
        $this->checkedEvents = [];
        $this->reset();

        $this->notification()->success(
            $title = 'Delete Records',
            $description = 'Records Deleted Successfully'
        );
        session()->flash('flash.banner', 'Records Deleted Successfully');        
    }

    public function updatedcheckPageItems($value)
    {
        if ($value) {
            $this->checkedEvents = $this->events->pluck('id')->map(fn ($item) => (string) $item)->toArray();
        } else {
           $this->checkedEvents = [];
           $this->checkAllItems = false;
        }
    }

    public function updatedcheckedEvents()
    {
        $this->checkPageItems = false;
        
    }

    public function checkAllItems()
    {
        $this->checkAllItems = true;
        $this->checkedEvents = $this->eventsQuery->pluck('id')->map(fn ($item) => (string) $item)->toArray();
    }

    

    public function BulkDeleteConfirmation() {
        $this->notification()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'You want delete the selected records?',
            'acceptLabel' => 'Yes, Delete it',
            'method'      => 'deleteRecords',
            'params'      => 'Deleted',
        ]);
    }



    public function CancelConfirmation()
    {
        $this->showModalForm = false;
        $this->showModalAlert = false;
        $this->deleteAlert = false;
        
        if ($this->checkedEvents) {
            $this->checkedEvents = [];
            $this->checkPageItems = false;
        }
       
    }

    
    public function ischeckedEvents($event_id)
    {
        return in_array($event_id, $this->checkedEvents);
    }



    public function render()
    {
        return view('livewire.admin.event-data-table', [

            'events' => $this->events
            
            ])->layout('components.dashboard');
    }

    public function getEventsProperty()
    {
        return $this->eventsQuery->paginate($this->pagination);
    }

    public function getEventsQueryProperty()
    {
        return Event::with(['user'])->search(trim($this->search));
    }
}
