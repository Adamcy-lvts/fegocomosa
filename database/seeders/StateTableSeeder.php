<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (State::count() == 0) {
            
            State::create([
                'name' => "Abia"
            ]);

            State::create([
                'name' => "Adamawa"
            ]);

            State::create([
                'name' => "Anambra"
            ]);

            State::create([
                'name' => "Akwa Ibom"
            ]);
            State::create([
                'name' => "Bauchi"
            ]);
            State::create([
                'name' => "Bayelsa"
            ]);
            State::create([
                'name' => "Benue"
            ]);
            State::create([
                'name' => "Borno"
            ]);
            State::create([
                'name' => "Cross River"
            ]);

            State::create([
                'name' => "Delta"
            ]);

            State::create([
                'name' => "Ebonyi"
            ]);

            State::create([
                'name' => "Enugu"
            ]);

            State::create([
                'name' => "Edo"
            ]);

            State::create([
                'name' => "Ekiti"
            ]);

            State::create([
                'name' => "FCT - Abuja"
            ]);

            State::create([
                'name' => "Gombe"
            ]);

            State::create([
                'name' => "Imo"
            ]);

            State::create([
                'name' => "Jigawa"
            ]);

            State::create([
                'name' => "Kaduna"
            ]);

            State::create([
                'name' => "Kano"
            ]);

            State::create([
                'name' => "Katsina"
            ]);

            State::create([
                'name' => "Kebbi"
            ]);

            State::create([
                'name' => "Kogi"
            ]);

            State::create([
                'name' => "Kwara"
            ]);

            State::create([
                'name' => "Lagos"
            ]);

            State::create([
                'name' =>  "Nasarawa"
            ]);

            State::create([
                'name' => "Niger"
            ]);

            State::create([
                'name' => "Ogun"
            ]);

            State::create([
                'name' => "Ondo"
            ]);

            State::create([
                'name' => "Osun"
            ]);

            State::create([
                'name' => "Oyo"
            ]);

            State::create([
                'name' => "Plateau"
            ]);

            State::create([
                'name' => "Rivers"
            ]);

            State::create([
                'name' => "Sokoto"
            ]);

            State::create([
                'name' => "Taraba"
            ]);

            State::create([
                'name' => "Yobe"
            ]);

            State::create([
                'name' => "Zamfara"
            ]);
    }
    }
}
