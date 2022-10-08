<?php

namespace Database\Seeders;

use App\Models\GuestNavbarMenu;
use Illuminate\Database\Seeder;

class GuestNavBarMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (GuestNavbarMenu::count() == 0) {
            GuestNavbarMenu::create([
            
                'name' => "Home",
                'link' => "welcome",
                'visibility' => 1,
                'sorting' => 1,
            ]);
    
            GuestNavbarMenu::create([
                'name' => "About Us",
                'link' => "aboutus",
                'visibility' => 1,
                'sorting' => 2,
               
                ]);

            GuestNavbarMenu::create([
                'name' => "Blog",
                'link' => "posts",
                'visibility' => 1,
                'sorting' => 3,
             
                ]);
    
            GuestNavbarMenu::create([
                'name' => "Fundraisers",
                'link' => "campaigns",
                'visibility' => 1,
                'sorting' => 4,
              
                ]);
    
            // GuestNavbarMenu::create([
            //     'name' => "Register",
            //     'link' => "register",
            //     'sorting' => 5,
             
            //     ]);
    
            }
    
    }
}
