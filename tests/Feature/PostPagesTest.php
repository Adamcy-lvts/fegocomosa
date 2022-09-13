<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Livewire\Livewire;
use App\Http\Livewire\Blog\ShowPost;
use App\Http\Livewire\Blog\BlogIndex;
use Database\Seeders\PostTableSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Database\Seeders\PostCategoryTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostPagesTest extends TestCase
{
    use RefreshDatabase;
      /** @test */
    public function post_index_page_can_render()
    {

        $component = Livewire::test(BlogIndex::class);

        $component->assertStatus(200);
    }

       /** @test */
    public function post_show_page_can_render()
    {
        
        $this->seed(PostCategoryTableSeeder::class);
        $this->actingAs($user = User::factory()->create());
        $post = Post::factory()->create();

        $component = Livewire::test(ShowPost::class, ['slug' => $post->slug]);

        $component->assertStatus(200);
    }
}
