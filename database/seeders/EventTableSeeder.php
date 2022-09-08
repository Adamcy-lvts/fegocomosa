<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Event::count() == 0) {
         
            $myDateTime = Carbon::now();
            $eventDate = new Carbon('2022-07-12');
            
            
            Event::create([
                'user_id'      => '1',
                'title'        => 'Annual Get Together ',
                'slug'         => 'annual-get-together',
                'event_time'   =>  $myDateTime->toTimeString(),
                'event_date'   =>  Carbon::parse('2022-10-12'),
                'event_venue'  => 'Federal Government College Maiduguri, Dining Hall',
                'image'        => 'rihanna_9-wallpaper-1920x1080.jpg',
                'body'         =>  '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, tenetur?</p>',
              
            ]);

            Event::create([
                'user_id'      => '1',
                'title'        => 'Annual General Conference (AGC)',
                'slug'         => 'annual-general-conference',
                'event_time'   =>  $myDateTime->toTimeString(),
                'event_date'   =>  Carbon::parse('2022-10-22'),
                'event_venue'  => 'Yankari Game Reserve, Bauchi State.',
                'image'        => 'megan_fox_16-wallpaper-1920x1080.jpg',
                'body'         =>  '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, tenetur?</p>',
              
            ]);

            Event::create([
                'user_id'      => '1',
                'title'        => 'Class of 2012 Reunion: 10 Years Later',
                'slug'         => 'class-of-2012-reunion:-10-years-lLater',
                'event_time'   =>  $myDateTime->toTimeString(),
                'event_date'   =>  Carbon::parse('2022-11-12'),
                'event_venue'  => 'Federal Governmet College Maiduguri, Assembly Hall.',
                'image'        => 'stranger_things_1.jpg',
                'body'         =>  '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, tenetur?</p>',
              
            ]);

            Event::create([
                'user_id'      => '1',
                'title'        => 'Class of 2010 Reunion',
                'slug'         => 'class-of-2010-reunion',
                'event_time'   =>  $myDateTime->toTimeString(),
                'event_date'   =>  Carbon::parse('2022-12-12'),
                'event_venue'  => 'Federal Governmet College Maiduguri, Assembly Hall.',
                'image'        => 'man_of_steel_2015-wallpaper.jpg',
                'body'         =>  '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, tenetur?</p>',
              
            ]);
            
        }
    }
}



