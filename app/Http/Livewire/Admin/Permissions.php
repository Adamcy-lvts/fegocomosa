<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class Permissions extends Component
{
    use WithPagination;
    use Actions;

    public $permissionId;
    public $name;
    public $showModalForm = false;
    public $checkedPermissions = [];
    public $checkAllItems = false;
    public $checkPageItems = false;
    public $search;
    public $pagination = 5;
  

public function mount()
{
    $this->search = request()->query('search', $this->search);
}

    public function PermissionModal()
    {
        $this->reset();
        $this->showModalForm = true;
    }

    public function createPermission()
    {
        $this->validate([
            'name' => 'required', 
        ]);

        Permission::create(['name' => $this->name]);

        $this->reset();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Permission Created Successfully'
        );
    }

    public function EditPermission($id)
    {
        $this->reset();
        $this->showModalForm = true;
        $this->permissionId = $id;
        $this->loadPermission();
    }

    public function loadPermission()
    {
        $permission = Permission::findOrFail($this->permissionId);
        $this->name = $permission->name;
    }

    public function updatePermission()
    {
        $this->validate([
            'name' => 'required', 
        ]);

        Permission::find($this->permissionId)->update([
            'name' => $this->name
        ]);
        
        $this->reset();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Permission Updated Successfully'
        );
       

    }

    public function DeleteConfirmaton($id)
    {
        $this->permissionId = $id;
        $this->notification()->confirm([
            'title'       => 'Permission?',
            'description' => 'You want delete the Permission?',
            'acceptLabel' => 'Yes, Delete it',
            'method'      => 'deletePermission',
            'params'      => 'Deleted',
        ]);
    }

    public function deletePermission()
    {
        $permission = Permission::find($this->permissionId);
       
        $permission->delete();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Permission Deleted Successfully'
        );

    }

    public function updatedcheckPageItems($value)
    {
        if ($value) {
            $this->checkedPermissions = $this->permissions->pluck('id')->map(fn ($item) => (string) $item)->toArray();
        } else {
           $this->checkedPermissions = [];
           $this->checkAllItems = false;
        }
    }

    public function updatedcheckedPermissions()
    {
        $this->checkPageItems = false;
        
    }

    public function checkAllItems()
    {
        $this->checkAllItems = true;
        $this->checkedPermissions = $this->permissionsQuery->pluck('id')->map(fn ($item) => (string) $item)->toArray();
    }

    public function  deleteRecords()
    {
        Permission::whereKey($this->checkedPermissions)->delete();
        $this->checkedPermissions = [];
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


    public function ischeckedPermissions($permission_id)
    {
        return in_array($permission_id, $this->checkedPermissions);
    }


    public function getPermissionsProperty()
    {
        return $this->permissionsQuery->paginate($this->pagination);
    }

    public function getPermissionsQueryProperty()
    {
        return Permission::where('name', 'LIKE', '%' . $this->search . '%');
    }

    
    public function render()
    {
        return view('livewire.admin.permissions', ['permissions' => $this->permissions])->layout('components.dashboard');
    }
}
