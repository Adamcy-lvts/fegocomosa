<?php

namespace Database\Seeders;

use App\Models\FeatureImage;
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
        if (FeatureImage::count() == 0) {
            FeatureImage::create([
            
                'feature_image' => "ariana_grande_.jpg",
                'title'          => 'Ariana Grande',
                'link'             => 'http://damore.com/aut-itaque-et-ea-voluptates',
                'caption'         => 'Cuteness',

            ]);

            FeatureImage::create([
            
                'feature_image' => "stranger-things-1.png",
                'title'          => 'Stranger Things',
                'link'             => 'http://damore.com/aut-itaque-et-ea-voluptates',
                'caption'         => 'Upside Down',

            ]);

            FeatureImage::create([
            
                'feature_image' => "the_amazing_spider_man_2_emma_stone.jpg",
                'title'          => 'Emma Stone',
                'link'             => 'http://damore.com/aut-itaque-et-ea-voluptates',
                'caption'         => 'Spider Man',

            ]);

            FeatureImage::create([
            
                'feature_image' => "man_of_steel_2015-wallpaper.jpg",
                'title'          => 'Super Man',
                'link'             => 'http://damore.com/aut-itaque-et-ea-voluptates',
                'caption'         => 'Man of Steel',

            ]);
        }

    }
}
