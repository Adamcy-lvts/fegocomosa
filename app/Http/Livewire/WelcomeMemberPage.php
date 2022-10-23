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
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class WelcomeMemberPage extends Component
{
    protected $listeners = [
    'refreshParent' => '$refresh',
    ];

    public function render()
    {
        $url = url('images/Becky_G_1_200.jpg');

        SEOMeta::setTitle('Fegocomosa');
        SEOMeta::setDescription('Federal Government College Maiduguri Old Student Association Website');
        SEOMeta::setCanonical('https://fegocomosa.live/home');

        OpenGraph::setDescription('Federal Government College Maiduguri Old Student Association Website');
        OpenGraph::setTitle('Fegocomosa');
        OpenGraph::setUrl('https://fegocomosa.live/home');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::setSiteName('Fegocomosa');
        OpenGraph::addImage($url);

        TwitterCard::setTitle('Fegocomosa');
        TwitterCard::setSite('@Adams__Mohammed');
        TwitterCard::setImage($url);

        JsonLd::setTitle('Fegocomosa');
        JsonLd::setDescription('Federal Government College Maiduguri Old Student Association Website');
        JsonLd::addImage($url);


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
