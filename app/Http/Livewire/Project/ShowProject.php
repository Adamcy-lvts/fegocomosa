<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use Livewire\Component;

class ShowProject extends Component
{
    public $project;

    public function mount($slug)
    {
        $this->project = Project::where('slug', $slug)->first();
         
    }
    public function render()
    {
        
        return view('livewire.project.show-project');
    }
}
