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
                'name' => "Police",
                'slug' => "nurses",
                'icon' => 'fa-thin fa-siren fa-2xl'
    
                ]);
    
            Category::create([
                'name' => "Business",
                'slug' => "business",
                'icon' => 'fa-thin fa-chart-pie fa-2xl'
    
                ]);
    
            
             Category::create([
                'name' => "Military",
                'slug' => "military",
                'icon' => 'fa-thin fa-jet-fighter fa-2xl'
    
                ]);
            Category::create([
                'name' => "Bankers",
                'slug' => "bankers",
                'icon' => 'fa-thin fa-building-columns fa-2xl'
    
                ]);
         }
            
    }
}
