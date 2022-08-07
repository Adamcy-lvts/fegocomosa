<?php

namespace Database\Seeders;

use App\Models\House;
use Illuminate\Database\Seeder;

class HouseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (House::count() == 0) {
            House::create([
            
                'name' => "Yobe House"
            ]);
    
            House::create([
                'name' => "Benue House"
    
                ]);
    
            House::create([
                'name' => "Borno House"
    
                ]);
    
            House::create([
                'name' => "Chad House"
    
                ]);
    
            House::create([
                'name' => "Niger House"
    
                ]);
    
            House::create([
                'name' => "Alau House"
    
                ]);
    
            }
    }
}
