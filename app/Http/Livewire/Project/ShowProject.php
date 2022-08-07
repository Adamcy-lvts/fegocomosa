<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use Livewire\Component;

class ShowProject extends Component
{
    public $project;

    public function mount($id)
    {
        $this->project = Project::find($id);
    }
    public function render()
    {
        // $project
        return view('livewire.project.show-project');
    }
}
