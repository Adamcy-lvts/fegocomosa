<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Http\Livewire\DeleteUserForm;
use App\Http\Livewire\UserDashboard\Stats\ProfileViews;
use App\Http\Livewire\UserDashboard\Stats\DonationCount;
use App\Http\Livewire\UserDashboard\Stats\MembershipPayments;
use Laravel\Jetstream\Http\Livewire\TwoFactorAuthenticationForm;
use App\Http\Livewire\UserDashboard\Notifications\PostNotification;
use Laravel\Jetstream\Http\Livewire\LogoutOtherBrowserSessionsForm;
use App\Http\Livewire\UserDashboard\Notifications\DonationsNotification;
use App\Http\Livewire\UserDashboard\Notifications\NewMembersNotification;
use App\Http\Livewire\UserDashboard\Notifications\SetAmbassadorsNotification;


class UserDashboardTest extends TestCase
{
         use RefreshDatabase;

    /** @test */
   public function memebrs_can_visit_user_dashboard_page()
   {
    //   $this->withoutExceptionHandling();
    //   dd($response->getContent());
    //   $this->get('')->assertStatus(200);

     $this->actingAs($user = User::factory()->create());

      $response = $this->get('/member/dashboard');

      $response->assertStatus(200);  
    
   }
    /** @test */
   public function user_dashboard_contains_donation_count_component()
   {
       $this->actingAs($user = User::factory()->create());

      $this->get('/member/dashboard')->assertSeeLivewire(DonationCount::class);
   }

 /** @test */
   public function user_dashboard_contains_profile_views_component()
   {
       $this->actingAs($user = User::factory()->create());
       
      $this->get('/member/dashboard')->assertSeeLivewire(ProfileViews::class);
   }
 /** @test */
   public function user_dashboard_contains_membership_payment_component()
   {
       $this->actingAs($user = User::factory()->create());
       
       $this->get('/member/dashboard')->assertSeeLivewire(MembershipPayments::class);
   }
   /** @test */
   public function user_dashboard_contains_post_notification_component()
   {
       $this->actingAs($user = User::factory()->create());
       
       $this->get('/member/dashboard')->assertSeeLivewire(PostNotification::class);
   }
   /** @test */
   public function user_dashboard_contains_members_new_notification_component()
   {
       $this->actingAs($user = User::factory()->create());
       
       $this->get('/member/dashboard')->assertSeeLivewire(NewMembersNotification::class);
   }
   /** @test */ 
   public function user_dashboard_contains_donations_notification_component()
   {
       $this->actingAs($user = User::factory()->create());
       
       $this->get('/member/dashboard')->assertSeeLivewire(DonationsNotification::class);
   }
    /** @test */ 
   public function user_dashboard_contains_set_ambassadors_notification_component()
   {
       $this->actingAs($user = User::factory()->create());
       
       $this->get('/member/dashboard')->assertSeeLivewire(SetAmbassadorsNotification::class);
   }
    /** @test */ 
//    public function user_dashboard_contains_logout_other_browser_sessions_component()
//    {
//        $this->actingAs($user = User::factory()->create());
//        Livewire::actingAs($user = User::factory()->create());
//         dd($this->getContent());
//        $this->get('/member/dashboard')->assertSeeLivewire(LogoutOtherBrowserSessionsForm::class);
//    }
  /** @test */ 
//    public function user_dashboard_contains_two_factor_authentication_form_component()
//    {
//        $this->actingAs($user = User::factory()->create());
       
//        $this->get('/member/dashboard')->assertSeeLivewire(TwoFactorAuthenticationForm::class);
//    }
  /** @test */ 
//    public function user_dashboard_contains_delete_user_form_component()
//    {
//        $this->actingAs($user = User::factory()->create());
       
//        $this->get('/member/dashboard')->assertSeeLivewire(DeleteUserForm::class);
//    }
   
}
