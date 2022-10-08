<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Project;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use App\Models\ImageCaption;
use Livewire\WithPagination;
use App\Models\ProjectImages;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ProjectsDataTable extends Component
{



    use WithFileUploads;
    use WithPagination;
    use Actions;



    public $projectId = null;
    public $projectImageId;
    public $imagesId;
    public $title;
    public $body;
    public $budget;
    public $startingDate;
    public $completionDate;
    public $status;
    public $progressIndicator;
    public $proposedBy;
    public $executedBy;
    public $image;
    public $projectImages = [];
    public $captions = [];
    public $caption;
    public $postphotos;
    public $postedProjectImages;
    public $showModalForm = false;
    public $postedProjectImage;
    public $checkedProjects = [];
    public $checkAllItems = false;
    public $checkPageItems = false;
    public $search = "";
    public $pagination = 5;
   


    public function createProjectModal()
    {
        $this->reset();
        $this->showModalForm = true;
       
    }

    public function showEditProject($id)
    {
        $this->reset();
        $this->showModalForm = true;
        $this->projectId = $id;
        $this->loadProject();
        
    }

    public function loadProject()
    {
        $project = Project::findOrFail($this->projectId);

        $this->title             = $project->title;
        $this->status            = $project->status;
        $this->budget            = $project->budget;
        $this->proposedBy        = $project->proposed_by;
        $this->executedBy        = $project->executed_by;
        $this->startingDate      = $project->starting_date;
        $this->completionDate    = $project->completion_date;
        $this->progressIndicator = $project->progress_indicator;
        $this->body              = $project->body;
        $this->postedProjectImage = $project->cover_image;
        $this->postedProjectImages = $project->images()->get();
       
       
    }

    public function updateProject()
    {
        $this->validate([
            'title' => 'required',
            'status' => 'required',
            'budget' => 'required',
            'proposedBy' => 'required',
            'executedBy' => 'required',
            'startingDate' => 'required',
            'completionDate' => 'required',
            'progressIndicator' => 'required',
            'body'  => 'required',
            'image' => 'image|max:1024|nullable'
        ]);

        if ($this->image) {
            Storage::delete('public/projects_images/'. $this->postedProjectImage);
            $this->postedProjectImage = $this->image->getClientOriginalName();
            $this->image->storeAs('public/projects_images/', $this->postedProjectImage);
        }

        Project::find($this->projectId)->update([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'status' => $this->status,
            'budget' =>  $this->budget,
            'proposed_by' =>  $this->proposedBy,
            'executed_by' =>  $this->executedBy,
            'starting_date' =>  $this->startingDate,   
            'completion_date' =>  $this->completionDate, 
            'progress_indicator' =>  $this->progressIndicator, 
            'body' => $this->body,
            'cover_image' => $this->postedProjectImage
        ]);

      
        if ($this->projectImages) {


            $project = Project::find($this->projectId);
           
            foreach ($project->images as $projectimage) {
                Storage::delete('public/projects_images/'. $projectimage->images);
                $projectimage->delete();
            }

            foreach ($this->projectImages as $key => $projectImage) {

                $image_name = $projectImage->getClientOriginalName();
    
                $projectImage->storeAs('public/projects_images', $image_name);
    
                $projectImages = new ProjectImages();
    
                $projectImages->images = $image_name;
                $projectImages->project_id = $project->id;
                $projectImages->caption = $this->captions[$key];
                $projectImages->save();
    
                $projectImages->save();
    
            }
           
        }

        $this->notification()->success(
            $title = 'Success',
            $description = 'Project Updated Successfully'
        );
        
        $this->reset();
        session()->flash('flash.banner', 'Project Updated Successfully');
       

    }

public function storeProject()
    {
        $this->validate([
            'title' => 'required',
            'status' => 'required',
            'budget' => 'required',
            'proposedBy' => 'required',
            'executedBy' => 'required',
            'startingDate' => 'required',
            'completionDate' => 'required',
            'progressIndicator' => 'required',
            'body'  => 'required',
            'image' => 'image|max:1024|nullable'
        ]);


        $image_name = $this->image->getClientOriginalName();
        $this->image->storeAs('public/projects_images', $image_name);
        $project = new Project();
        $project->user_id = auth()->user()->id;
        $project->title = $this->title;
        $project->slug = Str::slug($this->title);
        $project->status = $this->status;
        $project->budget = $this->budget;
        $project->proposed_by = $this->proposedBy;
        $project->executed_by = $this->executedBy;
        $project->starting_date = Carbon::create($this->startingDate);
        $project->completion_date = Carbon::create($this->completionDate);
        $project->progress_indicator = $this->progressIndicator;
        $project->body = $this->body;
        $project->cover_image = $image_name;
        $project->save();


        foreach ($this->projectImages as $key => $value) {
        $image_name = $value->getClientOriginalName();
        $value->storeAs('public/projects_images', $image_name);
        $projectImages = new ProjectImages();
        $projectImages->project_id = $project->id;
        $projectImages->images = $image_name;
        $projectImages->caption = $this->captions[$key];
        $projectImages->save();
}
        
        $this->notification()->success(
            $title = 'Success',
            $description = 'Project Created Successfully'
        );
        $this->reset();
    }

    public function DeleteConfirmaton($id)
    {
        $this->projectId = $id;
        $this->notification()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'You want delete the Event?',
            'acceptLabel' => 'Yes, Delete it',
            'method'      => 'deleteProject',
            'params'      => 'Deleted',
        ]);
    }

    public function deleteProject()
    {
        $project = Project::find($this->projectId);
        Storage::delete('public/projects_images/'.$project->image);
        $project->delete();

        foreach ($project->images as $imagesproject) {
            Storage::delete('public/projects_images/'. $imagesproject->images);
            $imagesproject->delete();
        }

        $this->notification()->success(
            $title = 'Delete Project',
            $description = 'Project Deleted Successfully'
        );
        session()->flash('flash.banner', 'Project Deleted Successfully');

    }

    public function removeProjectImage($postedImageId)
    {
        $postPicture = ProjectImages::find($postedImageId);

        Storage::delete('public/projects_images/'.$postPicture->images);
        $postPicture->delete();
        $this->loadProject();
        session()->flash('message', 'Comment deleted successfully');
    }


    public function  deleteRecords()
    {
        Project::whereKey($this->checkedProjects)->delete();
        $this->checkedProjects = [];
        $this->reset();

        $this->notification()->success(
            $title = 'Delete Records',
            $description = 'Records Deleted Successfully'
        );
        session()->flash('flash.banner', 'Records Deleted Successfully');        
    }

    public function updatedcheckPageItems($value)
    {
        if ($value) {
            $this->checkedProjects = $this->projects->pluck('id')->map(fn ($item) => (string) $item)->toArray();
        } else {
           $this->checkedProjects = [];
           $this->checkAllItems = false;
        }
    }

    public function updatedcheckedProjects()
    {
        $this->checkPageItems = false;
        
    }

    public function checkAllItems()
    {
        $this->checkAllItems = true;
        $this->checkedProjects = $this->projectsQuery->pluck('id')->map(fn ($item) => (string) $item)->toArray();
    }

    

    public function BulkDeleteConfirmation() {
        $this->notification()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'You want delete the selected records?',
            'acceptLabel' => 'Yes, Delete it',
            'method'      => 'deleteRecords',
            'params'      => 'Deleted',
        ]);
    }



    public function CancelConfirmation()
    {
        $this->showModalForm = false;
        
        if ($this->checkedProjects) {
            $this->checkedProjects = [];
            $this->checkPageItems = false;
        }
       
    }

    
    public function ischeckedProjects($event_id)
    {
        return in_array($event_id, $this->checkedProjects);
    }



    public function render()
    {
        return view('livewire.admin.projects-data-table', ['projects' => $this->projects])->layout('components.dashboard');
    }

    public function getProjectsProperty()
    {
        return $this->projectsQuery->paginate($this->pagination);
    }

    public function getProjectsQueryProperty()
    {
        return Project::select('id','title','status','budget','completion_date','starting_date')->search(trim($this->search));
    }
}
