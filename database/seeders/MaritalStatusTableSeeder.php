<?php

namespace Database\Seeders;

use App\Models\MaritalStatus;
use Illuminate\Database\Seeder;

class MaritalStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (MaritalStatus::count() == 0) {

            MaritalStatus::create([
            
                'marital_status' => "Single"
            ]);

            MaritalStatus::create([
            
                'marital_status' => "Married"
            ]);

            }
    }
}
