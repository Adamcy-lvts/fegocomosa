<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Gender::count() == 0) {

            Gender::create([
            
                'gender' => "Male"
            ]);

            Gender::create([
            
                'gender' => "Female"
            ]);

            }
    }
}
