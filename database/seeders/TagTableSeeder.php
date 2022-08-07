<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Tag::count() == 0) {
            Tag::create([
            
                'name' => "Engineering"
            ]);
    
            Tag::create([
                'name' => "Medicine"
    
                ]);
    
            Tag::create([
                'name' => "Entertaiment"
    
                ]);
    
            Tag::create([
                'name' => "Sport"
    
                ]);
    
            Tag::create([
                'name' => "Celebrities"
    
                ]);

            Tag::create([
                'name' => "Movies"
    
                ]);
            
            Tag::create([
                'name' => "TV Shows"
    
                ]);
            
            Tag::create([
                'name' => "Food"
    
                ]);
            
            Tag::create([
                'name' => "Fitness"
    
                ]);

            Tag::create([
                'name' => "Technology"
    
                ]);
    
            }
    }
}
