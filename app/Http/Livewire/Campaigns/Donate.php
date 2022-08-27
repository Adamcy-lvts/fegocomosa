<?php

namespace App\Http\Livewire\Campaigns;

use App\Models\Lga;
use App\Models\User;
use App\Models\Donor;
use App\Models\State;
use Livewire\Component;
use App\Models\Donation;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Auth;
use App\Notifications\DonationNotification;
use Illuminate\Support\Facades\Notification;

class Donate extends Component
{
    use Actions;

    
    public $campaign;
    public $campaignId;
    public $showDonationForm = false;
    public $donationId;
    public $donorId;
    public $fullName;
    public $currency;
    public $phone;
    public $email;
    public $address;
    public $selectedState = null;
    public $selectedCity = null;
    public $cities = null;
    public $comment;
    public $amount;



    public function DonateModal($id)
        {
            $this->campaignId = $id;
            $this->showDonationForm = true;
    
        }

    public function updatedSelectedState($state_id)
    {
   
        $this->cities = Lga::where('state_id', $state_id)->get();
    }

    public function Donate()
    {
        $this->campaignId = $this->campaign->id;
        
        $this->validate([
            'fullName'       => 'required',
            'email'      => 'required',
            'phone'    => 'required',
            'currency'    => 'required',
        ]);

        $donor = Donor::create([
            'full_name' => $this->fullName,
            'email'    => $this->email,
            'phone'    => $this->phone,
            'address'  => $this->address,
            'city'     => $this->selectedCity,
            'state'    => $this->selectedState,
        ]);

        $donation = Donation::create([
            'campaign_id'  => $this->campaignId,
            'user_id'      => Auth::user() ? Auth::user()->id : null,
            'donor_id'     => $donor->id,
            'amount'       => $this->currency,
            'comment'      => $this->comment,
        ]);

        $this->amount = $donation->amount;
        

        $this->notification()->success(
            $title = 'Success',
            $description = 'Donation Recieved Thank you!'
        );
         $users = User::all();
         Notification::send($users, new DonationNotification($donation));
         
     $this->reset(); 
     
     $this->emit('DonationfeedbackMessage');
     $this->emitUp('refreshParent');

    }
    public function render()
    {
            if (auth()->user()) {
            
            $user = User::find(auth()->user()->id);

            $this->fullName      = $user->first_name. ' '.$user->last_name;
            $this->email         = $user->email;
            $this->address       = $user->address;
            $this->phone         = $user->phone;
            $this->selectedState = $user->state_id;
            $this->selectedCity  = $user->city_id;
            $this->amount        = $this->amount ?? '';

           
            

        $city = Lga::with('state.cities')->find($this->selectedCity);

            if ($city) {
                $this->cities = Lga::where('state_id', $city->state->id)->get();

                $this->selectedCity = $city->id;
                $this->selectedState = $user->state_id;

            }



        }
        
        return view('livewire.campaigns.donate', [
             'states' => State::all(),
             'campaign' => $this->campaign, 
        ])->layout('layouts.guest');
    }
}
