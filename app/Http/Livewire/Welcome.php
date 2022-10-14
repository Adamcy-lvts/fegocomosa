<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Event;
use Livewire\Component;
use App\Models\Category;
use App\Models\Position;
use App\Models\GuestSlider;
use App\Models\ProjectImages;
use App\Models\ExecutiveMember;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;


class Welcome extends Component
{
    public function render()
    {
        SEOMeta::setTitle('Fegocomosa | Home');
        SEOMeta::setDescription('Federal Government College Maiduguri Old Student Association Website');
        SEOMeta::setCanonical('https://fegocomosa.live');

        SEOTools::setTitle('Fegocomosa');
        SEOTools::setDescription('Federal Government College Maiduguri Old Student Association Website');
        SEOTools::opengraph()->setUrl('https://fegocomosa.live');
        SEOTools::setCanonical('https://fegocomosa.live');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@fegocomosa');
        SEOTools::jsonLd()->addImage('images/Logo-min.svg');

        $currentDate = Carbon::now();

        return view('livewire.welcome', [
            'events' =>Event::latest()->take(3)->where('event_date', '>', $currentDate->toDateString())->get(),
            'projectsimages' => ProjectImages::all(),
            'textsslider' => GuestSlider::all(),
            'procategory'   => Category::take(6)->get(),
            'executives'      => ExecutiveMember::orderBy('id', 'asc')->get(),
            'positions' => Position::take(4)->get(),
          
        ])->layout('layouts.guest');
    }
}
