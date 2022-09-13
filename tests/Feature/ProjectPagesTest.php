<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Project;
use App\Http\Livewire\Project\ShowProject;
use App\Http\Livewire\Project\ProjectIndex;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectPagesTest extends TestCase
{
      use RefreshDatabase;
      /** @test */
    public function projects_index_page_can_render()
    {

        $component = Livewire::test(ProjectIndex::class);

        $component->assertStatus(200);
    }

       /** @test */
    public function project_show_page_can_render()
    {
        
        $this->actingAs($user = User::factory()->create());

        $project = Project::factory()->create();

        $component = Livewire::test(ShowProject::class, ['slug' => $project->slug]);

        $component->assertStatus(200);
    }
}
