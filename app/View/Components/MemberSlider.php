<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MemberSlider extends Component
{
    public $carousel;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($carousel)
    {
        $this->carousel = $carousel;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.member-slider');
    }
}
