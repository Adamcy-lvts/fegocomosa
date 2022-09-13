<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
          $name = $this->faker->word();
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'icon' => 'fa-thin'.'_'.$this->faker->unique()->numberBetween(1,20).'.svg',
            'svg_icon' => 'category'.$this->faker->unique()->numberBetween(1,20).'.svg',
           
        ];
    }
}
