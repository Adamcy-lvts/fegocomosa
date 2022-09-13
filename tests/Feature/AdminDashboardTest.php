<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Livewire\Admin\DashboardComponents\StatComponent;
use App\Http\Livewire\Admin\DashboardComponents\NewMembersComponent;
use App\Http\Livewire\Admin\DashboardComponents\MembersStatsComponent;
use App\Http\Livewire\Admin\DashboardComponents\SitetopActivityComponent;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;
      /** @test */
   public function admin_can_visit_admin_dashboard_page()
   {
     $this->withoutExceptionHandling();

     // Create roles
        $super_admin = Role::create(['name' => 'Super-Admin']);
        $admin = Role::create(['name' => 'admin']);

      $this->actingAs($user = User::factory()->create());
       // Assign role to user
      $user->assignRole([$super_admin, $admin]);

      $response = $this->get('/dashboard');

      $response->assertStatus(200);  
    
   }

    /** @test */
   public function admin_dashboard_contains_stat_component()
   {
      // Create roles
      $super_admin = Role::create(['name' => 'Super-Admin']);
      $admin = Role::create(['name' => 'admin']);

      $this->actingAs($user = User::factory()->create());
       // Assign role to user
      $user->assignRole([$super_admin, $admin]);

      $this->get('/dashboard')->assertSeeLivewire(StatComponent::class);
   }

     /** @test */
   public function admin_dashboard_contains_sitetop_activity__component()
   {
      // Create roles
      $super_admin = Role::create(['name' => 'Super-Admin']);
      $admin = Role::create(['name' => 'admin']);

      $this->actingAs($user = User::factory()->create());
       // Assign role to user
      $user->assignRole([$super_admin, $admin]);

      $this->get('/dashboard')->assertSeeLivewire(SitetopActivityComponent::class);
   }

     /** @test */
   public function admin_dashboard_contains_members_stats_component()
   {
      // Create roles
      $super_admin = Role::create(['name' => 'Super-Admin']);
      $admin = Role::create(['name' => 'admin']);

      $this->actingAs($user = User::factory()->create());
       // Assign role to user
      $user->assignRole([$super_admin, $admin]);

      $this->get('/dashboard')->assertSeeLivewire(MembersStatsComponent::class);
   }

      /** @test */
   public function admin_dashboard_contains_new_members_component()
   {
      // Create roles
      $super_admin = Role::create(['name' => 'Super-Admin']);
      $admin = Role::create(['name' => 'admin']);

      $this->actingAs($user = User::factory()->create());
       // Assign role to user
      $user->assignRole([$super_admin, $admin]);

      $this->get('/dashboard')->assertSeeLivewire(NewMembersComponent::class);
   }
}
