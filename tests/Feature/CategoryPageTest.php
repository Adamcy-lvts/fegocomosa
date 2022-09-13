<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Category;
use Database\Seeders\CategoryTableSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Livewire\UserCategory\CategoryIndex;
use App\Http\Livewire\UserCategory\UsersCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryPageTest extends TestCase
{
   
    use RefreshDatabase;

    /** @test */
   public function profession_categories_page_can_render()
   {

      $component = Livewire::test(CategoryIndex::class);

      $component->assertStatus(200);
      
   }
    /** @test */
   public function members_under_category_can_be_viewed()
   {

      $this->actingAs($user = User::factory()->create());

      $category = Category::factory()->create();

      $component = Livewire::test(UsersCategory::class, ['slug' => $category->slug]);

      $component->assertStatus(200);
   }
}
