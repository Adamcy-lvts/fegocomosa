<?php

namespace App\Http\Livewire\Admin\DonationManagement;

use Livewire\Component;
use App\Models\Organizer;
use WireUi\Traits\Actions;

class Organizers extends Component
{
    use Actions;

    public $editMode = false;
    public $orgId;
    public $showModalForm = false;
    public $orgName;
    public $checkedOrganizers = [];
    public $checkAllItems = false;
    public $checkPageItems = false;
    public $search;
    public $pagination = 5;


    public function OrgModal()
    {
        $this->showModalForm = true;

    }

    public function showEditModal($id)
    {

        $this->reset();
        $this->showModalForm = true;

        $this->orgId = $id;

        $organizer = Organizer::find($this->orgId);

        $this->loadOrg();

        
    }

    public function loadOrg()
    {
        $organizer = Organizer::find($this->orgId);

        $this->orgName = $organizer->org_name;

    }

    public function storeOrg()
    {
   
        Organizer::create([
            'org_name'  => $this->orgName,
           
        ]);
        
        $this->reset();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Organizer Created Successfully'
        );
        // session()->flash('message', 'Organizer Created Successfully');
    }


    public function updateOrg()
    {
        $organizer = Organizer::find($this->orgId);

        $organizer->update(['org_name'  => $this->orgName, 
     
    ]);
        $this->reset();
        $this->notification()->success(
            $title = 'Success',
            $description = 'Organizer Updated Successfully'
        );
        // session()->flash('message', 'Organizer Updated Successfully');
    }

    public function DeleteConfirmaton($id)
    {
        $this->orgId = $id;
        $this->notification()->confirm([
            'title'       => 'Organizer?',
            'description' => 'You want delete the organizer?',
            'acceptLabel' => 'Yes, Delete it',
            'method'      => 'deleteOrganizer',
            'params'      => 'Deleted',
        ]);
    }

    public function deleteOrganizer()
    {
        $organizer = Organizer::find($this->orgId);
        $organizer->delete();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Organizer Deleted Successfully'
        );

    }

    public function updatedcheckPageItems($value)
    {
        if ($value) {
            $this->checkedOrganizers = $this->organizers->pluck('id')->map(fn ($item) => (string) $item)->toArray();
        } else {
           $this->checkedOrganizers = [];
           $this->checkAllItems = false;
        }
    }

    public function updatedcheckedOrganizers()
    {
        $this->checkPageItems = false;
        
    }

    public function checkAllItems()
    {
        $this->checkAllItems = true;
        $this->checkedOrganizers = $this->organizersQuery->pluck('id')->map(fn ($item) => (string) $item)->toArray();
    }

    public function  deleteRecords()
    {
        Organizer::whereKey($this->checkedOrganizers)->delete();
        $this->checkedOrganizers = [];
        $this->reset();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Records Deleted Successfully'
        );
 
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


    public function ischeckedOrganizers($organizer_id)
    {
        return in_array($organizer_id, $this->checkedOrganizers);
    }

    public function getOrganizersProperty()
    {
        return $this->organizersQuery->paginate($this->pagination);
    }

    public function getOrganizersQueryProperty()
    {
        return Organizer::where('organizer_name', 'LIKE', '%' . $this->search . '%');
    }



    public function render()
    {
        return view('livewire.admin.donation-management.organizers', [
            'organisations' => $this->organizers
        ])->layout('components.dashboard');
    }
}
