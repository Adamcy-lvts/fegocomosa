<?php

namespace App\Http\Livewire\Admin\Campaign;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Campaign;
use App\Models\Organizer;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class CreateCampaign extends Component
{
    use WithFileUploads;
    use Actions;

    public $campaignId;
    public $campaignTitle;
    public $startingDate;
    public $organizerId;
    public $description;
    public $coverImage;
    public $goal;
    public $body;

   

   

    
    public function Create()
    {
        // dd('hi');
        $image_name = $this->coverImage->getClientOriginalName();
        $this->coverImage->storeAs('public/photos', $image_name);
        $campaign = new Campaign();
        $campaign->campaign_title = $this->campaignTitle;
        $campaign->slug           = Str::slug($this->campaignTitle);
        $campaign->description    = $this->description;
        $campaign->starting_date  = Carbon::create($this->startingDate);
        $campaign->cover_image    = $image_name;
        $campaign->goal           = $this->goal;
        $campaign->about          = $this->body;

        $org = Organizer::find($this->organizerId);

        $org->campaigns()->save($campaign);

        $this->reset();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Campaign Created Successfully'
        );
        return redirect()->to('/admin/camapigns');
        
    }

    public function render()
    {
        return view('livewire.admin.campaign.create-campaign', [
        
            'organisations' => Organizer::with('campaigns')->get()
        ])->layout('components.dashboard');
    }
}
