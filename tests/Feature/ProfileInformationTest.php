<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\EntryYear;
use App\Models\GraduationYears;
use Database\Seeders\EntryYearTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Livewire\UpdateProfileInformationForm;


class ProfileInformationTest extends TestCase
{
    use RefreshDatabase;

    public function test_current_profile_information_is_available()
    {
       $this->withoutExceptionHandling();

        $this->actingAs($user = User::factory()->create());
       
        
        $component = Livewire::test(UpdateProfileInformationForm::class);

        $this->assertEquals($user->username, $component->state['username']);
        $this->assertEquals($user->first_name, $component->state['first_name']);
        $this->assertEquals($user->middle_name, $component->state['middle_name']);
        $this->assertEquals($user->last_name, $component->state['last_name']);
        $this->assertEquals($user->state_id, $component->state['state_id']);
        $this->assertEquals($user->city_id, $component->state['city_id']);
        $this->assertEquals($user->house_id, $component->state['house_id']);
        $this->assertEquals($user->profession, $component->state['profession']);
        $this->assertEquals($user->entry_year_id, $component->state['entry_year_id']);
        $this->assertEquals($user->graduation_year_id, $component->state['graduation_year_id']);
        $this->assertEquals($user->email, $component->state['email']);

    }

    public function test_profile_information_can_be_updated()
    {
        $this->actingAs($user = User::factory()->create());

        Livewire::test(UpdateProfileInformationForm::class)
                ->set('state', ['username' => $user->username, 'email' => $user->email])
                ->call('updateProfileInformation');

        $this->assertEquals($user->username, $user->fresh()->username);
        $this->assertEquals($user->email, $user->fresh()->email);
    }
}
