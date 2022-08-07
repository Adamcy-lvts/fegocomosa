<?php

namespace Database\Seeders;

use App\Models\GuestSlider;
use Illuminate\Database\Seeder;

class GuestSliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           if (GuestSlider::count() == 0) {
            GuestSlider::create([
            
                'title' => "Welcome to Fegocomosa",
                'banner_id' => 'top_banner_1',
                'caption' => '',
                'link1'    => 'http://damore.com/aut-itaque-et-ea-voluptates',
                'link2'   => '',
                'info'    =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, impedit?',

            ]);
    
            GuestSlider::create([
                'title' => "Our Mission",
                'banner_id' => 'top_banner_2',
                'caption' => 'Pro Unitate',
                'link1'    => 'http://damore.com/aut-itaque-et-ea-voluptates',
                'link2'   => '',
                'info'    =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, impedit?',
    
                ]);
    
            GuestSlider::create([
               'title' => "We Are Fegomites",
                'banner_id' => 'top_banner_3',
                'caption' => 'Here We Are',
                'link1'    => 'http://damore.com/aut-itaque-et-ea-voluptates',
                'link2'   => '',
                'info'    =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, impedit?',
    
                ]);
    
            GuestSlider::create([
                'title' => "Become a Member",
                'banner_id' => 'top_banner_4',
                'caption' => 'How to',
                'link1'    => 'http://damore.com/aut-itaque-et-ea-voluptates',
                'link2'   => '',
                'info'    =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, impedit?',
    
                ]);
    
         }
    }
}
