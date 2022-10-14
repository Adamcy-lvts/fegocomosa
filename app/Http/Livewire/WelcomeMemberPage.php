<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Event;
use Livewire\Component;
use App\Models\Category;
use App\Models\Position;
use App\Models\GuestSlider;
use App\Models\FeatureImage;
use App\Models\MemberSlider;
use App\Models\ProjectImages;
use App\Models\ExecutiveMember;
use Artesaos\SEOTools\Facades\SEOMeta;


class WelcomeMemberPage extends Component
{

    protected $listeners = [
    'refreshParent' => '$refresh',
    ];
    
    public function render()
    {

        SEOMeta::setTitle('Home');
        SEOMeta::setDescription('Federal Government College Maiduguri Old Student Association');
        SEOMeta::setCanonical('https://fegocomosa.live');

        $currentDate = Carbon::now();
        return view('livewire.welcome-member-page', [
            'events' =>Event::latest()->take(3)->where('event_date', '>', $currentDate->toDateString())->get(),
            'projectsimages' => ProjectImages::all(),
            'procategory'    => Category::take(6)->get(),
            'executives'      => ExecutiveMember::orderBy('id', 'asc')->get(),
            'carousel'       => FeatureImage::all()
        ]);
    }
}
