<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Category::count() == 0) {
            Category::create([
            
                'name' => "Engineers",
                'description' => 'Connect with skilled engineers from various fields, including civil, mechanical, electrical, and more. Whether you need expert advice or collaboration on a project, FEGOCOMOSA\'s engineers have got you covered.',
                'slug' => "engineers",
                'icon' => 'fa-thin fa-user-helmet-safety fa-2xl'
            ]);
    
            Category::create([
                'name' => "Doctors",
                'description' => 'Access a network of experienced medical professionals, including doctors, specialists, and medical researchers. Find medical assistance or seek health-related guidance from qualified Fegomites.',
                'slug' => "doctors",
                'icon' => 'fa-thin fa-user-doctor fa-2xl'
    
                ]);
    
            Category::create([
                'name' => "Lawyers",
                'description' => 'Engage with legal experts and practitioners in diverse legal fields. If you need legal counsel, representation, or assistance with legal matters, FEGOCOMOSA\'s lawyers are available to help.',
                'slug' => "lawyers",
                'icon' => 'fa-thin fa-gavel fa-2xl'
    
                ]);
    
            Category::create([
                'name' => "Nurses",
                'description' => 'Connect with compassionate and skilled nurses who provide healthcare support and medical expertise. Whether you\'re seeking healthcare advice or services, FEGOCOMOSA\'s nurses can assist you.',
                'slug' => "nurses",
                'icon' => 'fa-thin fa-user-nurse fa-2xl'
    
                ]);
    
            Category::create([
                'name' => "Paramilitary",
                'description' => 'Connect with members who have served or are serving in the paramilitary or military forces. Share experiences, discuss security matters, and appreciate the contributions of these brave Fegomites.',
                'slug' => "paramilitary",
                'icon' => 'fa-thin fa-siren fa-2xl'
    
                ]);
    
            Category::create([
                'name' => "Business",
                'description' => 'Explore a community of successful entrepreneurs and business leaders. Whether you\'re an aspiring entrepreneur or need business-related advice, tap into the wealth of knowledge shared by FEGOCOMOSA\'s business moguls.',
                'slug' => "business",
                'icon' => 'fa-thin fa-briefcase fa-2xl'
    
                ]);
            Category::create([
                'name' => "Entrepreneurs",
                'description' => 'Discover a diverse range of enterprising individuals and startups. Collaborate, invest, or seek guidance from FEGOCOMOSA\'s entrepreneurial community.',
                'slug' => "entrepreneurs",
                'icon' => 'fa-thin fa-chart-pie fa-2xl'
    
                ]);
            Category::create([
                'name' => "Civil Servants",
                'description' => 'Connect with dedicated civil servants who have served or are serving in various government agencies. Learn about their experiences in public service.',
                'slug' => "civil-servants",
                'icon' => 'fa-thin fa-user-tie-hair fa-2xl'
    
                ]);
            Category::create([
                'name' => "Artist",
                'description' => 'Celebrate the talents of Fegomite artists, including painters, sculptors, musicians, and more. Explore their creations and support the arts.',
                'slug' => "artist",
                'icon' => 'fa-thin fa-microphone-lines fa-2xl'
    
                ]);
            Category::create([
                'name' => "Architect",
                'description' => 'Discover skilled architects who can design and plan your dream projects. From residential to commercial spaces, FEGOCOMOSA\'s architects can provide innovative solutions.',
                'slug' => "architect",
                'icon' => 'fa-thin fa-ruler-triangle fa-2xl'
  
                ]);
            Category::create([
                'name' => "Military",
                'description' => 'Connect with members who have served or are serving in the paramilitary or military forces. Share experiences, discuss security matters, and appreciate the contributions of these brave Fegomites.',
                'slug' => "military",
                'icon' => 'fa-thin fa-jet-fighter fa-2xl'
    
                ]);
            Category::create([
                'name' => "Bankers",
                'description' => 'Access banking and financial experts who can guide you on financial matters, investments, and more. Fegomite bankers offer valuable insights into the financial world.',
                'slug' => "bankers",
                'icon' => 'fa-thin fa-sack-dollar fa-2xl'
    
                ]);
            Category::create([
            'name' => "Accademicians",
            'description' => 'Connect with scholars, educators, and researchers from various academic disciplines. Exchange knowledge and stay informed about educational developments.',
            'slug' => "accademicians",
            'icon' => 'fa-thin fa-graduation-cap fa-2xl'

            ]);
            Category::create([
            'name' => "Graphic Designers",
            'description' => 'Explore the creative world of graphic designers who can bring your visual ideas to life. Whether it\'s for personal or professional projects, Fegomite graphic designers have the skills to assist you.',
            'slug' => "grapic-designers",
            'icon' => 'fa-thin fa-pen-nib fa-2xl'

            ]);
             Category::create([
            'name' => "Politicians",
            'description' => 'Engage with Fegomite politicians and leaders who have made significant contributions to society and governance. Discuss political issues and gain insights into public affairs.',
            'slug' => "politicians",
            'icon' => 'fa-thin fa-box-ballot fa-2xl'

            ]);
             Category::create([
            'name' => "Developers",
            'description' => 'Connect with talented and skilled developers from various programming disciplines. Whether you need assistance with web development, mobile apps, software engineering, or any coding-related projects, FEGOCOMOSA\'s developers have the expertise to help you bring your ideas to life. ',
            'slug' => "programmers",
            'icon' => 'fa-thin fa-code fa-2xl'
            ]);
             Category::create([
            'name' => "Journalist",
            'description' => 'Engage with media professionals, reporters, and journalists. Stay updated on current affairs and connect with those who communicate news to the world',
            'slug' => "Journalist",
            'icon' => 'fa-thin fa-microphone fa-2xl'
            ]);
         }
        
    }
}
