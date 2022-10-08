<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Category::count() == 0) {
            Category::create([
            
                'name' => "Engineers",
                'slug' => "engineers",
                'icon' => 'fa-thin fa-user-helmet-safety fa-2xl'
            ]);
    
            Category::create([
                'name' => "Doctors",
                'slug' => "doctors",
                'icon' => 'fa-thin fa-user-doctor fa-2xl'
    
                ]);
    
            Category::create([
                'name' => "Lawyers",
                'slug' => "lawyers",
                'icon' => 'fa-thin fa-gavel fa-2xl'
    
                ]);
    
            Category::create([
                'name' => "Nurses",
                'slug' => "nurses",
                'icon' => 'fa-thin fa-user-nurse fa-2xl'
    
                ]);
    
            Category::create([
                'name' => "Paramilitary",
                'slug' => "paramilitary",
                'icon' => 'fa-thin fa-siren fa-2xl'
    
                ]);
    
            Category::create([
                'name' => "Business",
                'slug' => "business",
                'icon' => 'fa-thin fa-briefcase fa-2xl'
    
                ]);
            Category::create([
                'name' => "Entrepreneurs",
                'slug' => "entrepreneurs",
                'icon' => 'fa-thin fa-chart-pie fa-2xl'
    
                ]);
            Category::create([
                'name' => "Civil Servants",
                'slug' => "civil-servants",
                'icon' => 'fa-thin fa-user-tie-hair fa-2xl'
    
                ]);
            Category::create([
                'name' => "Artist",
                'slug' => "artist",
                'icon' => 'fa-thin fa-microphone-lines fa-2xl'
    
                ]);
            Category::create([
                'name' => "Architect",
                'slug' => "architect",
                'icon' => 'fa-thin fa-ruler-triangle fa-2xl'
  
                ]);
            Category::create([
                'name' => "Military",
                'slug' => "military",
                'icon' => 'fa-thin fa-jet-fighter fa-2xl'
    
                ]);
            Category::create([
                'name' => "Bankers",
                'slug' => "bankers",
                'icon' => 'fa-thin fa-sack-dollar fa-2xl'
    
                ]);
            Category::create([
            'name' => "Accademicians",
            'slug' => "accademicians",
            'icon' => 'fa-thin fa-graduation-cap fa-2xl'

            ]);
            Category::create([
            'name' => "Graphic Designers",
            'slug' => "grapic-designers",
            'icon' => 'fa-thin fa-pen-nib fa-2xl'

            ]);
             Category::create([
            'name' => "Politicians",
            'slug' => "politicians",
            'icon' => 'fa-thin fa-box-ballot fa-2xl'

            ]);
             Category::create([
            'name' => "Programmers",
            'slug' => "programmers",
            'icon' => 'fa-thin fa-code fa-2xl'
            ]);
             Category::create([
            'name' => "Journalist",
            'slug' => "Journalist",
            'icon' => 'fa-thin fa-microphone fa-2xl'
            ]);
         }
        
    }
}
