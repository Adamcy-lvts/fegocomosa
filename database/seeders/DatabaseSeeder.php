<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory(10)->create();
        // \App\Models\Event::factory(10)->create();
        // \App\Models\GuestSlider::factory(4)->create();
        $this->call(UserTableSeeder::class);
        $this->call(RoleAndPermissionTableSeeder::class);
        $this->call(GuestSliderTableSeeder::class);
        $this->call(StateTableSeeder::class);
        $this->call(LgaTableSeeder::class);
        $this->call(HouseTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(MaritalStatusTableSeeder::class);
        $this->call(PositionTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(OrganizersTableSeeder::class);
        $this->call(CampaignTableSeeder::class);
        $this->call(ProjectTableSeeder::class);
        $this->call(ProjectImagesTableSeeder::class);
        $this->call(MemberSliderTableSeeder::class);
        $this->call(GraduationYearTableSeeder::class);
        $this->call(EntryYearTableSeeder::class);
        $this->call(NavigationMenuSeeder::class);
        $this->call(GuestNavBarMenuSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(PostCategoryTableSeeder::class);
        $this->call(ClassSeeder::class);
        $this->call(ExecutiveMembersSeeder::class);
        $this->call(SetAmbassadorTableSeeder::class);
    }
}
