<?php

namespace App\Http\Livewire\Campaigns;

use Carbon\Carbon;
use App\Models\Lga;
use App\Models\User;
use App\Models\Donor;
use App\Models\State;
use Livewire\Component;
use App\Models\Campaign;
use App\Models\Donation;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Auth;
use App\Notifications\DonationNotification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ContactCampaignOrganizerNotification;

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
    public $campaignId;
    public $campaign;
 
    // protected $listeners = ['reRenderParent'];

    protected $listeners = [
    'refreshParent' => '$refresh',
    ];
    
    public function mount($slug)
    {
        $this->campaign = Campaign::where('slug', $slug)->first();
        $this->campaignId = $this->campaign->id;


        if (auth()->user()) {
            
            $user = User::find(auth()->user()->id);
   
            $this->fullName      = $user->first_name. ' '.$user->last_name;
            $this->email         = $user->email;
            $this->address       = $user->address;
            $this->phone         = $user->phone;
            $this->selectedState = $user->state_id;
            $this->selectedCity  = $user->city_id;

           
            

        // $city = Lga::with('state.cities')->find($this->selectedCity);

        //     if ($city) {
        //         $this->cities = Lga::where('state_id', $city->state->id)->get();

        //         $this->selectedCity = $city->id;
        //         $this->selectedState = $user->state_id;

        //     }



        }
      
    }



    public function MessageOrganizer()
    {

       $this->validate([
            'fullName'       => 'required',
            'email'      => 'required',
            'message'    => 'required',
        ]);


      if (auth()->user()) {

        $data = [
            'user_id' => auth()->user()->id,
            'full_name' => $this->fullName,
            'email'  => $this->email,
            'message' => $this->message,
            'campaignTitle' => $this->campaign->campaign_title,
            'timestamp' => Carbon::now()

        ];
      } else {
        $data = [
            'full_name' => $this->fullName,
            'email'  => $this->email,
            'message' => $this->message,
            'campaignTitle' => $this->campaign->campaign_title,
            'timestamp' => Carbon::now()

        ];
      }

      $organizer = $this->campaign->organizer;

      $organizer->notify(new ContactCampaignOrganizerNotification($data));


        $this->fullName = '';
        $this->email = '';
        $this->message = '';

        $this->emit('feedbackMessage');
        
    }

    public function updatedSelectedState($state_id)
    {
   
        $this->cities = Lga::where('state_id', $state_id)->get();
    }

    public function Donate()
    {
        $this->validate([
            'full_name'       => 'required',
            'email'      => 'required',
            'phone'    => 'required',
            'amount'    => 'required',
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
        

        $this->notification()->success(
            $title = 'Success',
            $description = 'Donation Recieved Thank you!'
        );

        $users = User::all();

         Notification::send($users, new DonationNotification($donation));
         
     $this->reset();

     $this->emit('refreshSelf');

    }

    public function render()
    {
        return view('livewire.campaigns.campaign-show', [
            'campaign' => $this->campaign,
        ])->layout('layouts.guest');
    }
}
