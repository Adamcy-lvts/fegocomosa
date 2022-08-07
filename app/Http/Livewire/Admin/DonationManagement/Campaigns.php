<?php

namespace App\Http\Livewire\Admin\DonationManagement;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Campaign;
use App\Models\Organizer;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Campaigns extends Component
{

    use WithFileUploads;
    use Actions;

    public $editMode = false;
    public $campaignId;
    public $campaignTitle;
    public $showModalForm = false;
    public $startingDate;
    public $organizerId;
    public $description;
    public $coverImage;
    public $postedCoverImage;
    public $sumTotal;
    public $checkedCampaigns = [];
    public $checkAllItems = false;
    public $checkPageItems = false;
    public $search;
    public $pagination = 5;

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function DeleteConfirmaton($id)
    {
        $this->campaignId = $id;
        $this->notification()->confirm([
            'title'       => 'Donation?',
            'description' => 'You want delete the Donation?',
            'acceptLabel' => 'Yes, Delete it',
            'method'      => 'deleteCampaign',
            'params'      => 'Deleted',
        ]);
    }

    public function deleteCampaign()
    {
        $campaign = Campaign::find($this->campaignId);
        $campaign->delete();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Campaign Deleted Successfully'
        );

    }

    public function updatedcheckPageItems($value)
    {
        if ($value) {
            $this->checkedCampaigns = $this->campaigns->pluck('id')->map(fn ($item) => (string) $item)->toArray();
        } else {
           $this->checkedCampaigns = [];
           $this->checkAllItems = false;
        }
    }

    public function updatedcheckedCampaigns()
    {
        $this->checkPageItems = false;
        
    }

    public function checkAllItems()
    {
        $this->checkAllItems = true;
        $this->checkedCampaigns = $this->campaignsQuery->pluck('id')->map(fn ($item) => (string) $item)->toArray();
    }

    public function  deleteRecords()
    {
        Campaign::whereKey($this->checkedCampaigns)->delete();
        $this->checkedCampaigns = [];
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


    public function ischeckedCampaigns($campaign_id)
    {
        return in_array($campaign_id, $this->checkedCampaigns);
    }

    public function getCampaignsProperty()
    {
        return $this->campaignsQuery->paginate($this->pagination);
    }

    public function getCampaignsQueryProperty()
    {
        return Campaign::where('campaign_title', 'LIKE', '%' . $this->search . '%');
    }


    public function render()
    {
        // $campaigns = Campaign::with('organisation')->get();

        return view('livewire.admin.donation-management.campaigns', [
            'campaigns' =>  $this->campaigns,
            'organisations' => Organizer::with('campaigns')->get()
        ])->layout('components.dashboard');
    }
}
