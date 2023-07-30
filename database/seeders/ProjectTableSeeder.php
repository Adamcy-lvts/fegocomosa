<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Project;
use Illuminate\Support\Str;
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


        $startingDate = Carbon::now()->subDays(rand(1, 180)); // Random starting date within the last 6 months
        $completionDate = Carbon::now()->addDays(rand(30, 180)); // Random completion date within the next 6 months

        $projectsData = [
            [
                'title' => 'Renovation of Science Laboratories',
                'slug' => Str::slug('Renovation of Science Laboratories'),
                'user_id' => 1,
                'proposed_by' => 'Class of 1995',
                'executed_by' => 'Class of 1995',
                'budget' => 500000,
                'status' => 'In Progress',
                'progress_indicator' => 60,
                'starting_date' => $startingDate,
                'completion_date' => $completionDate,
                'cover_image' => 'nature-1.jpg',
                'body' => 'This project aims to renovate and modernize the science laboratories at Federal Government College Maiduguri. The laboratories have not been updated in decades, and they are in dire need of new equipment, furniture, and safety measures. With this project, we hope to provide students with state-of-the-art facilities that will enhance their learning experience and improve their understanding of science subjects. By creating a conducive environment for scientific exploration, we believe that we can inspire future generations of scientists and innovators.',
            ],
            [
            'title' => 'Clean Water Initiative',
            'slug' => Str::slug('Clean Water Initiative'),
            'user_id' => 1,
            'proposed_by' => 'Environmental Club',
            'executed_by' => 'Class of 2010',
            'budget' => 400000,
            'status' => 'In Progress',
            'progress_indicator' => 45,
            'starting_date' => $startingDate,
            'completion_date' => $completionDate,
            'cover_image' => 'nature-2.jpg',
            'body' => 'The Clean Water Initiative is a project aimed at providing access to clean and safe drinking water for students and staff at Federal Government College Maiduguri. This initiative is in response to the urgent need for improved water supply infrastructure on the school premises.

            With the support of the Environmental Club and the Class of 2010, we are working diligently to implement sustainable water solutions. This includes the installation of water filtration systems and the repair of existing water sources to ensure a continuous and reliable supply of clean water.

            Access to clean water is essential for the health and well-being of the school community. By promoting hygiene and sanitation, we aim to reduce waterborne illnesses and create a healthier environment for everyone.

            Together, let\'s make a lasting impact on the lives of the students and staff at Federal Government College Maiduguri. Join us in our mission to provide a fundamental necessity for a brighter and healthier future.',
            ],
            [
                'title' => 'Sports Equipment Upgrade',
                'slug' => Str::slug('Sports Equipment Upgrade'),
                'user_id' => 1,
                'proposed_by' => 'Ahmed Ali',
                'executed_by' => 'Class of 2012',
                'budget' => 300000,
                'status' => 'In Progress',
                'progress_indicator' => 40,
                'starting_date' => $startingDate,
                'completion_date' => $completionDate,
                'cover_image' => 'nature-3.jpg',
                'body' => 'This project aims to upgrade the sports equipment at Federal Government College Maiduguri. The current sports equipment is outdated and insufficient to meet the needs of our students. With this project, we hope to provide new and high-quality sports equipment that will encourage students to participate in various sports activities. Regular physical activity is essential for maintaining good health and fostering teamwork and discipline. By providing better sports equipment, we aim to enhance the overall well-being of our students and promote a healthy and active lifestyle.',
            ],
            [
                'title' => 'School Library Expansion',
                'slug' => Str::slug('School Library Expansion'),
                'user_id' => 1,
                'proposed_by' => 'Fatima Yusuf',
                'executed_by' => 'Class of 2008',
                'budget' => 400000,
                'status' => 'In Progress',
                'progress_indicator' => 50,
                'starting_date' => $startingDate,
                'completion_date' => $completionDate,
                'cover_image' => 'nature-4.jpg',
                'body' => 'This project aims to expand and update the school library at Federal Government College Maiduguri. The current library space is limited, and it lacks modern amenities and a wide range of books. With this project, we want to create a spacious and comfortable library environment that fosters a love for reading and learning. We will also invest in a diverse collection of books, including academic resources, fiction, non-fiction, and reference materials. By improving the library, we hope to cultivate a culture of reading and academic excellence among our students, empowering them with knowledge and a thirst for lifelong learning.',
            ],
            // Add more projects here...
        ];

        foreach ($projectsData as $data) {
            Project::create([
                'user_id' => $data['user_id'],
                'title' => $data['title'],
                'slug' => $data['slug'],
                'proposed_by' => $data['proposed_by'],
                'executed_by' => $data['executed_by'],
                'budget' => $data['budget'],
                'status' => $data['status'],
                'progress_indicator' => $data['progress_indicator'],
                'starting_date' => $data['starting_date'],
                'completion_date' => $data['completion_date'],
                'cover_image' => $data['cover_image'],
                'body' => $data['body'],
            ]);
        }

        // Project::create([
        //     'user_id'            => 1,
        //     'title'              => 'Digital Multimeters for students',
        //     'slug'               => Str::slug('Digital Multimeters for students'),
        //     'budget'             => 500000,
        //     'proposed_by'        => 'Adamu Mohammed',
        //     'executed_by'        => 'Class of 2010',
        //     'status'             => 'In Progress',
        //     'progress_indicator' =>  60,
        //     'starting_date'      =>  $startingDate,
        //     'completion_date'    =>  $completionDate,
        //     'cover_image'        => 'nature-1.jpg',
        //     'body'  => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate animi, inventore magni quae ab officia!'
        // ]);

        // Project::create([
        //     'user_id'            => 2,
        //     'title'              => 'Bore hole For Girls hostels ',
        //     'slug'               => Str::slug('Bore hole For Girls hostels '),
        //     'budget'             => 1000000,
        //     'proposed_by'        => 'Musty Lawan',
        //     'executed_by'        => 'Class of 2010',
        //     'status'             => 'In Progress',
        //     'progress_indicator' =>  90,
        //     'starting_date'      =>  $startingDate,
        //     'completion_date'    =>  $completionDate,
        //     'cover_image'        => 'nature-2.jpg',
        //     'body'  => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate animi, inventore magni quae ab officia!'
        // ]);

        // Project::create([
        //     'user_id'            => 4,
        //     'title'              => 'Computer Lab',
        //     'slug'               => Str::slug('Computer Lab'),
        //     'budget'             => 500000,
        //     'proposed_by'        => 'Class of 2010',
        //     'executed_by'        => 'Class of 2010',
        //     'status'             => 'Completed',
        //     'progress_indicator' =>  100,
        //     'starting_date'      =>  $startingDate,
        //     'completion_date'    =>  $completionDate,
        //     'cover_image'        => 'nature-3.jpg',
        //     'body'  => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate animi, inventore magni quae ab officia!'
        // ]);

        // Project::create([
        //     'user_id'            => 1,
        //     'title'              => 'Digital White Board for Lecture Theatre',
        //     'slug'               => Str::slug('Digital White Board for Lecture Theatre'),
        //     'budget'             => 700000,
        //     'proposed_by'        => 'Adamu Mohammed',
        //     'executed_by'        => 'Class of 2010',
        //     'status'             => 'Completed',
        //     'progress_indicator' =>  100,
        //     'starting_date'      =>  $startingDate,
        //     'completion_date'    =>  $completionDate,
        //     'cover_image'        => 'nature-4.jpg',
        //     'body'  => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate animi, inventore magni quae ab officia!'
        // ]);
    }
}
