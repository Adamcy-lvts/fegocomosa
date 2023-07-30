<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\SetAmbassador;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SetAmbassadorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Get all users
         $users = User::all();

         // Randomly select 8 users
         $selectedUsers = $users->random(8);
 
         // Generate set ambassadors with random years
         foreach ($selectedUsers as $user) {
             // Generate a random year between 1990 and the current year
             $randomYear = mt_rand(1990, Carbon::now()->year);
 
             // Insert into the set_ambassadors table
             SetAmbassador::create([
                 'user_id' => $user->id,
                 'year' => $randomYear,
                 'created_at' => Carbon::now(),
                 'updated_at' => Carbon::now(),
             ]);
         }
    }
}
