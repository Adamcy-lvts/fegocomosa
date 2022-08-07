<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\MembershipInfo;

class CreateMemInfo extends Component
{
    use WithFileUploads;
    use WithPagination;
    use Actions;

    public $info;
    public $postedLogo;
    public $logo;
    public $infoId;

    
      public function memberInfoModal()
    {
        $this->reset();
        $this->infoModalForm = true;
    }

    public function createInfo()
    {
        // dd(request()->info);
        $this->validate([
            'info' => 'required', 
        ]);
        $logo_name = $this->logo->getClientOriginalName();
        $this->logo->storeAs('public/photos', $logo_name);
        $guestInfo = MembershipInfo::create([
            'info' => $this->info,
            'logo' => $logo_name,
            
            ]);

        $this->reset();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Info Created Successfully'
        );
    }
    
    public function render()
    {
        return view('livewire.admin.settings.create-mem-info')->layout('components.dashboard');
    }
}
