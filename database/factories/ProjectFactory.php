<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence($nbWords = 3, $variableNbWords = true);
        return [
          
                'user_id' => User::factory(),
                'title' => $title,
                'slug' => Str::slug($title),
                'budget' => $this->faker->numberBetween($min = 200000, $max = 5000000), // 8567
                'status' => $this->faker->word(),
                'progress_indicator' => $this->faker->numberBetween($min = 0, $max = 100), 
                'starting_date' => $this->faker->time($format = 'H:i:s', $max = 'now'),
                'completion_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
                'proposed_by' => $this->faker->name(),
                'executed_by' => $this->faker->name(),
                'cover_image' => 'project'.'_'.$this->faker->unique()->numberBetween(1,10).'.jpg',
                'body' => $this->faker->text(),
              
        
        ];
    }
}
