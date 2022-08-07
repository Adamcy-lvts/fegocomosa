<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          
                'user_id' => User::factory(),
                'title' => $this->faker->sentence($nbWords = 3, $variableNbWords = true),
                'slug' => $this->faker->word(),
                'event_time' => $this->faker->time($format = 'H:i:s', $max = 'now'),
                'event_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
                'event_venue' => $this->faker->address(),
                'body' => $this->faker->text(),
              
        
        ];
    }
}
