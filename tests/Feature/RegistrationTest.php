<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Tests\TestCase;
use App\Models\User;
use Laravel\Fortify\Features;
use Laravel\Jetstream\Jetstream;
use Spatie\Permission\Models\Role;
use App\Providers\RouteServiceProvider;
use Database\Seeders\CategoryTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        if (! Features::enabled(Features::registration())) {
            return $this->markTestSkipped('Registration support is not enabled.');
        }

        $response = $this->get('/register');
         
        $response->assertStatus(200);
    }

    public function test_registration_screen_cannot_be_rendered_if_support_is_disabled()
    {
        if (Features::enabled(Features::registration())) {
            return $this->markTestSkipped('Registration support is enabled.');
        }

        $response = $this->get('/register');

        $response->assertStatus(404);
    }

    public function test_new_users_can_register()
    {
        
         $this->withoutExceptionHandling();

          $user = User::factory()->create();

        // Create roles
        $super_admin = Role::create(['name' => 'Super-Admin']);
        $admin = Role::create(['name' => 'admin']);

        // Assign role to user
        $user->assignRole([$super_admin, $admin]);

        if (! Features::enabled(Features::registration())) {
            return $this->markTestSkipped('Registration support is not enabled.');
        }

        $this->seed(CategoryTableSeeder::class);


        $response = $this->post('/register', [
            // 'photo'             => 'taylor_profile.jpg',
            'username'          => 'new user',
            'first_name'        => 'Mohammed',
            'middle_name'       => '',
            'last_name'         => 'Ali',
            'date_of_birth'     =>  "12/04/1991",
            'gender_id'         =>  1,
            'marital_status_id' =>  2,
            'address'           => 'Bama, Borno State',
            'phone'             => '07069786117',
            'state_id'          =>  8,
            'city_id'           =>  144,
            'profession'        => 'Artisan',
            'admission_number'  =>  'f8223',
            'workplace'         => 'adress',
            'jss_class'         => 'Jss1Q',
            'sss_class'         => 'Sss3E',
            'house_id'          => 2,
            'university'        => 'unimaid',
            'course_of_study'   => 'EEE',
            'entry_year_id'     => "04/04/2021",
            'graduation_year_id'=> "04/04/2022",
            'profession_category' => 1,
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature(),
        ]);

        
        $response->assertValid();

        $this->assertAuthenticated();
        $response->assertRedirect('/home');
        // $response->assertRedirect('/successful');

    }
}
