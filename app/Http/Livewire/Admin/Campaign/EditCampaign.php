<?php

namespace App\Http\Livewire\Admin\Campaign;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Campaign;
use App\Models\Organizer;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditCampaign extends Component
{
    use WithFileUploads;
    use Actions;

    public $campaignId;
    public $campaignTitle;
    public $startingDate;
    public $organizerId;
    public $description;
    public $coverImage;
    public $postedCoverImage;
    public $goal;
    public $body;

    public function mount($slug)
    {
        $campaign = Campaign::where('slug', $slug)->first();

        $this->campaignTitle = $campaign->campaign_title;
        $this->startingDate = $campaign->starting_date;
        $this->organizerId = $campaign->org_id;
        $this->description = $campaign->description;
        $this->postedCoverImage = $campaign->cover_image;
        $this->goal = $campaign->goal;
        $this->body = $campaign->about;
        $this->campaignId = $campaign->id;

    }
    
    public function Update()
    {

        if ($this->coverImage) {
            Storage::delete('public/campaigns_images/'. $this->postedCoverImage);
            $this->postedCoverImage = $this->coverImage->getClientOriginalName();
            $this->coverImage->storeAs('public/photos/', $this->postedCoverImage);
        }
        // dd($this->postedCoverImage);

        $campaign = Campaign::find($this->campaignId);

        $campaign->update([
            
            'campaign_title' => $this->campaignTitle,
            'description'    => $this->description,
            'starting_date'  => Carbon::create($this->startingDate),
            'cover_image'    => $this->postedCoverImage,
            'goal'           => $this->goal,
            'about'          => $this->body,
     
    ]);
    $org = Organizer::find($this->organizerId);

    $org->campaigns()->save($campaign);
        
        $this->reset();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Campaign Updated Successfully'
        );
       return redirect()->to('/admin/camapigns');
    }

    public function render()
    {
        return view('livewire.admin.campaign.edit-campaign', [
            'body' => $this->body,
            'organisations' => Organizer::with('campaigns')->get()
        ])->layout('components.dashboard');
    }
}
