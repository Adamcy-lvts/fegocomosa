<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Campaign;
use Illuminate\Database\Seeder;

class CampaignTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $startingDate = new Carbon('2022-06-12');
          

                  $campaigns = [
                      [
                          'campaign_title' => 'Education for All',
                          'slug' => 'education-for-all',
                          'description' => 'Help provide quality education to underprivileged children in rural areas.',
                          'about' => 'Your contribution will provide access to books, school supplies, and qualified teachers. With your support, we aim to build more schools in remote areas, empowering children with knowledge and opportunities for a brighter future. Together, we can break the barriers of poverty and illiteracy.',
                          'goal' => 500000, // Amount in Nigerian Naira
                          'starting_date' => Carbon::parse('2023-08-01'),
                          'cover_image' => 'donate_1.jpg',
                          'caption' => 'Together, let\'s create a brighter future for these children.',
                          'organizer_id' => 1, // Replace with the actual organizer's ID.
                      ],
                      [
                          'campaign_title' => 'Medical Relief for Sarah',
                          'slug' => 'medical-relief-for-sarah',
                          'description' => 'Support Sarah in her battle against a life-threatening illness. Funds will go towards medical treatment and expenses.',
                          'about' => 'Your generous contributions will help cover medical bills, treatments, and necessary medications for Sarah\'s recovery. Sarah is a strong individual fighting against all odds, and your support will make a significant impact on her journey to regain her health. Let us rally together and show Sarah that she is not alone in this fight.',
                          'goal' => 800000, // Amount in Nigerian Naira
                          'starting_date' => Carbon::parse('2023-08-15'),
                          'cover_image' => 'taylor_swift_3.jpg',
                          'caption' => 'Join us in making a difference in Sarah\'s life and supporting her on this challenging journey.',
                          'organizer_id' => 2, // Replace with the actual organizer's ID.
                      ],
                      [
                          'campaign_title' => 'Empowering Women Entrepreneurs',
                          'slug' => 'empowering-women-entrepreneurs',
                          'description' => 'Fund training and resources for aspiring female entrepreneurs.',
                          'about' => 'This campaign aims to empower women to become entrepreneurs and leaders in their communities. Your contributions will go towards providing business mentorship, training workshops, and financial assistance for women to start their ventures. Together, we can create a more inclusive and prosperous society by supporting women on their entrepreneurial journey.',
                          'goal' => 350000, // Amount in Nigerian Naira
                          'starting_date' => Carbon::parse('2023-09-01'),
                          'cover_image' => 'ariana_grande_2.jpg',
                          'caption' => 'Support women entrepreneurship for a brighter future.',
                          'organizer_id' => 3, // Replace with the actual organizer's ID.
                      ],
                      [
                          'campaign_title' => 'Environmental Conservation Project',
                          'slug' => 'environmental-conservation-project',
                          'description' => 'Conserve wildlife habitats and promote sustainable practices.',
                          'about' => 'The Environmental Conservation Project aims to preserve endangered habitats, protect wildlife, and promote sustainable practices. By contributing to this campaign, you can help protect fragile ecosystems, combat climate change, and ensure a harmonious coexistence between humans and nature. Let\'s work together to leave a greener and healthier planet for future generations.',
                          'goal' => 750000, // Amount in Nigerian Naira
                          'starting_date' => Carbon::parse('2023-09-15'),
                          'cover_image' => 'taylor_swift_4.jpg',
                          'caption' => 'Be a steward of the environment. Join the conservation movement.',
                          'organizer_id' => 4, // Replace with the actual organizer's ID.
                      ],
                      [
                          'campaign_title' => 'Community Food Drive',
                          'slug' => 'community-food-drive',
                          'description' => 'Help provide meals for families facing food insecurity.',
                          'about' => 'Join our Community Food Drive to combat hunger and food insecurity. Your contributions will help distribute nutritious meals to families in need, ensuring that no one in our community goes to bed hungry. Together, we can make a difference in the lives of those facing food challenges and build a stronger, more resilient community.',
                          'goal' => 400000, // Amount in Nigerian Naira
                          'starting_date' => Carbon::parse('2023-10-01'),
                          'cover_image' => 'donate_5.jpg',
                          'caption' => 'A small donation can make a big impact. Support our food drive today!',
                          'organizer_id' => 5, // Replace with the actual organizer's ID.
                      ],
                      [
                          'campaign_title' => 'Medical Support for James',
                          'slug' => 'medical-support-for-james',
                          'description' => 'James needs urgent medical attention. Help cover his medical expenses and aid in his recovery.',
                          'about' => 'James is a young individual facing a severe medical condition that requires immediate attention. Your generous contributions will help cover his medical bills, treatments, and ongoing care. Your support will make a significant difference in his journey to recovery and provide him with the hope and strength he needs during this challenging time.',
                          'goal' => 600000, // Amount in Nigerian Naira
                          'starting_date' => Carbon::parse('2023-10-15'),
                          'cover_image' => 'ariana_grande_1.jpg',
                          'caption' => 'Your kindness can change a life. Support James on his path to healing.',
                          'organizer_id' => 1, // Replace with the actual organizer's ID.
                      ],
                      [
                          'campaign_title' => 'Disaster Relief Fund',
                          'slug' => 'disaster-relief-fund',
                          'description' => 'Aid those affected by natural disasters and rebuild communities.',
                          'about' => 'The Disaster Relief Fund provides essential support to those affected by natural calamities. Your contributions will help provide emergency aid, shelter, food, and medical care to communities devastated by disasters. Together, we can rebuild lives and communities, offering hope and resilience to those in need.',
                          'goal' => 1000000, // Amount in Nigerian Naira
                          'starting_date' => Carbon::parse('2023-11-01'),
                          'cover_image' => 'donate_2.jpg',
                          'caption' => 'Be a ray of hope in times of darkness. Support disaster relief efforts.',
                          'organizer_id' => 1, // Replace with the actual organizer's ID.
                      ],
                      [
                          'campaign_title' => 'Mental Health Awareness Campaign',
                          'slug' => 'mental-health-awareness-campaign',
                          'description' => 'Support mental health initiatives and reduce the stigma surrounding mental illness.',
                          'about' => 'Join our Mental Health Awareness Campaign to promote mental well-being and reduce the stigma surrounding mental illness. Your contributions will help support awareness programs, counseling services, and mental health advocacy. Together, we can create a compassionate society where everyone feels understood, accepted, and supported.',
                          'goal' => 300000, // Amount in Nigerian Naira
                          'starting_date' => Carbon::parse('2023-11-15'),
                          'cover_image' => 'donate_3.png',
                          'caption' => 'Let\'s break the stigma and support mental health for all.',
                          'organizer_id' => 2, // Replace with the actual organizer's ID.
                      ],
                      [
                          'campaign_title' => 'Medical Assistance for Aisha',
                          'slug' => 'medical-assistance-for-aisha',
                          'description' => 'Aisha requires medical treatment for a serious condition. Your contributions will make a difference in her life.',
                          'about' => 'Aisha is a brave individual battling a serious medical condition that requires extensive treatment. Your contributions will help cover her medical expenses, hospital stays, and other necessary support. By supporting Aisha, you can be part of her journey to healing and recovery, offering her the care and hope she needs.',
                          'goal' => 550000, // Amount in Nigerian Naira
                          'starting_date' => Carbon::parse('2023-12-01'),
                          'cover_image' => 'megan_rain_1.jpg',
                          'caption' => 'Your support can bring healing and hope to Aisha\'s life. Contribute today!',
                          'organizer_id' => 2, // Replace with the actual organizer's ID.
                      ],
                      [
                          'campaign_title' => 'Art for a Cause',
                          'slug' => 'art-for-a-cause',
                          'description' => 'Fund art workshops for children with disabilities.',
                          'about' => 'Our Art for a Cause campaign aims to provide creative outlets for children with disabilities. Your contributions will help fund art workshops and classes, providing these children with opportunities to express themselves and discover their artistic talents. Together, we can promote inclusivity and empower these young artists to shine.',
                          'goal' => 250000, // Amount in Nigerian Naira
                          'starting_date' => Carbon::parse('2023-12-15'),
                          'cover_image' => 'ariana_grande_1.jpg',
                          'caption' => 'Unlock the creativity and potential of children with disabilities. Support our cause.',
                          'organizer_id' => 5, // Replace with the actual organizer's ID.
                      ],
                  ];
          
                  foreach ($campaigns as $campaignData) {
                      Campaign::create($campaignData);
                  }
              }
          
          

       
    
}
