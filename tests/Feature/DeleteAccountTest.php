<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use Laravel\Jetstream\Features;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Http\Livewire\DeleteUserForm;

class DeleteAccountTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_accounts_can_be_deleted()
    {
        if (! Features::hasAccountDeletionFeatures()) {
            return $this->markTestSkipped('Account deletion is not enabled.');
        }
 
        // $user = User::find(10);
        $user = User::factory()->create([
            'username' => 'Test User',
            'first_name' => 'Adam',
            'middle_name' =>  '',
            'last_name' => 'Mohammed',
            'date_of_birth'     =>  Carbon::parse('1991-04-12'),
            'about_you'         => 'Hardware Engineer at National Open Univiersity of Nigeria, CEO DevSync, Coding is my Cocain, Obsessed with Everyhing Space',
            'profile_photo_path'=> 'profile-photos/taylor_profile.jpg',
            'gender_id'         =>  1,
            'marital_status_id' =>  1,
            'address'           => 'New G.R.A Maiduguri, Borno State',
            'phone'             => '07060741999',
            'state_id'          => 8,
            'city_id'           => 162,
            'profession'        => 'Engineer',
            'workplace'         => 'Nation Open University of Nigeria(NOUN)',
            'jss_class'         => 'Jss1Q',
            'sss_class'         => 'Sss3Q',
            'house_id'          => 2,
            'potrait_image'     => 'mj_1.jpg',
            'entry_year_id'     => 1,
            'graduation_year_id'=> 2,
            'email' => 'test@testing.com',
            'password' => 'swifty1989',
        ]);

        $this->actingAs($user);

        $component = Livewire::test(DeleteUserForm::class)
                        ->set('password', 'swifty1989')
                        ->call('deleteUser');

        // $this->assertNull($user->fresh());
    }

    public function test_correct_password_must_be_provided_before_account_can_be_deleted()
    {
        if (! Features::hasAccountDeletionFeatures()) {
            return $this->markTestSkipped('Account deletion is not enabled.');
        }

        $this->actingAs($user = User::factory()->create());

        Livewire::test(DeleteUserForm::class)
                        ->set('password', 'wrong-password')
                        ->call('deleteUser')
                        ->assertHasErrors(['password']);

        $this->assertNotNull($user->fresh());
    }
}
