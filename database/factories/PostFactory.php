<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => $this->faker->paragraph(),
            'image' => 'post'.$this->faker->unique()->numberBetween(1,20).'.jpg',
            'user_id' => User::factory(),
            'category_post_id' => $this->faker->numberBetween(1,5)
        ];
    }
}
