<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RoleAndPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'add member']);
        Permission::create(['name' => 'edit member']);
        Permission::create(['name' => 'delete member']);
        Permission::create(['name' => 'access admin dashboard']);
        Permission::create(['name' => 'access admin menu']);
        Permission::create(['name' => 'access articles']);
        Permission::create(['name' => 'write article']);
        Permission::create(['name' => 'edit article']);
        Permission::create(['name' => 'delete article']);
        Permission::create(['name' => 'access role']); 
        Permission::create(['name' => 'access permission']);
        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'edit role']);
        Permission::create(['name' => 'delete role']);
        Permission::create(['name' => 'create permission']);
        Permission::create(['name' => 'edit permission']);
        Permission::create(['name' => 'delete permission']);
        Permission::create(['name' => 'assign role']);
        Permission::create(['name' => 'remove role']);
        Permission::create(['name' => 'give permission']);
        Permission::create(['name' => 'revoke permission']);
        Permission::create(['name' => 'create event']);
        Permission::create(['name' => 'edit event']);
        Permission::create(['name' => 'delete event']);
        Permission::create(['name' => 'access events']);
        Permission::create(['name' => 'create project']);
        Permission::create(['name' => 'edit project']);
        Permission::create(['name' => 'delete project']);
        Permission::create(['name' => 'make payment']);
        Permission::create(['name' => 'edit payment']);
        Permission::create(['name' => 'delete payment']);
        Permission::create(['name' => 'download payments']);
        Permission::create(['name' => 'create campaign']);
        Permission::create(['name' => 'edit campaign']);
        Permission::create(['name' => 'delete campaign']);
        Permission::create(['name' => 'create organizer']);
        Permission::create(['name' => 'edit organizer']);
        Permission::create(['name' => 'delete organizer']);
        Permission::create(['name' => 'create donation']);
        Permission::create(['name' => 'edit donation']);
        Permission::create(['name' => 'delete donation']);
       

      
      
      
        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('add member');
        $role1->givePermissionTo('edit member');
        $role1->givePermissionTo('access admin dashboard');

        $role2 = Role::create(['name' => 'writer']);
        $role2->givePermissionTo('write article');
        $role2->givePermissionTo('edit article');
        $role2->givePermissionTo('delete article');
        $role2->givePermissionTo('access articles');

        $role3 = Role::create(['name' => 'accountant']);
        $role3->givePermissionTo('make payment');
        $role3->givePermissionTo('edit payment');
        $role3->givePermissionTo('delete payment');

        $role4 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
     
        $user = User::findOrfail(1);
        $user->assignRole($role3, $role1);


      
    }
}
