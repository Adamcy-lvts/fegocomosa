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
                'image'        => 'man_of_steel_2013_movie-wallpaper.jpg',
                'body'         =>  '<p>We are delighted to announce the much-awaited \"Annual Get Together\" event! Join us on October 12, 2022, at the iconic Dining Hall of Federal Government College Maiduguri for a day of laughter, memories, and cherished moments.\n\nThis year\'s Annual Get Together promises to be a memorable occasion, bringing together alumni, students, and friends from all walks of life. It\'s an opportunity to reconnect with old friends, make new acquaintances, and relive the camaraderie that makes our community so special.\n\nThe event will kick off with a warm welcome from the organizing committee, followed by exciting activities and games for all ages. From traditional games to modern challenges, there will be something for everyone to enjoy. As the day progresses, indulge in a delectable spread of delicious food and refreshing beverages, carefully curated to satisfy your taste buds.\n\nTo add to the festivities, we have lined up live music performances and entertaining acts to keep the energy high throughout the day. Dance to your heart\'s content and let the rhythm of the music bring back memories of our school days.\n\nAs the sun sets, gather around the campfire for heartwarming conversations and storytelling. Share your fondest memories of FGC Maiduguri and learn about the experiences of fellow alumni. The bond we share is timeless, and this event provides the perfect opportunity to strengthen it further.\n\nWe look forward to welcoming each one of you to the Annual Get Together 2022. Let\'s come together as one big Fegomite family and create beautiful memories that will last a lifetime. Mark your calendars and spread the word - it\'s going to be an event to remember! See you there! The Organizing Committee</p>',
              
            ]);

            Event::create([
                'user_id'      => '1',
                'title'        => 'Annual General Conference (AGC)',
                'slug'         => 'annual-general-conference',
                'event_time'   =>  $myDateTime->toTimeString(),
                'event_date'   =>  Carbon::parse('2022-10-22'),
                'event_venue'  => 'Yankari Game Reserve, Bauchi State.',
                'image'        => 'brewer_pub_london-wallpaper-1920x1080.jpg',
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

            // Future Events (Last Quarter of 2023 to Early 2024)
            Event::create([
                'user_id'      => '1',
                'title'        => 'Class of 2013 Reunion: 10 Years Later',
                'slug'         => 'class-of-2013-reunion-10-years-later',
                'event_time'   =>  $myDateTime->toTimeString(),
                'event_date'   =>  Carbon::parse('2023-10-12'),
                'event_venue'  => 'Federal Government College Maiduguri, Assembly Hall.',
                'image'        => 'robocop_1.jpg',
                'body'         =>  '<p>We are excited to announce the Class of 2013 Reunion, celebrating 10 years since we graduated from Federal Government College Maiduguri. It\'s time to reconnect with old friends, reminisce about our school days, and create new memories together. Join us for a fun-filled evening of laughter, music, and camaraderie. Let\'s catch up on each other\'s journeys and celebrate the accomplishments of our fellow classmates. Don\'t miss this opportunity to relive the good old days and make new connections. See you there!</p>',
            ]);

            Event::create([
                'user_id'      => '1',
                'title'        => 'Class of 2014 Reunion: 10 Years Later',
                'slug'         => 'class-of-2014-reunion-10-years-later',
                'event_time'   =>  $myDateTime->toTimeString(),
                'event_date'   =>  Carbon::parse('2023-11-12'),
                'event_venue'  => 'Federal Government College Maiduguri, Assembly Hall.',
                'image'        => 'selena_gomez_104-HD.jpg',
                'body'         =>  '<p>Calling all alumni of the Class of 2014! Can you believe it\'s been 10 years since we left the halls of Federal Government College Maiduguri? It\'s time to reunite and celebrate a decade of accomplishments, growth, and friendship. Join us for a memorable evening of nostalgia, as we share stories, achievements, and dreams for the future. Let\'s relive the magic of our school days and cherish the bond that brought us together. Come and make this reunion a night to remember!</p>',
            ]);

            Event::create([
                'user_id'      => '1',
                'title'        => 'Annual General Conference (AGC) 2023',
                'slug'         => 'annual-general-conference-2023',
                'event_time'   =>  $myDateTime->toTimeString(),
                'event_date'   =>  Carbon::parse('2023-12-12'),
                'event_venue'  => 'Yankari Game Reserve, Bauchi State.',
                'image'        => 'kate_beckinsale_as_vampire.jpg',
                'body'         =>  '<p>The Annual General Conference (AGC) is back, and this year promises to be bigger and better! Join us for three days of insightful discussions, networking opportunities, and knowledge-sharing sessions. The AGC brings together professionals, experts, and visionaries from various industries to explore innovative ideas and solutions for a brighter future. Engage in thought-provoking discussions, attend interactive workshops, and be inspired by keynote speakers. Don\'t miss this chance to be a part of the AGC experience and contribute to the collective progress.</p>',
            ]);

            Event::create([
                'user_id'      => '1',
                'title'        => '50th Anniversary of Federal Government College Maiduguri',
                'slug'         => '50th-anniversary-fgc-maiduguri',
                'event_time'   =>  $myDateTime->toTimeString(),
                'event_date'   =>  Carbon::parse('2024-01-12'),
                'event_venue'  => 'Federal Government College Maiduguri, Assembly Hall.',
                'image'        => 'natasha_romanoff_black_widow.jpg',
                'body'         =>  '<p>50th Anniversary of Federal Government College Maiduguri
                We are thrilled to celebrate the golden jubilee of Federal Government College Maiduguri! For five decades, our esteemed institution has been nurturing young minds, fostering excellence, and shaping leaders of tomorrow. Join us for a grand celebration as we honor the rich history and legacy of our alma mater. The event will feature cultural performances, exhibitions, alumni reunions, and much more. Let\'s come together to pay tribute to our beloved college and its impact on countless lives.</p>',
            ]);

            Event::create([
                'user_id'      => '1',
                'title'        => 'Annual Get Together 2024',
                'slug'         => 'annual-get-together-2024',
                'event_time'   =>  $myDateTime->toTimeString(),
                'event_date'   =>  Carbon::parse('2024-02-12'),
                'event_venue'  => 'Federal Government College Maiduguri, Dining Hall',
                'image'        => 'taylor-swift-22276.jpg',
                'body'         =>  '<p>It\'s that time of the year again - our Annual Get Together is back! Join us for a day filled with laughter, games, and heartwarming conversations. This event is a perfect opportunity to reconnect with old friends and make new ones. Enjoy delicious food, live music, and exciting activities for all ages. Whether you are an alumnus, current student, or part of the extended FGC community, you are welcome to be a part of this joyous occasion. Let\'s celebrate the spirit of unity and camaraderie that makes our community so special. See you at the Annual Get Together 2024!</p>',
            ]);
            
        }
    }
}



