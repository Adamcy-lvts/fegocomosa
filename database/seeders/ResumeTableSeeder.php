<?php

namespace Database\Seeders;

use App\Models\Hobby;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Reference;
use App\Models\Experience;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ResumeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Education
        Education::create([
            'user_id' => 1,
            'institution_name' => 'University of Lagos',
            'field_of_study' => 'Electrical & Electronics Engineering',
            'certificate' => 'Bachelor of Science',
            'starting_date' => '2018-09-01',
            'completion_date' => '2022-05-30',
        ]);

        Education::create([
            'user_id' => 1,
            'institution_name' => 'Tech Institute',
            'field_of_study' => 'Computer Science',
            'certificate' => 'Diploma',
            'starting_date' => '2016-03-15',
            'completion_date' => '2017-12-20',
        ]);

        Education::create([
            'user_id' => 1,
            'institution_name' => 'Abuja High School',
            'field_of_study' => 'High School Diploma',
            'certificate' => 'High School Diploma',
            'starting_date' => '2012-09-01',
            'completion_date' => '2018-06-30',
        ]);

        Education::create([
            'user_id' => 1,
            'institution_name' => 'Sunshine Primary School',
            'field_of_study' => 'Primary School Education',
            'certificate' => 'Primary School Certificate',
            'starting_date' => '2006-09-01',
            'completion_date' => '2012-06-30',
        ]);

        // Experiences
        Experience::create([
            'user_id' => 1,
            'employer' => 'WebCorp Solutions',
            'job_title' => 'Web Developer | Graphic Designer | Electrical Engineer',
            'start_date' => '2022-01-15',
            'end_date' => '2022-01-15',  // If still employed
            'description' => 'Developed and maintained responsive and user-friendly websites...',
        ]);

        Experience::create([
            'user_id' => 1,
            'employer' => 'DigitalWeb Studios',
            'job_title' => 'Web Developer',
            'start_date' => '2020-04-01',
            'end_date' => '2021-12-31',
            'description' => 'Collaborated with a team to create dynamic and visually appealing websites...',
        ]);

        Experience::create([
            'user_id' => 1,
            'employer' => 'PixelCraft Design',
            'job_title' => 'Graphic Designer',
            'start_date' => '2019-07-01',
            'end_date' => '2019-11-30',
            'description' => 'Designed eye-catching graphics for print and digital media...',
        ]);

        Experience::create([
            'user_id' => 1,
            'employer' => 'InnovateTech Solutions',
            'job_title' => 'Front-End Web Developer',
            'start_date' => '2018-09-15',
            'end_date' => '2019-03-31',
            'description' => 'Worked closely with UX/UI designers to implement responsive...',
        ]);

        // Add more experiences if needed

        // Skills
        $skills = [
            'HTML', 'CSS', 'JavaScript', 'Alpine.js', 'Livewire', 'PHP', 'Laravel'
        ];

        foreach ($skills as $skillName) {
            Skill::create([
                'user_id' => 1,
                'skill_name' => $skillName,
                'rating' => rand(60, 90),
            ]);
        }

        // Hobbies
        $hobbies = [
            'Exploring new technologies',
            'Creative coding projects',
            'Staying updated with design trends',
            'Outdoor photography',
            'Playing the guitar'
        ];

        foreach ($hobbies as $hobbyName) {
            Hobby::create([
                'user_id' => 1,
                'hobby_name' => $hobbyName,
            ]);
        }

        // References
        Reference::create([
            'user_id' => 1,
            'full_name' => 'Jane Smith',
            'job_title' => 'Senior Web Developer',
            'working_at' => 'Tech Innovators',
            'email' => 'jane.smith@example.com',
            'phone' => '+234 567 8901',
        ]);

        Reference::create([
            'user_id' => 1,
            'full_name' => 'Michael Johnson',
            'job_title' => 'Design Director',
            'working_at' => 'DesignWorks Studio',
            'email' => 'michael.johnson@example.com',
            'phone' => '+234 678 9012',
        ]);

    }
}
