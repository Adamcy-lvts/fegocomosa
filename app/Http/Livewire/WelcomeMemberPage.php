<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Event;
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
        $currentDate = Carbon::now();
        return view('livewire.welcome-member-page', [
            'events' =>Event::latest()->take(3)->where('event_date', '>', $currentDate->toDateString())->get(),
            'projectsimages' => ProjectImages::all(),
            'procategory'    => Category::take(6)->get(),
            'positions'      => Position::with('user')->take(4)->get(),
            'carousel'       => MemberSlider::all()
        ]);
    }
}
