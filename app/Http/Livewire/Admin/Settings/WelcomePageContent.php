<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\GuestSlider;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\MembershipInfo;
use Illuminate\Support\Facades\Storage;

class WelcomePageContent extends Component
{

    
    use WithFileUploads;
    use WithPagination;
    use Actions;

    public $sliderId;
    public $title;
    public $caption;
    public $bannerId; 
    public $link1;
    public $link2;
    public $Inlink;
    public $Uplink;
    public $h1;
    public $h2;
    public $text;
    public $info;
    public $info1;
    public $info2;
    public $postedLogo;
    public $logo;
    public $infoId;
    public $search;
    public $pagination = 5;
    public $showModalForm = false;
    public $infoModalForm = false;
    public $checkedSliderContent = [];
    public $checkAllItems = false;
    public $checkPageItems = false;


  

public function mount()
{
    $this->search = request()->query('search', $this->search);
}

    public function SliderModal()
    {
        $this->reset();
        $this->showModalForm = true;
    }

    public function createSlider()
    {
        $this->validate([
            'title' => 'required', 
        ]);

       

        $guestSlider = GuestSlider::create([
            'title' => $this->title,
            'banner_id' => $this->bannerId,
            'caption'  => $this->caption,
            'link1' => $this->link1,
            'link2' => $this->link2,
            'info'  => $this->info

            
            ]);
    //   dd($guestSlider);
        $this->reset();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Slider Created Successfully'
        );
    }

    public function EditSlider($id)
    {
        $this->reset();
        $this->showModalForm = true;
        $this->sliderId = $id;
        // dd($id);
        $role = GuestSlider::find($this->sliderId);


        $this->loadSlider();
    }

    public function loadSlider()
    {
        
        $guestSlider = GuestSlider::findOrFail($this->sliderId);
        $this->title = $guestSlider->title;
        $this->bannerId = $guestSlider->banner_id;
        $this->caption  = $guestSlider->caption;
        $this->link1 =    $guestSlider->link1;
        $this->link2 =    $guestSlider->link2;
        $this->info =    $guestSlider->info;
    }

    public function updateSlider()
    {
        $this->validate([
            'title' => 'required', 
        ]);

        $guestSlider = GuestSlider::find($this->sliderId);
        
        $guestSlider->update([
             'title'    => $this->title,
            'banner_id' => $this->bannerId,
            'caption'   => $this->caption,
            'link1'     => $this->link1,
            'link2'     => $this->link2,
            'info'      => $this->info
        ]);
        
        $this->reset();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Slider Updated Successfully'
        );
       

    }

    public function DeleteConfirmaton($id)
    {
        $this->sliderId = $id;
        $this->notification()->confirm([
            'title'       => 'Role?',
            'description' => 'You want delete the Role?',
            'acceptLabel' => 'Yes, Delete it',
            'method'      => 'deleteSlider',
            'params'      => 'Deleted',
        ]);
    }

    public function deleteSlider()
    {
        $guestSlider = GuestSlider::find($this->sliderId);
       
        $guestSlider->delete();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Slider Deleted Successfully'
        );

    }

    public function updatedcheckPageItems($value)
    {
        if ($value) {
            $this->checkedSliderContent = $this->sliders->pluck('id')->map(fn ($item) => (string) $item)->toArray();
        } else {
           $this->checkedSliderContent = [];
           $this->checkAllItems = false;
        }
    }

    public function updatedcheckedSliderContent()
    {
        $this->checkPageItems = false;
        
    }

    public function checkAllItems()
    {
        $this->checkAllItems = true;
        $this->checkedSliderContent = $this->slidersQuery->pluck('id')->map(fn ($item) => (string) $item)->toArray();
    }

    public function  deleteRecords()
    {
        GuestSlider::whereKey($this->checkedSliderContent)->delete();
        $this->checkedSliderContent = [];
        $this->reset();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Records Deleted Successfully'
        );
 
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


    public function ischeckedSliderContent($slider_id)
    {
        return in_array($slider_id, $this->checkedSliderContent);
    }

public function getSliderSProperty()
    {
        return $this->sliderSQuery->paginate($this->pagination);
    }

    public function getSlidersQueryProperty()
    {
        return GuestSlider::where('title', 'LIKE', '%' . $this->search . '%');
    }
    

    public function DeleteConfirm($id)
    {
        $this->infoId = $id;
        $this->notification()->confirm([
            'title'       => 'Info?',
            'description' => 'You want delete the Info?',
            'acceptLabel' => 'Yes, Delete it',
            'method'      => 'deleteInfo',
            'params'      => 'Deleted',
        ]);
    }

    public function deleteInfo()
    {
        $guestInfo = MembershipInfo::find($this->infoId);
       
        $guestInfo->delete();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Info Deleted Successfully'
        );

    }

    public function render()
    {
        return view('livewire.admin.settings.welcome-page-content',[
            'sliders' => $this->sliders, 
        ])->layout('components.dashboard');
    }
}
