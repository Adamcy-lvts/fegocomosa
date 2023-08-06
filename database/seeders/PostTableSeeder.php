<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Post::count() == 0) {
            Post::create([
            
                'title' => "The Evolution of Taylor Swift",
                'slug' => 'the-evolution-of-taylor-swift',
                'body' => '<p>
                  <h1>Taylor Alison Swift</h1>
                Taylor Alison Swift (born December 13, 1989) is an American singer-songwriter. Her discography spans multiple genres,
                                and her narrative songwriting—often inspired by her personal life—has received critical praise and widespread media coverage.
                                Born in West Reading, Pennsylvania, Swift moved to Nashville, Tennessee, at the age of 14 to pursue a career in country music. 
                                She signed a songwriting contract with Sony/ATV Music Publishing in 2004 and a recording deal with Big Machine Records in 2005, 
                                and released her eponymous debut studio album in 2006.
                                Swift explored country pop on the albums Fearless (2008) and Speak Now (2010); the success of the singles "Love Story" and "You Belong with Me" 
                                on both country and pop radio established her as a leading crossover artist. She experimented with rock and electronic genres on her fourth studio album, Red (2012), 
                                supported by the singles "We Are Never Ever Getting Back Together" and "I Knew You Were Trouble". Swift eschewed country on her synth-pop album 1989 (2014) and its chart-topping tracks "Shake It Off", 
                                "Blank Space", and "Bad Blood". The media scrutiny on Swifts life inspired Reputation (2017), which drew from urban sounds. Led by Look What You Made Me Do, 
                                the album made Swift the only act in MRC Data history to have four albums each sell over a million copies in a week.
                                Parting ways with Big Machine, Swift signed with Republic Records in 2018 and released her seventh studio album, Lover (2019). 
                                Inspired by escapism during the COVID-19 pandemic, Swift ventured into indie folk and alternative rock styles on her 2020 studio albums,
                                Folklore and Evermore, receiving plaudits for their nuanced storytelling. Following a dispute over the masters of her back catalog,
                                she released the 2021 re-recordings Fearless (Taylors Version) and Red (Taylors Version) to universal acclaim. The number-one songs Cardigan, 
                                Willow and All Too Well (10 Minute Version) made Swift the only act to simultaneously debut atop the US Billboard Hot 100 and Billboard
                                200 charts three times. Besides music, she has played supporting roles in films such as Valentines Day (2010) and Cats (2019), released 
                                the autobiographical documentary Miss Americana (2020), and directed the musical films Folklore: The Long Pond Studio Sessions (2020)
                                and All Too Well: The Short Film (2021) 
                            </p>',
                'image' => 'ts-3.jpg',
                'user_id' => 1,
                'category_post_id' => 2,
            ]);

            Post::create([
                'title' => 'Eating Healthy: The Key to a Balanced Life',
                'slug' => 'eating-healthy-the-key-to-a-balanced-life',
                'body' => '<p>Welcome to our journey towards a healthier lifestyle through nutritious eating! We often hear the phrase, &quot;You are what you eat,&quot; and it holds true. Embracing a healthy diet is not just a trend but a fundamental aspect of well-being and longevity.</p>
                <p>Healthy eating goes beyond just shedding a few pounds. It impacts every aspect of our lives, from boosting energy levels and enhancing mental clarity to strengthening the immune system. Nutritious foods fuel our bodies with essential vitamins, minerals, and antioxidants that support our overall health.</p>
                <p>A well-rounded diet incorporates various food groups, ensuring we get a broad spectrum of nutrients. Here are the key components of a healthy eating plan:</p>
                <ul>
                    <li><strong>Fruits and Vegetables:</strong> Rich in vitamins, minerals, and fiber, they are essential for a strong immune system and healthy digestion.</li>
                    <li><strong>Whole Grains:</strong> Provide lasting energy and are packed with fiber, aiding in better digestion and heart health.</li>
                    <li><strong>Lean Proteins:</strong> Important for muscle repair and growth, they can be found in sources like lean meats, fish, beans, and tofu.</li>
                    <li><strong>Healthy Fats:</strong> Omega-3 fatty acids found in fish and nuts promote brain health and reduce inflammation.</li>
                    <li><strong>Dairy or Dairy Alternatives:</strong> Good sources of calcium and vitamin D for bone health.</li>
                </ul>
                <p>Remember, balance is key! Moderation is essential, even with healthier food choices.</p>
                <p>Transitioning to a healthier diet doesn&apos;t have to be overwhelming. Here are some practical tips to help you get started:</p>
                <ol>
                    <li><strong>Plan Your Meals:</strong> Prepare a weekly meal plan and grocery list to avoid impulsive, unhealthy choices.</li>
                    <li><strong>Cook at Home:</strong> Cooking your meals allows you to control ingredients and portion sizes.</li>
                    <li><strong>Stay Hydrated:</strong> Drink plenty of water throughout the day to maintain optimal bodily functions.</li>
                    <li><strong>Snack Smart:</strong> Opt for nutritious snacks like fruits, nuts, or yogurt to curb hunger between meals.</li>
                    <li><strong>Read Labels:</strong> Be mindful of hidden sugars, sodium, and unhealthy fats in packaged foods.</li>
                </ol>
                <p>Small changes lead to big results. Patience and consistency are vital on this journey.</p>
                <p>Eating healthy is not about following restrictive diets but embracing a sustainable lifestyle that nurtures our bodies and minds. By making conscious food choices and prioritizing nutrition, we pave the way for improved well-being and longevity.</p>
                <p>Let&apos;s embark on this journey together, supporting and inspiring each other along the way. Here&apos;s to a healthier, happier you!</p>',
                'image' => 'healthy_tips.jpg',
                'user_id' => 1,
                'category_post_id' => 1,
            ]);

            Post::create([
                'title' => 'How to Install Windows 11 on an Old System',
                'slug' => 'how-to-install-windows-11-on-old-system',
                'body' => '<p>Exciting news for Windows enthusiasts! Windows 11, the latest version of Microsoft\'s operating system, has been released. However, one common concern among users is whether their old systems can run this new OS. While Windows 11 comes with certain hardware requirements, there are still ways to install it on older PCs.</p>
                <p><strong>Disclaimer:</strong> Before attempting to install Windows 11 on an older system, be aware that it may not be officially supported. There could be compatibility issues, and we recommend backing up your data before proceeding.</p>
                <p>Requirements:</p>
                <ul>
                    <li>A 64-bit processor with at least 1 GHz clock speed</li>
                    <li>4 GB of RAM or more</li>
                    <li>64 GB of storage or more</li>
                    <li>UEFI firmware with Secure Boot capability</li>
                    <li>DirectX 12 compatible graphics / WDDM 2.x</li>
                    <li>A display with HD resolution (720p) or higher</li>
                </ul>
                <p>If your system meets these requirements, you can follow these steps to install Windows 11:</p>
                <ol>
                    <li><strong>Download Windows 11 ISO:</strong> Obtain the Windows 11 ISO file from the official Microsoft website or trusted sources.</li>
                    <li><strong>Create a Bootable USB Drive:</strong> Use a tool like Rufus to create a bootable USB drive with the Windows 11 ISO.</li>
                    <li><strong>Backup Your Data:</strong> Before proceeding, back up all your important data to an external storage device.</li>
                    <li><strong>Access BIOS/UEFI Settings:</strong> Restart your PC and access the BIOS/UEFI settings by pressing the appropriate key during boot (usually Del, F2, F10, or Esc).</li>
                    <li><strong>Change Boot Order:</strong> Set the USB drive as the first boot option in the BIOS/UEFI settings.</li>
                    <li><strong>Save Changes and Exit:</strong> Save your changes and exit the BIOS/UEFI settings. Your PC will now boot from the USB drive.</li>
                    <li><strong>Install Windows 11:</strong> Follow the on-screen instructions to install Windows 11 on your old system.</li>
                    <li><strong>Activate Windows:</strong> After installation, you may need to activate Windows 11 using a valid product key.</li>
                </ol>
                <p>Note that installing Windows 11 on an unsupported system may lead to performance and compatibility issues. If you encounter problems, consider reverting to your previous OS or seeking assistance from Microsoft or a qualified technician.</p>
                <p>Remember, always exercise caution when modifying your system, and proceed at your own risk.</p>',
                'image' => 'install_windows11.jpg',
                'user_id' => 1,
                'category_post_id' => 6,
            ]);
        

            Post::create([
                'title' => 'The Fascinating World of Quantum Physics',
                'slug' => 'the-fascinating-world-of-quantum-physics',
                'body' => '<p>Quantum physics, also known as quantum mechanics, is one of the most mind-bending and intriguing branches of science. It deals with the behavior of matter and energy on an atomic and subatomic scale, where the traditional laws of classical physics break down. Let\'s explore the fascinating world of quantum physics and some of its mind-blowing concepts.</p>
                <h2>Wave-Particle Duality</h2>
                <p>One of the most baffling aspects of quantum physics is the wave-particle duality of matter. This principle states that elementary particles, such as electrons and photons, can exhibit both wave-like and particle-like behaviors depending on the experiment. When observed as particles, they behave like discrete, localized objects, while in other situations, they behave like waves, spreading out and interfering with each other.</p>
                <h2>Quantum Entanglement</h2>
                <p>Quantum entanglement is a phenomenon where two or more particles become connected in such a way that the state of one particle is dependent on the state of another, regardless of the distance between them. This eerie connection, described by Albert Einstein as "spooky action at a distance," challenges our intuitive understanding of how the world works.</p>
                <h2>Schrodinger\'s Cat</h2>
                <p>Schrodinger\'s cat is a famous thought experiment illustrating the peculiar nature of quantum superposition. In this hypothetical experiment, a cat inside a closed box is considered both alive and dead simultaneously until the box is opened and the cat\'s state collapses into one of the possibilities. This highlights the bizarre notion that quantum particles can exist in multiple states until observed.</p>
                <h2>Quantum Computing</h2>
                <p>Quantum computing is an exciting field that leverages the principles of quantum mechanics to perform complex calculations at unparalleled speeds. Unlike classical computers that use bits to represent information as 0s or 1s, quantum computers use quantum bits or qubits, which can exist in multiple states simultaneously, allowing for exponential processing power.</p>
                <h2>The Uncertainty Principle</h2>
                <p>Werner Heisenberg\'s uncertainty principle is a fundamental concept in quantum physics. It states that it is impossible to simultaneously know both the precise position and momentum of a particle. The more accurately we measure one quantity, the less accurately we can measure the other, introducing a fundamental limit to our ability to observe the quantum world.</p>
                <p>Quantum physics continues to astonish scientists and challenge our understanding of reality. As researchers delve deeper into the mysteries of the quantum realm, we can expect even more groundbreaking discoveries that will shape the future of science and technology.</p>',
                'image' => 'quantum_physics.jpg',
                'user_id' => 1,
                'category_post_id' => 4,

            ]);

            Post::create([
                'title' => 'Embracing the Future: The Wonders of a Smart Home',
                'slug' => 'embracing-the-future-the-wonders-of-a-smart-home',
                'body' => '<p>Welcome to the future, where science fiction becomes reality through the wonders of smart home technology! The concept of a smart home has evolved from a mere fantasy into a thriving reality, transforming the way we live and interact with our living spaces.</p>
                <h2>What is a Smart Home?</h2>
                <p>A smart home is equipped with various interconnected devices and appliances that can be remotely controlled and automated through a central system. These devices communicate with each other and with you, the homeowner, creating a seamless and intelligent living environment.</p>
                <h2>The Benefits of a Smart Home</h2>
                <p>The integration of smart technology offers numerous advantages:</p>
                <ul>
                    <li><strong>Convenience:</strong> Control your lighting, thermostat, security cameras, and more with just a few taps on your smartphone or through voice commands.</li>
                    <li><strong>Energy Efficiency:</strong> Smart thermostats can learn your preferences and adjust the temperature accordingly, leading to energy savings.</li>
                    <li><strong>Home Security:</strong> Monitor your home remotely and receive real-time alerts in case of any security breaches.</li>
                    <li><strong>Time Savings:</strong> Automate routine tasks such as turning off lights or watering plants, freeing up time for more important activities.</li>
                    <li><strong>Peace of Mind:</strong> Check in on your home and loved ones, even when you\'re away, providing a sense of security.</li>
                </ul>
                <h2>Popular Smart Home Devices</h2>
                <p>The market is flooded with an array of smart devices that cater to different aspects of your home:</p>
                <ul>
                    <li><strong>Smart Speakers:</strong> Voice-activated devices like Amazon Echo and Google Home that serve as a central hub for controlling other smart devices.</li>
                    <li><strong>Smart Lighting:</strong> LED bulbs and light strips that can be dimmed, color-changed, or scheduled to suit your preferences.</li>
                    <li><strong>Smart Thermostats:</strong> Regulate your home\'s temperature and create energy-efficient heating and cooling schedules.</li>
                    <li><strong>Smart Security Cameras:</strong> Keep an eye on your property and receive instant alerts in case of suspicious activity.</li>
                    <li><strong>Smart Locks:</strong> Grant access to your home remotely and track who enters and exits.</li>
                    <li><strong>Smart Appliances:</strong> From refrigerators to washing machines, these appliances offer advanced features and remote controls.</li>
                </ul>
                <h2>Privacy and Security Concerns</h2>
                <p>While smart home technology offers tremendous benefits, it also raises concerns about privacy and security. It\'s essential to choose reputable brands, secure your network, and regularly update your devices\' firmware to protect against potential vulnerabilities.</p>
                <p>Embracing a smart home lifestyle requires careful consideration, but the rewards in terms of comfort, efficiency, and convenience make it a worthwhile journey into the future.</p>',
                'image' => 'smart_home.jpg',
                'user_id' => 1,
                'category_post_id' => 5,
            ]);

             Post::create([
            
                'title' => "Stranger Things",
                'slug' => 'stranger-things',
                'body' => '<p>
                            <h1>Super Natural Earth Quake In Hawkins</h1>
                            Stranger Things is an American science fiction horror drama television series created by the Duffer Brothers that is streaming on Netflix.
                            The brothers serve as showrunners and are executive producers along with Shawn Levy and Dan Cohen. The first season of the series was released
                            on Netflix on July 15, 2016, with the second, third, and fourth seasons following in October 2017, July 2019, and May and July 2022, respectively. 
                            In February 2022, the series was renewed for a fifth and final season.
                            Set in the 1980s primarily in the fictional town of Hawkins, Indiana, 
                            the series centers around numerous supernatural events occurring around the town,
                            specifically around their connection to a hostile alternate reality called the "Upside Down", 
                            after a link between it and Earth is made by a United States government child experimentation facility.
                            The series stars Winona Ryder, David Harbour, Finn Wolfhard, Millie Bobby Brown, Gaten Matarazzo, 
                            Caleb McLaughlin, Natalia Dyer, Charlie Heaton, Noah Schnapp, Sadie Sink, Joe Keery, Cara Buono, Matthew Modine, 
                            Dacre Montgomery, Sean Astin, Paul Reiser, Maya Hawke, Priah Ferguson, and Brett Gelman.
                            The Duffer Brothers developed Stranger Things as a mix of investigative drama and supernatural elements portrayed with horror,
                            science fiction and childlike sensibilities. Setting the series in the 1980s, the Duffer Brot
                          </p>',
                'image' => 'stranger_things_square.jpg',
                'user_id' => 2,
                'category_post_id' => 2
            ]);

            Post::create([
                'title' => 'The 2022 FIFA World Cup: A History-Making Event',
                'slug' => 'the-2022-fifa-world-cup-a-history-making-event',
                'body' => '<p>The 2022 FIFA World Cup was a history-making event in many ways. It was the first World Cup to be held in the Arab world, and it was also the first to be held in the winter months. The tournament was a huge success, with record-breaking viewership and attendance.</p>
                <p>One of the most notable aspects of the 2022 World Cup was the use of state-of-the-art technology. For example, all of the stadiums were equipped with cooling systems to help players and fans stay cool in the hot desert heat. The tournament also made use of artificial intelligence to help with refereeing decisions.</p>
                <p>Another notable aspect of the 2022 World Cup was its focus on sustainability. The stadiums were built using sustainable materials, and the tournament was powered by renewable energy. The organizers also implemented a number of other measures to reduce the environmental impact of the event.</p>
                <p>The 2022 FIFA World Cup was a truly global event, with fans from all over the world coming together to celebrate the beautiful game. It was also a landmark event for Qatar, which showed the world that it is a modern and progressive country.</p>
                <h2>Argentina\'s Story</h2>
                <p>Argentina had a memorable run to the final of the 2022 World Cup. The team was led by Lionel Messi, who was at the top of his game throughout the tournament. Messi scored seven goals in seven games, including two in the final against France.</p>
                <p>Argentina\'s road to the final was not easy. The team had to overcome some tough challenges, including a 2-2 draw with Saudi Arabia in the group stage. However, Argentina always found a way to win, and they eventually made it to the final.</p>
                <p>The final against France was a thrilling match that went all the way to penalties. Argentina won the shootout 4-2, and they were crowned champions of the world for the third time. It was a fitting end to a memorable tournament for Argentina, and it was a moment that Messi will never forget.</p>
                <h2>What does the future hold for Argentina?</h2>
                <p>Argentina\'s future looks bright after their victory in the 2022 World Cup. The team is still led by Messi, who is showing no signs of slowing down. Argentina also has a number of talented young players, such as Lautaro Martinez and Rodrigo De Paul.</p>
                <p>It is possible that Argentina could win the World Cup again in the near future. The team has the talent and the experience to do it, and they will be a force to be reckoned with in future tournaments.</p>
                <p>The 2022 FIFA World Cup was a truly memorable event, and it is sure to be a benchmark for future tournaments. It was a tournament that was defined by innovation, sustainability, and globalism, and it is sure to leave a lasting legacy.</p>',
                'image' => 'world_cup_2022.jpg',
                'user_id' => 1,
                'category_post_id' => 2,
            ]);

            Post::create([
            
                'title' => "Vampire Diaries",
                'slug' => 'vampire-diaries',
                'body' => '
                <h1>Mysterious Deaths, Animal Attacks, Witchcraft in Mystic Falls</h1>
                <p>
                    The Vampire Diaries is an American supernatural teen drama television series developed by Kevin Williamson and Julie Plec, 
                    based on the book series of the same name written by L. J. Smith. The series premiered on The CW on September 10, 2009,
                    and concluded on March 10, 2017, having aired 171 episodes over eight seasons.
                    The pilot episode attracted the largest audience for The CW of any series premiere since the network began in 2006;
                    the first season averaged 3.60 million viewers.[2] It became the most-watched series on the network before being supplanted by Arrow.
                    The show has received numerous award nominations, winning four Peoples Choice Award and many Teen Choice Awards.
                    In April 2015, lead actress Nina Dobrev, who played Elena Gilbert, confirmed that she would be leaving the show after its sixth season. 
                    Dobrev returned to record a voiceover for the seventh-season finale and returned as a guest star in the series finale.[3] In March 2016,
                    The CW renewed the series for an eighth season,[4] but in July of that year announced that the eighth season, consisting of 16 episodes, 
                    would be the shows last. The final season began airing on October 21, 2016, and ended March 10, 2017. 
                          </p>',
                'image' => 'the-vampire-diaries.jpg',
                'user_id' => 1,
                'category_post_id' => 2
            ]);
    
           
    
            }
    }
}
