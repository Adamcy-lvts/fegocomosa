<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Campaign;
use Illuminate\Database\Seeder;

class CampaignTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $startingDate = new Carbon('2022-06-12');

        Campaign::create([
            'campaign_title' => 'Laptops For IDP School Children',
            'slug'           => 'laptops-for-idp-school-children',
            'goal'           => 100000,
            'description'    => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit, deleniti perspiciatis! Beatae dolore ab soluta!',
            'about'          => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum ut natus, doloremque aperiam nulla in? Soluta nobis veritatis sit numquam praesentium, minima maxime, dicta delectus perferendis dolor facere fugit quam omnis ullam accusamus ducimus! Inventore, magnam? Possimus, in maiores sed id numquam pariatur omnis quam asperiores, nesciunt perspiciatis eligendi voluptatibus. Fuga, necessitatibus beatae minima iste saepe minus esse hic ad? Tenetur architecto, deserunt dicta a vitae excepturi, ut porro reiciendis ipsam dolorum optio animi explicabo eligendi veniam delectus cumque temporibus soluta corrupti dolore nihil expedita amet maxime doloremque odit! Expedita!',
            'starting_date'   => $startingDate,
            'cover_image'     => 'millie_bobby_brown_3.jpg',
            'caption'         => 'Millie Bobby Brown',
            'organizer_id'   =>   1
            
            
            ]);

        Campaign::create([
            'campaign_title' => 'Table For Dining Hall',
            'slug'           => 'table-for-dining-hall',
            'goal'           => 500000,
            'description'    => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit, deleniti perspiciatis! Beatae dolore ab soluta!',
            'about'          => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum ut natus, doloremque aperiam nulla in? Soluta nobis veritatis sit numquam praesentium, minima maxime, dicta delectus perferendis dolor facere fugit quam omnis ullam accusamus ducimus! Inventore, magnam? Possimus, in maiores sed id numquam pariatur omnis quam asperiores, nesciunt perspiciatis eligendi voluptatibus. Fuga, necessitatibus beatae minima iste saepe minus esse hic ad? Tenetur architecto, deserunt dicta a vitae excepturi, ut porro reiciendis ipsam dolorum optio animi explicabo eligendi veniam delectus cumque temporibus soluta corrupti dolore nihil expedita amet maxime doloremque odit! Expedita!',
            'starting_date'   => $startingDate,
            'cover_image'     => 'taylor_swift_3.jpg',
            'caption'         => 'Taylor Alison Swift',
            'organizer_id'   =>   2
            
            
            ]);

        Campaign::create([
            'campaign_title' => 'Eye Surgery',
            'slug'           => 'eye-surgery',
            'goal'           => 5000000,
            'description'    => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit, deleniti perspiciatis! Beatae dolore ab soluta!',
            'about'          => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum ut natus, doloremque aperiam nulla in? Soluta nobis veritatis sit numquam praesentium, minima maxime, dicta delectus perferendis dolor facere fugit quam omnis ullam accusamus ducimus! Inventore, magnam? Possimus, in maiores sed id numquam pariatur omnis quam asperiores, nesciunt perspiciatis eligendi voluptatibus. Fuga, necessitatibus beatae minima iste saepe minus esse hic ad? Tenetur architecto, deserunt dicta a vitae excepturi, ut porro reiciendis ipsam dolorum optio animi explicabo eligendi veniam delectus cumque temporibus soluta corrupti dolore nihil expedita amet maxime doloremque odit! Expedita!',
            'starting_date'   => $startingDate,
            'cover_image'     => 'ariana_grande_2.jpg',
            'caption'         => 'Ariana Grande',
            'organizer_id'   =>   4
            
            
            ]);

        Campaign::create([
            'campaign_title' => 'Projector For School',
            'slug'           => 'projector-for-school',
            'goal'           => 700000,
            'description'    => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit, deleniti perspiciatis! Beatae dolore ab soluta!',
            'about'          => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum ut natus, doloremque aperiam nulla in? Soluta nobis veritatis sit numquam praesentium, minima maxime, dicta delectus perferendis dolor facere fugit quam omnis ullam accusamus ducimus! Inventore, magnam? Possimus, in maiores sed id numquam pariatur omnis quam asperiores, nesciunt perspiciatis eligendi voluptatibus. Fuga, necessitatibus beatae minima iste saepe minus esse hic ad? Tenetur architecto, deserunt dicta a vitae excepturi, ut porro reiciendis ipsam dolorum optio animi explicabo eligendi veniam delectus cumque temporibus soluta corrupti dolore nihil expedita amet maxime doloremque odit! Expedita!',
            'starting_date'   => $startingDate,
            'cover_image'     => 'taylor_swift_4.jpg',
            'caption'         => 'Cowboy Taylor',
            'organizer_id'   =>   3
            
            
            ]);

        Campaign::create([
            'campaign_title' => 'Knee Suugery For Ibrahim Wadda',
            'slug'           => 'knee-sugery-for-ibrahim-wadda',
            'goal'           => 1000000,
            'description'    => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit, deleniti perspiciatis! Beatae dolore ab soluta!',
            'about'          => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum ut natus, doloremque aperiam nulla in? Soluta nobis veritatis sit numquam praesentium, minima maxime, dicta delectus perferendis dolor facere fugit quam omnis ullam accusamus ducimus! Inventore, magnam? Possimus, in maiores sed id numquam pariatur omnis quam asperiores, nesciunt perspiciatis eligendi voluptatibus. Fuga, necessitatibus beatae minima iste saepe minus esse hic ad? Tenetur architecto, deserunt dicta a vitae excepturi, ut porro reiciendis ipsam dolorum optio animi explicabo eligendi veniam delectus cumque temporibus soluta corrupti dolore nihil expedita amet maxime doloremque odit! Expedita!',
            'starting_date'   => $startingDate,
            'cover_image'     => 'selena_gomez_1.jpg',
            'caption'         => 'Cowboy Taylor',
            'organizer_id'   =>   4
            
            
            ]);

        Campaign::create([
            'campaign_title' => 'Building Computer Lab',
            'slug'           => 'building-computer-lab',
            'goal'           => 5000000,
            'description'    => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit, deleniti perspiciatis! Beatae dolore ab soluta!',
            'about'          => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum ut natus, doloremque aperiam nulla in? Soluta nobis veritatis sit numquam praesentium, minima maxime, dicta delectus perferendis dolor facere fugit quam omnis ullam accusamus ducimus! Inventore, magnam? Possimus, in maiores sed id numquam pariatur omnis quam asperiores, nesciunt perspiciatis eligendi voluptatibus. Fuga, necessitatibus beatae minima iste saepe minus esse hic ad? Tenetur architecto, deserunt dicta a vitae excepturi, ut porro reiciendis ipsam dolorum optio animi explicabo eligendi veniam delectus cumque temporibus soluta corrupti dolore nihil expedita amet maxime doloremque odit! Expedita!',
            'starting_date'   => $startingDate,
            'cover_image'     => 'ariana_grande_1.jpg',
            'caption'         => 'Black and White Ariana Grande',
            'organizer_id'   =>   1
            
            
            ]);

        Campaign::create([
            'campaign_title' => 'Science Laboratory Equipments',
            'slug'           => 'science-laboratory-equipments',
            'goal'           => 1000000,
            'description'    => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit, deleniti perspiciatis! Beatae dolore ab soluta!',
            'about'          => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum ut natus, doloremque aperiam nulla in? Soluta nobis veritatis sit numquam praesentium, minima maxime, dicta delectus perferendis dolor facere fugit quam omnis ullam accusamus ducimus! Inventore, magnam? Possimus, in maiores sed id numquam pariatur omnis quam asperiores, nesciunt perspiciatis eligendi voluptatibus. Fuga, necessitatibus beatae minima iste saepe minus esse hic ad? Tenetur architecto, deserunt dicta a vitae excepturi, ut porro reiciendis ipsam dolorum optio animi explicabo eligendi veniam delectus cumque temporibus soluta corrupti dolore nihil expedita amet maxime doloremque odit! Expedita!',
            'starting_date'   => $startingDate,
            'cover_image'     => 'taylor_swift_5.jpg',
            'caption'         => 'Cute Taylor in French Braids',
            'organizer_id'   =>   1
            
            
            ]);
        
        Campaign::create([
            'campaign_title' => 'Lecture Theatre Renovation',
            'slug'           => 'lecture-theatre-renovation',
            'goal'           => 600000,
            'description'    => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit, deleniti perspiciatis! Beatae dolore ab soluta!',
            'about'          => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum ut natus, doloremque aperiam nulla in? Soluta nobis veritatis sit numquam praesentium, minima maxime, dicta delectus perferendis dolor facere fugit quam omnis ullam accusamus ducimus! Inventore, magnam? Possimus, in maiores sed id numquam pariatur omnis quam asperiores, nesciunt perspiciatis eligendi voluptatibus. Fuga, necessitatibus beatae minima iste saepe minus esse hic ad? Tenetur architecto, deserunt dicta a vitae excepturi, ut porro reiciendis ipsam dolorum optio animi explicabo eligendi veniam delectus cumque temporibus soluta corrupti dolore nihil expedita amet maxime doloremque odit! Expedita!',
            'starting_date'   => $startingDate,
            'cover_image'     => 'taylor_swift_1.jpg',
            'caption'         => 'Cute Curly Hair Taylor',
            'organizer_id'   =>   1
            
            
            ]);

        Campaign::create([
            'campaign_title' => 'Bore Hole For Girls Hostel',
            'slug'           => 'bore-hole-for-girls-hostel',
            'goal'           => 500000,
            'description'    => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit, deleniti perspiciatis! Beatae dolore ab soluta!',
            'about'          => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum ut natus, doloremque aperiam nulla in? Soluta nobis veritatis sit numquam praesentium, minima maxime, dicta delectus perferendis dolor facere fugit quam omnis ullam accusamus ducimus! Inventore, magnam? Possimus, in maiores sed id numquam pariatur omnis quam asperiores, nesciunt perspiciatis eligendi voluptatibus. Fuga, necessitatibus beatae minima iste saepe minus esse hic ad? Tenetur architecto, deserunt dicta a vitae excepturi, ut porro reiciendis ipsam dolorum optio animi explicabo eligendi veniam delectus cumque temporibus soluta corrupti dolore nihil expedita amet maxime doloremque odit! Expedita!',
            'starting_date'   => $startingDate,
            'cover_image'     => 'megan_rain_1.jpg',
            'caption'         => 'Exotic Megan Rain',
            'organizer_id'   =>   1
            
            
            ]);
    }
}
