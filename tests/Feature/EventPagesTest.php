<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Event;
use Livewire\Livewire;
use App\Http\Livewire\Events\ShowEvent;
use App\Http\Livewire\Events\EventIndex;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventPagesTest extends TestCase
{
     use RefreshDatabase;
      /** @test */
    public function event_index_page_can_render()
    {

        $component = Livewire::test(EventIndex::class);

        $component->assertStatus(200);
    }

       /** @test */
    public function event_show_page_can_render()
    {
        $this->actingAs($user = User::factory()->create());
       
        $event = Event::factory()->create();

        $component = Livewire::test(ShowEvent::class, ['slug' => $event->slug]);

        $component->assertStatus(200);
    }
}
