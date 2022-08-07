<?php

namespace Database\Seeders;

use App\Models\MemberSlider;
use Illuminate\Database\Seeder;

class MemberSliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (MemberSlider::count() == 0) {
            MemberSlider::create([
            
                'image_background' => "ariana_grande_.jpg",
                'caption'          => 'Ariana Grande',
                'link'             => 'http://damore.com/aut-itaque-et-ea-voluptates',
                'caption_2'         => 'Cuteness',

            ]);

            MemberSlider::create([
            
                'image_background' => "stranger-things-1.png",
                'caption'          => 'Stranger Things',
                'link'             => 'http://damore.com/aut-itaque-et-ea-voluptates',
                'caption_2'         => 'Upside Down',

            ]);

            MemberSlider::create([
            
                'image_background' => "the_amazing_spider_man_2_emma_stone.jpg",
                'caption'          => 'Emma Stone',
                'link'             => 'http://damore.com/aut-itaque-et-ea-voluptates',
                'caption_2'         => 'Spider Man',

            ]);

            MemberSlider::create([
            
                'image_background' => "man_of_steel_2015-wallpaper.jpg",
                'caption'          => 'Super Man',
                'link'             => 'http://damore.com/aut-itaque-et-ea-voluptates',
                'caption_2'         => 'Man of Steel',

            ]);
        }

    }
}
