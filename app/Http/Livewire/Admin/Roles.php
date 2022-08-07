<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Roles extends Component
{
    use WithPagination;
    use Actions;

    public $roleId;
    public $name;
    public $search;
    public $pagination = 5;
    public $showModalForm = false;
    public $checkedRoles = [];
    public $checkedPermission = [];
    public $checkAllItems = false;
    public $checkPageItems = false;
    public $rolePermissions;

  

public function mount()
{
    $this->search = request()->query('search', $this->search);
}

    public function RoleModal()
    {
        $this->reset();
        $this->showModalForm = true;
    }

    public function createRole()
    {
        $this->validate([
            'name' => 'required', 
        ]);

       

        $role = Role::create(['name' => $this->name]);
        $role->givePermissionTo($this->checkedPermission);
        $this->reset();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Role Created Successfully'
        );
    }

    public function EditRole($id)
    {
        $this->reset();
        $this->showModalForm = true;
        $this->roleId = $id;
        // dd($id);
        $role = Role::find($this->roleId);

        $this->checkedPermission = $this->rolePermissions = $role->permissions()->pluck('id')->map(function ($id) {
            return strval($id);
            })->toArray();

        $this->loadRole();
    }

    public function loadRole()
    {
        $role = Role::findOrFail($this->roleId);
        $this->name = $role->name;
    }

    public function updateRole()
    {
        $this->validate([
            'name' => 'required', 
        ]);

        $role = Role::find($this->roleId);
        
        $role->update([
            'name' => $this->name,
            $role->syncPermissions($this->checkedPermission)
        ]);
        
        $this->reset();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Role Updated Successfully'
        );
       

    }

    public function DeleteConfirmaton($id)
    {
        $this->roleId = $id;
        $this->notification()->confirm([
            'title'       => 'Role?',
            'description' => 'You want delete the Role?',
            'acceptLabel' => 'Yes, Delete it',
            'method'      => 'deleteRole',
            'params'      => 'Deleted',
        ]);
    }

    public function deleteRole()
    {
        $role = Role::find($this->roleId);
       
        $role->delete();

        $this->notification()->success(
            $title = 'Success',
            $description = 'Project Deleted Successfully'
        );

    }

    public function updatedcheckPageItems($value)
    {
        if ($value) {
            $this->checkedRoles = $this->roles->pluck('id')->map(fn ($item) => (string) $item)->toArray();
        } else {
           $this->checkedRoles = [];
           $this->checkAllItems = false;
        }
    }

    public function updatedcheckedRoles()
    {
        $this->checkPageItems = false;
        
    }

    public function checkAllItems()
    {
        $this->checkAllItems = true;
        $this->checkedRoles = $this->rolesQuery->pluck('id')->map(fn ($item) => (string) $item)->toArray();
    }

    public function  deleteRecords()
    {
        Role::whereKey($this->checkedRoles)->delete();
        $this->checkedRoles = [];
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


    public function ischeckedRoles($role_id)
    {
        return in_array($role_id, $this->checkedRoles);
    }


    public function render()
    {
        $permissions = Permission::all();
        return view('livewire.admin.roles', ['roles' => $this->roles, 'permissions' => $permissions])->layout('components.dashboard');
    }

    public function getRolesProperty()
    {
        return $this->rolesQuery->paginate($this->pagination);
    }

    public function getRolesQueryProperty()
    {
        return Role::where('name', 'LIKE', '%' . $this->search . '%');
    }
}
