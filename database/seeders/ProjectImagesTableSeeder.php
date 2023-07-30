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
            'images' => 'pro_7.jpg',
            'caption' => 'Before Renovation: Outdated and Inadequate Lab Equipment',
            'project_id' => 1
        ]);

        ProjectImages::create([
            'images' => 'pro_3.jpeg',
            'caption' => 'Upgrading the Workspace: New Lab Benches and Safety Measures',
            'project_id' => 1
        ]);

        ProjectImages::create([
            'images' => 'pro_2.jpg',
            'caption' => 'Upgrading the Workspace: New Lab Benches and Safety Measures',
            'project_id' => 2
        ]);

        ProjectImages::create([
            'images' => 'pro_4.jpg',
            'caption' => 'Modernizing Lab Equipment: Advanced Microscopes and Instruments',
            'project_id' => 2
        ]);

        ProjectImages::create([
            'images' => 'pro_1.jpg',
            'caption' => 'Improved Safety Standards: Fire Safety Equipment Installed',
            'project_id' => 3
        ]);

        ProjectImages::create([
            'images' => 'pro_5.jpg',
            'caption' => 'Completed Renovation: Spacious and Conducive Learning Environment',
            'project_id' => 3
        ]);

        ProjectImages::create([
            'images' => 'pro_6.jpg',
            'caption' => 'Enhancing Learning Spaces: New Interactive Whiteboards Installed',
            'project_id' => 4
        ]);

        ProjectImages::create([
            'images' => 'pro_8.jpg',
            'caption' => 'Promoting Collaboration: State-of-the-art Lab Tables and Group Workstations',
            'project_id' => 4
        ]);
    }
}
