<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ExecutiveMembers extends Component
{
    public $users;
    public $positions;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($users, $positions)
    {
        $this->users = $users;
        $this->positions = $positions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.executive-members');
    }
}
