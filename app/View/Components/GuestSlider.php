<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GuestSlider extends Component
{
    public $textsSlider;
    public $membershipInfo;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($textsslider, $membershipinfo)
    {
        $this->textsSlider = $textsslider;
        $this->membershipInfo = $membershipinfo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.guest-slider');
    }
}
