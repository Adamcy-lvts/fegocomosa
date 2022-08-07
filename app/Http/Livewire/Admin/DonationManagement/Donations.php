<?php

namespace App\Http\Livewire\Admin\DonationManagement;

use Carbon\Carbon;
use App\Models\Lga;
use App\Models\Donor;
use App\Models\State;
use Livewire\Component;
use App\Models\Campaign;
use App\Models\Donation;
use WireUi\Traits\Actions;
use Livewire\WithPagination;

class Donations extends Component
{

    use WithPagination;
    use Actions;

    public $donationId;
    public $donorId;
    public $fullName;
    public $currency;
    public $phone;
    public $email;
    public $address;
    public $selectedCampaign;
    public $selectedState = null;
    public $selectedCity = null;
    public $checkedDonations = [];
    public $checkAllItems = false;
    public $checkPageItems = false;
    public $comment;
    public $donationDate;
    public $showModalForm = false;
    public $orgName;
    public $search;
    public $pagination = 5;
    public $cities = null;


    public function updatedSelectedState($state_id)
    {
   
        $this->cities = Lga::where('state_id', $state_id)->get();
    }

    public function DonationModal()
    {
        $this->showModalForm = true;

    }

    public function Donate()
    {
      
        $donor = Donor::create([
            'full_name' => $this->fullName,
            'email'    => $this->email,
            'phone'    => $this->phone,
            'address'  => $this->address,
            'city'     => $this->selectedCity,
            'state'    => $this->selectedState,
        ]);

        $donation = Donation::create([
            'campaign_id'  => $this->selectedCampaign,
            'donor_id'     => $donor->id,
            'amount'       => $this->currency,
            'comment'      => $this->comment,
        ]);
        

        $this->notification()->success(
            $title = 'Success',
            $description = 'Donation Recieved Thank you!'
        );

        $this->reset();
        session()->flash('message', 'Donation Recieved Thank you!');
    }

    public function editDonation($id)
    {

        $this->reset();
        $this->showModalForm = true;

        $this->donationId = $id;

        $donation = Donation::find($this->donationId);

        $this->donorId = $donation->donor->id;

        $selectedCity = $donation->donor->city;

        $city = Lga::with('state.cities')->find($selectedCity);

        if ($city) {
            $this->cities = Lga::where('state_id', $city->state->id)->get();

            $this->selectedCity = $city->id;
            $this->selectedState = $city->state->id;
        }
        
        $this->loadDonation();
        
    }

    public function loadDonation()
    {
        $donation = Donation::find($this->donationId);

        $this->selectedCampaign = $donation->campaign_id;
        $this->currency = $donation->amount;
        $this->comment = $donation->comment;
        $this->date = $donation->date;
        $this->fullName = $donation->donor->full_name;
        $this->email = $donation->donor->email;
        $this->phone = $donation->donor->phone;
        $this->address = $donation->donor->address;
    }

    public function Update()
    {

        $donor = Donor::find($this->donorId);
        
        $donor->update([
            'full_name' => $this->fullName,
            'email'    => $this->email,
            'phone'    => $this->phone,
            'address'  => $this->address,
            'city'     => $this->selectedCity,
            'state'    => $this->selectedState,
        ]);

        $donation = Donation::find($this->donationId);
        
        $donation->update([
            'campaign_id'  => $this->selectedCampaign,
            'donor_id'     => $donor->id,
            'amount'       => $this->currency,
            'comment'      => $this->comment,
        ]);
        
        $this->reset();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Donation Updated Thank you!'
        );
    }

 
    public function DeleteConfirmaton($id)
    {
        $this->donationId = $id;
        $this->notification()->confirm([
            'title'       => 'Donation?',
            'description' => 'You want delete the Donation?',
            'acceptLabel' => 'Yes, Delete it',
            'method'      => 'deleteDonation',
            'params'      => 'Deleted',
        ]);
    }

    public function deleteDonation()
    {
        $donation = Donation::find($this->donationId);
        $donation->delete();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Donation Deleted Successfully'
        );

    }

    public function updatedcheckPageItems($value)
    {
        if ($value) {
            $this->checkedDonations = $this->donations->pluck('id')->map(fn ($item) => (string) $item)->toArray();
        } else {
           $this->checkedDonations = [];
           $this->checkAllItems = false;
        }
    }

    public function updatedcheckedDonations()
    {
        $this->checkPageItems = false;
        
    }

    public function checkAllItems()
    {
        $this->checkAllItems = true;
        $this->checkedDonations = $this->donationsQuery->pluck('id')->map(fn ($item) => (string) $item)->toArray();
    }

    public function  deleteRecords()
    {
        Donation::whereKey($this->checkedDonations)->delete();
        $this->checkedDonations = [];
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


    public function ischeckedDonations($donations_id)
    {
        return in_array($donations_id, $this->checkedDonations);
    }

    public function getDonationsProperty()
    {
        return $this->donationsQuery->paginate($this->pagination);
    }

    public function getDonationsQueryProperty()
    {
        return Donation::search(trim($this->search));
    }


    public function render()
    {
        return view('livewire.admin.donation-management.donations', [ 
        'donations' => $this->donations,
        'states' => State::all(),
        'campaigns' => Campaign::all(),
        ])->layout('components.dashboard');
    }
}
