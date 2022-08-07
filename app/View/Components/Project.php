<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Project extends Component
{
    public $projects;
    public $projectImages;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($projects, $projectsimages)
    {
        $this->projects = $projects;
        $this->projectImages = $projectsimages;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.project');
    }
}
