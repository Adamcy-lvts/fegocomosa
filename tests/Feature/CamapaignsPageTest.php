<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use App\Models\Campaign;
use Database\Seeders\OrganizersTableSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Livewire\Campaigns\CampaignShow;
use App\Http\Livewire\Campaigns\CampaignIndex;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CamapaignsPageTest extends TestCase
{
     use RefreshDatabase;
      /** @test */
    public function campaigns_index_page_can_render()
    {

        $component = Livewire::test(CampaignIndex::class);

        $component->assertStatus(200);
    }

       /** @test */
    public function campaign_show_page_can_render()
    {
        
        $this->seed(OrganizersTableSeeder::class);
       
        $campaign = Campaign::factory()->create();

        $component = Livewire::test(CampaignShow::class, ['slug' => $campaign->slug]);

        $component->assertStatus(200);
    }
}
