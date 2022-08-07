<?php

namespace Database\Seeders;

use App\Models\ProjectImages;
use Illuminate\Database\Seeder;

class ProjectImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectImages::create([
            'images' => 'ts-1.jpg',
            'caption' => 'The Cutest and Mesmerizing',
            'project_id' => 1
        ]);

        ProjectImages::create([
            'images' => 'ts-2.jpg',
            'caption' => 'The Magically Enchanting',
            'project_id' => 1
        ]);

        ProjectImages::create([
            'images' => 'ts-3.jpg',
            'caption' => 'Beautifully Hypnotizing',
            'project_id' => 2
        ]);

        ProjectImages::create([
            'images' => 'ts-4.jpg',
            'caption' => 'Magnificently Pretty',
            'project_id' => 2
        ]);

        ProjectImages::create([
            'images' => 'ts-5.jpg',
            'caption' => 'Effortlessly Sexy',
            'project_id' => 3
        ]);

        ProjectImages::create([
            'images' => 'ts-6.jpg',
            'caption' => 'Cuteness Overloaded',
            'project_id' => 3
        ]);

        ProjectImages::create([
            'images' => 'ts-7.jpg',
            'caption' => 'Classically Beautiful',
            'project_id' => 4
        ]);

        ProjectImages::create([
            'images' => 'ts-8.jpg',
            'caption' => 'Cutely Innocent',
            'project_id' => 4
        ]);
    }
}
