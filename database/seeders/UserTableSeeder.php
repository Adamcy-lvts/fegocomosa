<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() == 0) {
         
            $myDate = Carbon::now();
            $myBirthDate = new Carbon('1991-04-12');
            
            $user = User::create([
                'username'          => 'Adamcy',
                'email'             => 'lv4mj1@gmail.com',
                'first_name'        => 'Adam',
                'middle_name'       => '',
                'last_name'         => 'Mohammed',
                'date_of_birth'     =>  $myBirthDate,
                'about_you'         => 'Hardware Engineer at National Open Univiersity of Nigeria, CEO DevSync, Coding is my Cocain, Obsessed with Everyhing Space',
                // 'profile_photo_path'=> 'profile-photos/taylor_profile.jpg',
                'gender_id'         =>  1,
                'marital_status_id' =>  1,
                'address'           => 'New G.R.A Maiduguri, Borno State',
                'phone'             => '07060741999',
                'state_id'          => 8,
                'city_id'           => 162,
                'profession'        => 'Engineer',
                'workplace'        => 'Nation Open University of Nigeria(NOUN)',
                'jss_class'         => 'Jss1Q',
                'sss_class'         => 'Sss3Q',
                'house_id'          => 2,
                // 'potrait_image'     => 'mj_1.jpg',
                'entry_year_id'     => 1,
                'graduation_year_id'=> 1,
                'password'          => bcrypt('swifty1989'),
                'remember_token'    => Str::random(60),
              
            ]);

            User::create([
                'username'          => 'Musty',
                'email'             => 'MustyL@gmail.com',
                'first_name'        => 'Mustapha',
                'middle_name'       => '',
                'last_name'         => 'Lawan',
                'date_of_birth'     =>  $myBirthDate,
                'about_you'         => 'Civil Servant at University of Maiduguri, Lover Gina, Caprice ',
                'profile_photo_path'=> 'profile-photos/ariana_1.jpg',
                'gender_id'         =>  1,
                'marital_status_id' =>  1,
                'address'           => 'New G.R.A Maiduguri, Borno State',
                'phone'             => '08069550775',
                'state_id'          => 8,
                'city_id'           => 168,
                'profession'        => 'Accademician',
                'workplace'         => 'University of Maiduguri(UNIMAID)',
                'jss_class'         => 'Jss1S',
                'sss_class'         => 'Sss3G',
                'house_id'          => 6,
                'potrait_image'     => 'millie_bobby_brown_3.jpg',
                'entry_year_id'     => 2,
                'graduation_year_id'=> 1,
                'password'          => bcrypt('swifty1989'),
                'remember_token'    => Str::random(60),
              
            ]);

            User::create([
                'username'          => 'Ba Z',
                'email'             => 'ZannaM@gmail.com',
                'first_name'        => 'Zanna',
                'middle_name'       => 'Mustapha',
                'last_name'         => 'Abatcha',
                'profile_photo_path'=> 'profile-photos/olivia_1.jpg',
                'date_of_birth'     =>  $myBirthDate,
                'about_you'         => '',
                'gender_id'         =>  1,
                'marital_status_id' =>  2,
                'address'           => 'Bolori Maiduguri, Borno State',
                'phone'             => '08036363465',
                'state_id'          =>  8,
                'city_id'           => 158,
                'profession'        => 'Engineer',
                'workplace'        =>  'Fedral University of Tchnology',
                'jss_class'         => 'Jss1P',
                'sss_class'         => 'Sss3E',
                'house_id'          => 2,
                'potrait_image'    => 'millie_bobby_brown_2.jpg',
                'entry_year_id'     => 2,
                'graduation_year_id'=> 2,
                'password'          => bcrypt('swifty1989'),
                'remember_token'    => Str::random(60),
              
            ]);

            
             User::create([
                'username'          => 'Ameer',
                'email'             => 'AbubakarM@gmail.com',
                'first_name'        => 'Abubakar',
                'middle_name'       => 'Mohammed',
                'last_name'         => 'Babaje',
                'date_of_birth'     =>  $myBirthDate,
                'about_you'         => '',
                'profile_photo_path'=> 'profile-photos/caprice_1.jpg',
                'gender_id'         =>  1,
                'marital_status_id' =>  1,
                'address'           => 'Mairi Kuwait Maiduguri, Borno State',
                'phone'             => '08036363465',
                'state_id'          =>  8,
                'city_id'           => 152,
                'profession'        => 'Lecturer',
                'workplace'         => 'University of Maiduguri(UNIMAID)',
                'jss_class'         => 'Jss1P',
                'sss_class'         => 'Sss3E',
                'house_id'          => 2,
                'potrait_image'     => 'taylor_swift_5.jpg',
                'entry_year_id'     => 2,
                'graduation_year_id'=> 3,
                'password'          => bcrypt('swifty1989'),
                'remember_token'    => Str::random(60),
              
            ]);

             User::create([
                'username'          => 'Impo',
                'email'             => 'AbbaImpo@gmail.com',
                'first_name'        => 'Abba',
                'middle_name'       => 'Musa',
                'last_name'         => 'Mohammed',
                'date_of_birth'     =>  $myBirthDate,
                'about_you'         => '',
                'profile_photo_path'=> 'profile-photos/millie_profile.jpg',
                'gender_id'         =>  1,
                'marital_status_id' =>  2,
                'address'           => 'Moramti Maiduguri, Borno State',
                'phone'             => '07069786117',
                'state_id'          =>  8,
                'city_id'           => 170,
                'profession'        => 'Teacher',
                'workplace'        =>  'Success Secondary School Maduguri',
                'jss_class'         => 'Jss1P',
                'sss_class'         => 'Sss3E',
                'house_id'          => 2,
                'potrait_image'     => 'ariana_grande_1.jpg',
                'entry_year_id'     => 1,
                'graduation_year_id'=> 1,
                'password'          => bcrypt('swifty1989'),
                'remember_token'    => Str::random(60),
              
            ]);

            //  User::create([
            //     'username'          => 'Izghe Boy',
            //     'email'             => 'Izghe@gmail.com',
            //     'first_name'        => 'Musa',
            //     'middle_name'       => 'Izghe',
            //     'last_name'         => 'Abubakar',
            //     'date_of_birth'     =>  $myBirthDate,
            //     'about_you'         => '',
            //     'profile_photo_path'=> 'profile-photos/Taylor_Swift_1.jpg',
            //     'gender_id'         =>  1,
            //     'marital_status_id' =>  1,
            //     'address'           => 'Musawa, Katsina State',
            //     'phone'             => '07069786117',
            //     'state_id'          =>  8,
            //     'city_id'           =>  152,
            //     'profession'        => 'Physiotheraphy',
            //     'workplace'         => 'University of Maiduguri Teaching Hospital(UMTH)',
            //     'jss_class'         => 'Jss1Q',
            //     'sss_class'         => 'Sss3S',
            //     'house_id'          => 2,
            //     'potrait_image'     => 'Ariana_1.jpg',
            //     'entry_year_id'     => 1,
            //     'graduation_year_id'=> 2,
            //     'password'          => bcrypt('swifty1989'),
            //     'remember_token'    => Str::random(60),
              
            // ]);

            // User::create([
            //     'username'          => 'Tukson',
            //     'email'             => 'Tukur@gmail.com',
            //     'first_name'        => 'Tukur',
            //     'middle_name'       => '',
            //     'last_name'         => 'Musawa',
            //     'date_of_birth'     =>  $myBirthDate,
            //     'about_you'         => '',
            //     'profile_photo_path'=> 'profile-photos/Taylor_Swift_1.jpg',
            //     'gender_id'         =>  1,
            //     'marital_status_id' =>  2,
            //     'address'           => 'Musawa, Katsina State',
            //     'phone'             => '07069786117',
            //     'state_id'          =>  21,
            //     'city_id'           =>  437,
            //     'profession'        => 'Lecturer',
            //     'jss_class'         => 'Jss1P',
            //     'sss_class'         => 'Sss3S',
            //     'house_id'          => 2,
            //     'potrait_image'     => 'ariana_grande_2.jpg',
            //     'entry_year_id'     => 1,
            //     'graduation_year_id'=> 1,
            //     'password'          => bcrypt('swifty1989'),
            //     'remember_token'    => Str::random(60),
              
            // ]);

            // User::create([
            //     'username'          => 'Eldeen',
            //     'email'             => 'NurudeenO@gmail.com',
            //     'first_name'        => 'Nurudeen',
            //     'middle_name'       => '',
            //     'last_name'         => 'Okunade',
            //     'date_of_birth'     =>  $myBirthDate,
            //     'about_you'         => '',
            //     'profile_photo_path'=> 'profile-photos/Taylor_Swift_1.jpg',
            //     'gender_id'         =>  1,
            //     'marital_status_id' =>  2,
            //     'address'           => 'Igbona Area, Osun State',
            //     'phone'             => '07069786117',
            //     'state_id'          =>  30,
            //     'city_id'           =>  626,
            //     'profession'        => 'Engineer',
            //     'workplace'        =>  'Steraco Construction',
            //     'jss_class'         => 'Jss1P',
            //     'sss_class'         => 'Sss3S',
            //     'house_id'          => 3,
            //     'potrait_image'     => 'megan_rain_1.jpg',
            //     'entry_year_id'     => 4,
            //     'graduation_year_id'=> 1,
            //     'password'          => bcrypt('swifty1989'),
            //     'remember_token'    => Str::random(60),
              
            // ]);

            // User::create([
            //     'username'          => 'Junior',
            //     'email'             => 'Junior@gmail.com',
            //     'first_name'        => 'Adamu',
            //     'middle_name'       => 'Junior',
            //     'last_name'         => 'Mohammed',
            //     'date_of_birth'     =>  $myBirthDate,
            //     'profile_photo_path'=> 'profile-photos/Taylor_Swift_1.jpg',
            //     'gender_id'         =>  1,
            //     'marital_status_id' =>  1,
            //     'address'           => 'Bama, Borno State',
            //     'phone'             => '07069786117',
            //     'state_id'          =>  8,
            //     'city_id'           =>  144,
            //     'profession'        => 'Lecturer',
            //     'workplace'        => 'Nation Open University of Nigeria(NOUN)',
            //     'jss_class'         => 'Jss1Q',
            //     'sss_class'         => 'Sss3E',
            //     'house_id'          => 2,
            //     'potrait_image'     => 'millie_bobby_brown_1.jpg',
            //     'entry_year_id'     => 4,
            //     'graduation_year_id'=> 1,
            //     'password'          => bcrypt('swifty1989'),
            //     'remember_token'    => Str::random(60),
              
            // ]);

            // User::create([
            //     'username'          => 'Chammoo',
            //     'email'             => 'chammoo@gmail.com',
            //     'first_name'        => 'Ahmed',
            //     'middle_name'       => '',
            //     'last_name'         => 'Abdulsalam',
            //     'date_of_birth'     =>  $myBirthDate,
            //     'about_you'         => '',
            //     'profile_photo_path'=> 'profile-photos/Taylor_Swift_1.jpg',
            //     'gender_id'         =>  1,
            //     'marital_status_id' =>  2,
            //     'address'           => 'Bama, Borno State',
            //     'phone'             => '07069786117',
            //     'state_id'          =>  8,
            //     'city_id'           =>  144,
            //     'profession'        => 'Bussiness Man',
            //     'workplace'        => 'Gamboru Market',
            //     'jss_class'         => 'Jss1Q',
            //     'sss_class'         => 'Sss3E',
            //     'house_id'          => 2,
            //     'potrait_image'     => 'selena_gomez_1.jpg',
            //     'entry_year_id'     => 4,
            //     'graduation_year_id'=> 1,
            //     'password'          => bcrypt('swifty1989'),
            //     'remember_token'    => Str::random(60),
              
            // ]);

            
            
        }
    }
}
