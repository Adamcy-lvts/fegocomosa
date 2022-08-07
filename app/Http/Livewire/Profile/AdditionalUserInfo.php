<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\SocialMediaLink;

class AdditionalUserInfo extends Component
{
    use Actions;

    public $facebook;
    public $twitter;
    public $instagram;
    public $whatsapp;
    public $telegram;
    public $linkedin;
    public $website;
    public $linksId;

    public function mount()
    {
        $user = auth()->user();
        
    //    dd($user->socialMedia->facebook);
    if ($user->socialMedia) {

        $this->facebook = $user->socialMedia->facebook;
        $this->twitter = $user->socialMedia->twitter;
        $this->instagram = $user->socialMedia->instagram;
        $this->whatsapp = $user->socialMedia->whatsapp;
        $this->telegram = $user->socialMedia->telegram;
        $this->linkedin = $user->socialMedia->linkedin;
        $this->website = $user->socialMedia->website;
           
    }
        
    }

    public function addSocialMediaLinks()
    {

        SocialMediaLink::updateOrCreate(
            [
                'user_id' => auth()->user()->id,
            ],

            [
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'instagram'  => $this->instagram,
            'whatsapp'   => $this->whatsapp,
            'telegram'  => $this->telegram,
            'linkedin'  => $this->linkedin,
            'website'  =>  $this->website
            
            ]);

        $this->notification()->success(
            $title = 'Success',
            $description = 'Links Added'
        );


    }


    public function render()
    {
        return view('livewire.profile.additional-user-info')->layout('components.user-dashboard');
    }
}
