<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use Livewire\Component;

class ProjectIndex extends Component
{
    public function render()
    {
        return view('livewire.project.project-index',[
            'projects' => Project::all(),
            'completedProjects' => Project::groupBy('status', 'completed')->get(),
            'inProgressProjects' => Project::where('status', 'in progress')->get()
        ]);
    }
}
