<?php

namespace Database\Seeders;

use App\Models\Organizer;
use Illuminate\Database\Seeder;

class OrganizersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Organizer::create([
            'organizer_name' => 'Fegocomosa',
            'email'          =>  'fegocomosa@gmail.com'
            ]);
        Organizer::create([
            'organizer_name' => 'Class of 2010',
             'email'         =>  'classof2010@gmail.com'
            ]);
        Organizer::create([
            'organizer_name' => 'Emma Anih',
             'email'         =>  'emmanuelanih@gmail.com'
            ]);
        Organizer::create([
            'organizer_name' => 'Adamu Mohammed',
             'email'         =>  'adamumoh1989@gmail.com'
            ]);
        Organizer::create([
            'organizer_name' => 'Class of 2011',
             'email'         =>  'classof2011@gmail.com'
            ]);
    }
}
