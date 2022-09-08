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
        Permission::create(['name' => 'Add Member']);
        Permission::create(['name' => 'Edit Member']);
        Permission::create(['name' => 'Delete Member']);
        Permission::create(['name' => 'Access Admin Menu']);
        Permission::create(['name' => 'Write Article']);
        Permission::create(['name' => 'Edit Article']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);
        Permission::create(['name' => 'Delete Article']);
        Permission::create(['name' => 'Access Role Permission']);
        Permission::create(['name' => 'Create Role']);
        Permission::create(['name' => 'Delete Role']);
        Permission::create(['name' => 'Create Permission']);
        Permission::create(['name' => 'Edit Permission']);
        Permission::create(['name' => 'Delete Permission']);
        Permission::create(['name' => 'Assign Role']);
        Permission::create(['name' => 'Remove Role']);
        Permission::create(['name' => 'Give Permission']);
        Permission::create(['name' => 'Revoke Permission']);
      
      
      
        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('Add Member');
        $role1->givePermissionTo('Edit Member');
        $role1->givePermissionTo('Delete Member');
        $role1->givePermissionTo('Access Admin Menu');

        $role2 = Role::create(['name' => 'writer']);
        $role2->givePermissionTo('publish articles');
        $role2->givePermissionTo('unpublish articles');

        $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
     
        $user = User::findOrfail(1);
        $user->assignRole($role3, $role1);


      
    }
}
