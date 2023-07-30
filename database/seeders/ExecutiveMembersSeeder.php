<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Position;
use App\Models\ExecutiveMember;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExecutiveMembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create or update the executive members

        // Adamcy is the National President
        $this->createOrUpdateExecutiveMember('Adamcy', 'National President');

        // Musty is the National Vice President
        $this->createOrUpdateExecutiveMember('Musty', 'National Vice President');

        // Ba Z is the Chairman
        $this->createOrUpdateExecutiveMember('Impo', 'Chairman');

        // Ameer is the Public Relation Officer
        $this->createOrUpdateExecutiveMember('Ameer', 'Public Relation Officer');

        // Impo is the Treasurer
        $this->createOrUpdateExecutiveMember('Ba Z', 'Treasurer');
    }

    private function createOrUpdateExecutiveMember($username, $positionName)
    {
        $user = User::where('username', $username)->first();
        $position = Position::where('name', $positionName)->first();

        if ($user && $position) {
            $executiveMember = ExecutiveMember::updateOrCreate(
                ['user_id' => $user->id],
                ['position' => $position->name]
            );
        }
    }
}
