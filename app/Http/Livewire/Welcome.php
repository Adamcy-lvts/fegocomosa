<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Event;
use App\Models\Project;
use Livewire\Component;
use App\Models\Category;
use App\Models\Position;
use App\Models\GuestSlider;
use App\Models\ProjectImages;
use App\Models\MembershipInfo;

class Welcome extends Component
{
    public function render()
    {
        $currentDate = Carbon::now();

        return view('livewire.welcome', [
            'events' =>Event::take(3)->where('event_date', '>', $currentDate->toDateString())->get(),
            'projects' => Project::all(),
            'projectsimages' => ProjectImages::all(),
            'textsslider' => GuestSlider::all(),
            'membershipinfo' => MembershipInfo::all(),
            'procategory'   => Category::take(6)->get(),
            'users' => User::all(),
            'positions' => Position::take(4)->get(),
          
        ])->layout('layouts.guest');
    }
}
