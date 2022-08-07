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
        Organizer::create(['org_name' => 'Fegocomosa']);
        Organizer::create(['org_name' => 'Class of 2010']);
        Organizer::create(['org_name' => 'Emma Anih']);
        Organizer::create(['org_name' => 'Adamu Mohammed']);
        Organizer::create(['org_name' => 'Class of 2011']);
    }
}
