<?php

namespace App\Http\Livewire\Campaigns;

use App\Models\Lga;
use App\Models\User;
use App\Models\Donor;
use App\Models\State;
use Livewire\Component;
use App\Models\Campaign;
use App\Models\Donation;
use WireUi\Traits\Actions;

class CampaignShow extends Component
{
    use Actions;


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
    public $message;
    public $contact = false;
 
    // protected $listeners = ['reRenderParent'];

    protected $listeners = [
    'refreshParent' => '$refresh',
    ];
    
    public function mount($slug)
    {
        $this->campaigns = Campaign::where('slug', $slug)->first();


        if (auth()->user()) {
            
            $user = User::find(auth()->user()->id);

            $this->fullName      = $user->first_name. ' '.$user->last_name;
            $this->email         = $user->email;
            $this->address       = $user->address;
            $this->phone         = $user->phone;
            $this->selectedState = $user->state_id;
            $this->selectedCity  = $user->city_id;

           
            

        $city = Lga::with('state.cities')->find($this->selectedCity);

            if ($city) {
                $this->cities = Lga::where('state_id', $city->state->id)->get();

                $this->selectedCity = $city->id;
                $this->selectedState = $user->state_id;

            }



        }
      
    }

    public function sendMessage()
    {
        $this->contact = true;

    }

    public function MessageOrganizer()
    {

        // $message = new Message;
        // $message->full_name = $this->fullName;
        // $message->email = $this->email;
        // $message->message = $this->message;
        // $message->save();


        // $this->fullName = '';
        // $this->email = '';
        $this->contact = false;
    }

    public function updatedSelectedState($state_id)
    {
   
        $this->cities = Lga::where('state_id', $state_id)->get();
    }

    

    public function render()
    {
        return view('livewire.campaigns.campaign-show', [
            'states' => State::all(),
            'campaign' => $this->campaigns,
        ])->layout('layouts.guest');
    }
}
