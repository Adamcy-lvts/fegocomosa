<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Event;
use App\Models\Project;
use Livewire\Component;
use App\Models\Category;
use App\Models\Position;
use App\Models\GuestSlider;
use App\Models\MemberSlider;
use App\Models\ProjectImages;
use App\Models\MembershipInfo;

class WelcomeMemberPage extends Component
{

    protected $listeners = [
    'refreshParent' => '$refresh',
    ];
    
    public function render()
    {
        return view('livewire.welcome-member-page', [
            'events'         => Event::take(3)->get(),
            'projects'       => Project::all(),
            'projectsimages' => ProjectImages::all(),
            'procategory'    => Category::take(6)->get(),
            'users'          => User::all(),
            'positions'      => Position::take(4)->get(),
            'carousel'       => MemberSlider::all()
        ]);
    }
}
