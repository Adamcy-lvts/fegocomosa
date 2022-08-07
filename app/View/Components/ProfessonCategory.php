<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProfessonCategory extends Component
{
    public $ProCategory;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($procategory)
    {
        $this->ProCategory = $procategory;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.professon-category');
    }
}
