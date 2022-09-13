<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\WelcomeMemberPage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MembersWelcomePage extends TestCase
{
      use RefreshDatabase;

    /** @test */
   public function memebrs_can_visit_members_welcome_page()
   {

      $component = Livewire::test(WelcomeMemberPage::class);

      $component->assertStatus(200);
   }

   /** @test */
   public function welcome_page_contains_conatact_us_form_component()
   {
      $this->get('/')->assertSeeLivewire('contact-us-form');
   }

}
