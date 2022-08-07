<?php

namespace App\Http\Livewire\Admin\DonationManagement;

use App\Models\Lga;
use App\Models\Donor;
use App\Models\State;
use Livewire\Component;
use WireUi\Traits\Actions;

class Donors extends Component
{

    use Actions;

    public $donorId;
    public $showModalForm = false;
    public $checkedDonors = [];
    public $checkAllItems = false;
    public $checkPageItems = false;
    public $selectedState = null;
    public $selectedCity = null;
    public $fullName;
    public $phone;
    public $address;
    public $email;
    public $cities;
    public $search;
    public $pagination = 5;



    public function updatedSelectedState($state_id)
    {
   
        $this->cities = Lga::where('state_id', $state_id)->get();
    }

    public function DonorModal()
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
        
        $this->notification()->success(
            $title = 'Success',
            $description = 'Donation Recieved Thank you!'
        );

        $this->reset();
        session()->flash('message', 'Donation Recieved Thank you!');
    }

    public function editDonor($id)
    {

        $this->reset();
        $this->showModalForm = true;

        $this->donorId = $id;

        $donor = Donor::find($this->donorId);

        $selectedCity = $donor->city;

        $city = Lga::with('state.cities')->find($selectedCity);

        if ($city) {
            $this->cities = Lga::where('state_id', $city->state->id)->get();

            $this->selectedCity = $city->id;
            $this->selectedState = $city->state->id;
        }
        
        $this->loadDonor();
        
    }

    public function loadDonor()
    {
        $donor = Donor::find($this->donorId);

        $this->fullName = $donor->full_name;
        $this->email = $donor->email;
        $this->phone = $donor->phone;
        $this->address = $donor->address;
        $this->selectedCity = $donor->city;
        $this->selectedState = $donor->state;
    }

    public function Update()
    {
        $donor = Donor::find($this->donorId);
        
        $donor->update([
            'full_name' => $this->fullName,
            'email'     => $this->email,
            'phone'     => $this->phone,
            'address'   => $this->address,
            'city'      => $this->selectedCity,
            'state'     => $this->selectedState,
        ]);

        $this->reset();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Donation Updated Thank you!'
        );
    }


    public function DeleteConfirmaton($id)
    {
        $this->donorId = $id;
        $this->notification()->confirm([
            'title'       => 'Donation?',
            'description' => 'You want delete the Donation?',
            'acceptLabel' => 'Yes, Delete it',
            'method'      => 'deleteDonor',
            'params'      => 'Deleted',
        ]);
    }

    public function deleteDonor()
    {
        $donation = Donor::find($this->donorId);
        $donation->delete();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Donor Deleted Successfully'
        );

    }

    public function updatedcheckPageItems($value)
    {
        if ($value) {
            $this->checkedDonors = $this->donors->pluck('id')->map(fn ($item) => (string) $item)->toArray();
        } else {
           $this->checkedDonors = [];
           $this->checkAllItems = false;
        }
    }

    public function updatedcheckedDonors()
    {
        $this->checkPageItems = false;
        
    }

    public function checkAllItems()
    {
        $this->checkAllItems = true;
        $this->checkedDonors = $this->donorsQuery->pluck('id')->map(fn ($item) => (string) $item)->toArray();
    }

    public function  deleteRecords()
    {
        Donor::whereKey($this->checkedDonors)->delete();
        $this->checkedDonors = [];
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


    public function ischeckedDonors($donors_id)
    {
        return in_array($donors_id, $this->checkedDonors);
    }

    public function getDonorsProperty()
    {
        return $this->donorsQuery->paginate($this->pagination);
    }

    public function getDonorsQueryProperty()
    {
        return Donor::search(trim($this->search));
    }


    public function render()
    {
        return view('livewire.admin.donation-management.donors', [
            'donors' => $this->donors,
            'states' => State::all(),
        ])->layout('components.dashboard');
    }
}
