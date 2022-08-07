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
                'user_id' => 2
            ]);
    
            Position::create([
                'name' => "National Vice President",
                'user_id' => 3
                ]);
    
            Position::create([
                'name' => "Chairman",
                'user_id' => 4
                ]);
    
            Position::create([
                'name' => "Public Relation Officer",
                'user_id' => 1
                ]);
    
            Position::create([
                'name' => "Tresurer",
                'user_id' => 5
                ]);
    
            }
    }
}
