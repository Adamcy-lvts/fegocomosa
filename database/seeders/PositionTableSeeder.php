<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Position::count() == 0) {
            Position::create([
            
                'name' => "National President",
            ]);
    
            Position::create([
                'name' => "National Vice President",
               
                ]);
    
            Position::create([
                'name' => "Chairman",
              
                ]);
    
            Position::create([
                'name' => "Public Relation Officer",
             
                ]);
    
            Position::create([
                'name' => "Tresurer",
              
                ]);
    
            }
    }
}
