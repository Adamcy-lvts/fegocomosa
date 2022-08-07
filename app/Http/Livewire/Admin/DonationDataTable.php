<?php

namespace App\Http\Livewire\Admin;

use App\Models\Lga;
use App\Models\State;
use Livewire\Component;
use App\Models\Donation;
use WireUi\Traits\Actions;
use Livewire\WithPagination;

class DonationDataTable extends Component
{


    use WithPagination;
    use Actions;

    public $donationId = null;
    public $fullName;
    public $email;
    public $address;
    public $showModalForm = false;
    public $cities;
    public $selectedState = null;
    public $selectedCity = null;
    public $checkedDonations = [];
    public $checkAllItems = false;
    public $checkPageItems = false;
    public $currency;
    public $amount;
    public $search;
    public $pagination = 5;

    public function updatedSelectedState($state_id)
    {
   
        $this->cities = Lga::where('state_id', $state_id)->get();
    }

    public function createDonationModal()
    {
        $this->showModalForm = true;
    }

    public function storeDonation()
    {
        $this->validate([
            'fullName' => 'required',
            'email'    => 'required',
            'currency'   => 'required'
        ]);

        // dd($this->currency);
     
        $donation = new Donation();
        $donation->user_id   = auth()->user() ? auth()->user()->id : null;
        $donation->full_name = $this->fullName;
        $donation->email     = $this->email;
        $donation->address   = $this->address;
        $donation->city      = $this->selectedCity;
        $donation->state     = $this->selectedState;
        // $donation->zip       = $this->zip;
        $donation->amount    = $this->currency;

        $donation->save();
        $this->reset();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Donation Created Successfully'
        );
    }

    public function showEditDonation($id)
    {
        $this->reset();
        $this->showModalForm = true;
        $this->donationId = $id;

        $donation = Donation::find($this->donationId);

        $selectedCity = $donation->city;

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
        $donation = Donation::findOrFail($this->donationId);
        // $donation->user_id   = auth()->user() ? auth()->user()->id : null;
        $this->fullName = auth()->user() ? auth()->user()->username : $donation->full_name;
        $this->email = $donation->email;
        $this->address = $donation->address;
        $this->selectedCity = $donation->city;
        $this->selectedState = $donation->state;
        // $this->zip = $donation->zip;
        $this->currency = $donation->amount;
    }

    public function updateDonation()
    {
        $this->validate([
            'fullName' => 'required',
            'email'  => 'required',
            'currency' => 'required'
        ]);

        Donation::find($this->donationId)->update([
            'user_id'   => auth()->user() ? auth()->user()->id : null,
            'full_name' => $this->fullName,
            'email'     => $this->email,
            'address'   => $this->address,
            'city'      => $this->selectedCity,
            'state'     => $this->selectedState,
            // 'zip'       => $this->zip,
            'amount'    => $this->currency,
          
        ]);
        
        $this->reset();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Donation Updated Successfully'
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
        return view('livewire.admin.donation-data-table', [
            'donations' => $this->donations,
            'states' => State::all(),
            ])->layout('components.dashboard');
    }
}
