<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GuestSliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'          => $this->faker->catchPhrase(),
            'caption'        => $this->faker->company(),
            'link1'          => $this->faker->url(),
            'banner_id'  => $this->faker->word(),
            // 'logo'           => 'logo'.'.jpg',
            'info'           => $this->faker->sentences($nb = 3, $asText = true),  
        ];
    }
}
