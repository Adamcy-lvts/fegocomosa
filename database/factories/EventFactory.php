<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Str;
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
        $title = $this->faker->sentence($nbWords = 3, $variableNbWords = true);
        return [
          
                'user_id' => User::factory(),
                'title' => $title,
                'slug' => Str::slug($title),
                'event_time' => $this->faker->time($format = 'H:i:s', $max = 'now'),
                'event_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
                'event_venue' => $this->faker->address(),
                'speaker' => $this->faker->name(),
                'organizer' => $this->faker->name(),
                'image' => 'event'.'_'.$this->faker->unique()->numberBetween(1,10).'.jpg',
                'body' => $this->faker->text(),
              
        
        ];
    }
}
