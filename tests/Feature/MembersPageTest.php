<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use Database\Seeders\LgaTableSeeder;
use Database\Seeders\HouseTableSeeder;
use Database\Seeders\StateTableSeeder;
use App\Http\Livewire\Members\ShowProfile;
use Database\Seeders\EntryYearTableSeeder;
use App\Http\Livewire\Members\MembersIndex;
use Illuminate\Foundation\Testing\WithFaker;
use Database\Seeders\MaritalStatusTableSeeder;
use Database\Seeders\GraduationYearTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MembersPageTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
   public function members_can_visit_members_page()
   {

      $component = Livewire::test(MembersIndex::class);

      $component->assertStatus(200);
      
   }
    /** @test */
   public function member_profile_page_can_be_viewed()
   {
      $this->seed(HouseTableSeeder::class);
      $this->seed(MaritalStatusTableSeeder::class);
      $this->seed(StateTableSeeder::class);
      $this->seed(LgaTableSeeder::class);
      $this->seed(GraduationYearTableSeeder::class);
      $this->seed(EntryYearTableSeeder::class);
      $this->actingAs($member = User::factory()->create());

      $component = Livewire::test(ShowProfile::class, ['member' => $member]);

      $component->assertStatus(200);
   }
}
