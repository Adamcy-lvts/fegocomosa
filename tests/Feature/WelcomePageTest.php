<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Http\Livewire\Welcome;
use Spatie\Permission\Models\Role;
use App\Http\Livewire\ContactUsForm;
use Database\Seeders\EventTableSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomePageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
   public function visitors_can_visit_welcome_page()
   {

      $component = Livewire::test(Welcome::class);

      $component->assertStatus(200);
   }

   /** @test */
   public function welcome_page_contains_conatact_us_form_component()
   {
      $this->get('/')->assertSeeLivewire('contact-us-form');
   }

    /** @test */
   public function contact_us_form_sent_out_database_email_notification()
   {
      $user = User::factory()->create();

      // Create roles
      $super_admin = Role::create(['name' => 'Super-Admin']);
      $admin = Role::create(['name' => 'admin']);

      // Assign role to user
      $user->assignRole([$super_admin, $admin]);

      Livewire::test(ContactUsForm::class)
      ->set('name','Adam Mohammed')
      ->set('email', 'lv4mj1@gmail.com')
      ->set('message', 'We love what you are doing')
      ->call('contact')
      ->assertEmitted('messageSubmitted');
   }
}
