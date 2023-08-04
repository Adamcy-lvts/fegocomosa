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
         // Create 4 Education records for User ID 1
         for ($i = 0; $i < 4; $i++) {
            Education::create([
                'user_id' => 1,
                'institution_name' => 'University ' . ($i + 1),
                'field_of_study' => 'Field of Study ' . ($i + 1),
                'certificate' => 'Certificate ' . ($i + 1),
                'starting_date' => '20' . ($i + 1) . '-09-01',
                'completion_date' => '20' . ($i + 1) . '-05-15',
            ]);
        }

        // Create 4 Experience records for User ID 1
        for ($i = 0; $i < 4; $i++) {
            Experience::create([
                'user_id' => 1,
                'job_title' => 'Job Title ' . ($i + 1),
                'employer' => 'Employer ' . ($i + 1),
                'description' => 'Description of job ' . ($i + 1),
                'start_date' => '20' . ($i + 1) . '-06-01',
                'end_date' => '20' . ($i + 1) . '-12-31',
            ]);
        }

        // Create 4 Skill records for User ID 1
        for ($i = 0; $i < 4; $i++) {
            Skill::create([
                'user_id' => 1,
                'skill_name' => 'Skill ' . ($i + 1),
                'rating' => rand(1, 5),
            ]);
        }

        // Create 4 Hobby records for User ID 1
        for ($i = 0; $i < 4; $i++) {
            Hobby::create([
                'user_id' => 1,
                'hobby_name' => 'Hobby ' . ($i + 1),
            ]);
        }

        // Create 4 Reference records for User ID 1
        for ($i = 0; $i < 4; $i++) {
            Reference::create([
                'user_id' => 1,
                'full_name' => 'Reference ' . ($i + 1),
                'job_title' => 'Job Title ' . ($i + 1),
                'working_at' => 'Company ' . ($i + 1),
                'email' => 'reference' . ($i + 1) . '@example.com',
                'phone' => '123-456-789' . $i,
            ]);
        }
    }
}
