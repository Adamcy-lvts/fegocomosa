<?php

namespace Database\Seeders;

use App\Models\NavigationMenu;
use Illuminate\Database\Seeder;

class NavigationMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (NavigationMenu::count() == 0) {
            NavigationMenu::create([
            
                'name' => "Members",
                'link' => "members",
                'visibility' => 1,
                'sorting' => 1,
            ]);
    
            NavigationMenu::create([
                'name' => "Blog",
                'link' => "posts",
                'visibility' => 1,
                'sorting' => 2,
               
                ]);
    
            NavigationMenu::create([
                'name' => "Fundraisers",
                'link' => "campaigns",
                'visibility' => 1,
                'sorting' => 3,
              
                ]);
    
            NavigationMenu::create([
                'name' => "Projects",
                'link' => "projects",
                'visibility' => 1,
                'sorting' => 4,
             
                ]);
    
            NavigationMenu::create([
                'name' => "Events",
                'link' => "events",
                'visibility' => 1,
                'sorting' => 5,
              
                ]);

            NavigationMenu::create([
                'name' => "Members Category",
                'link' => "category.index",
                'visibility' => 1,
                'sorting' => 6,
              
                ]);
    
            }
    }
}
