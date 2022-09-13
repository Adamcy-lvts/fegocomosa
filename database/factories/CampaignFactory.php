<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignFactory extends Factory
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
            'campaign_title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->sentence($nbWords = 10, $variableNbWords = true),
            'about' => $this->faker->paragraph(),
            'goal' => $this->faker->numberBetween($min = 1000, $max = 9000), // 8567
            'cover_image' => 'campaign'.$this->faker->unique()->numberBetween(1,20).'.jpg',
            'organizer_id' => $this->faker->numberBetween(1,5),
            'caption' => $this->faker->word(),
            'starting_date' => $this->faker->dateTime($max = 'now')
        ];
    }
}
