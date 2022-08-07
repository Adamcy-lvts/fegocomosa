<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $startingDate = new Carbon('2022-06-15');
        $completionDate = new Carbon('2022-07-15');

        Project::create([
            'user_id'            => 1,
            'title'              => 'Digital Multimeters for students',
            'budget'             => 500000,
            'proposed_by'        => 'Adamu Mohammed',
            'executed_by'        => 'Class of 2010',
            'status'             => 'In Progress',
            'progress_indicator' =>  60,
            'starting_date'      =>  $startingDate,
            'completion_date'    =>  $completionDate,
            'cover_image'        => 'nature-1.jpg',
            'body'  => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate animi, inventore magni quae ab officia!'
        ]);

        Project::create([
            'user_id'            => 2,
            'title'              => 'Bore hole For Girls hostels ',
            'budget'             => 1000000,
            'proposed_by'        => 'Musty Lawan',
            'executed_by'        => 'Class of 2010',
            'status'             => 'In Progress',
            'progress_indicator' =>  90,
            'starting_date'      =>  $startingDate,
            'completion_date'    =>  $completionDate,
            'cover_image'        => 'nature-2.jpg',
            'body'  => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate animi, inventore magni quae ab officia!'
        ]);

        Project::create([
            'user_id'            => 4,
            'title'              => 'Computer Lab',
            'budget'             => 500000,
            'proposed_by'        => 'Class of 2010',
            'executed_by'        => 'Class of 2010',
            'status'             => 'Completed',
            'progress_indicator' =>  100,
            'starting_date'      =>  $startingDate,
            'completion_date'    =>  $completionDate,
            'cover_image'        => 'nature-3.jpg',
            'body'  => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate animi, inventore magni quae ab officia!'
        ]);

        Project::create([
            'user_id'            => 1,
            'title'              => 'Digital White Board for Lecture Theatre',
            'budget'             => 700000,
            'proposed_by'        => 'Adamu Mohammed',
            'executed_by'        => 'Class of 2010',
            'status'             => 'Completed',
            'progress_indicator' =>  100,
            'starting_date'      =>  $startingDate,
            'completion_date'    =>  $completionDate,
            'cover_image'        => 'nature-4.jpg',
            'body'  => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate animi, inventore magni quae ab officia!'
        ]);
    }
}
