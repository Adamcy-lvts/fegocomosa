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
                'category_post_id' => 1,
            ]);

            Post::create([
            
                'title' => "Ariana Grande",
                'slug' => 'ariana-grande',
                'body' => '<p>
                <h1>Ariana Grande-Butera</h1>
                            Ariana Grande-Butera; born June 26, 1993) is an American singer, songwriter, and actress. 
                            Her four-octave vocal range has received critical acclaim, and her personal life has been the subject of widespread media attention. 
                            She has received numerous accolades throughout her career, including two Grammy Awards, one Brit Award, one Bambi Award, 
                            two Billboard Music Awards, three American Music Awards, nine MTV Video Music Awards, and 27 Guinness World Records.
                            Grande began her music career at age 15 in the 2008 Broadway musical 13. She rose to fame for playing Cat Valentine in the Nickelodeon
                             television series Victorious (2010–2013) and Sam & Cat (2013–2014). Grande signed with Republic Records in 2011 after label
                              executives viewed YouTube videos of her covering songs. Her 1950s doo-wop-influenced pop and R&B debut album,[2] Yours Truly (2013),
                               topped the US Billboard 200, while its lead single, "The Way", reached the top ten of the US Billboard Hot 100. 
                               Grandes voice and whistle register on the album drew immediate comparisons to Mariah Carey. 
                          </p>',
                'image' => 'ariana_grande_black_and_white.jpg',
                'user_id' => 2,
                'category_post_id' => 1
            ]);

            Post::create([
            
                'title' => "Becky G",
                'slug' => 'becky-g',
                'body' => '<p>
                <h1>Rebbeca Marie Gomez</h1>
                            Rebbeca Marie Gomez (born March 2, 1997), known professionally as Becky G, is an American singer and actress.
                             She first gained recognition in 2011 when she began posting videos of herself covering popular songs online. 
                             One of her videos caught the attention of producer Dr. Luke, who subsequently offered her a joint record deal with Kemosabe Records
                              and RCA Records. While working on her debut effort, Gomez collaborated with artists will.i.am, Cody Simpson and Cher Lloyd. 
                              Her official debut single, "Becky from the Block" (2013), received a positive reception upon its release.
                               She released her debut extended play, Play It Again (2013), later that same year. Her second single, Cant Get Enough (2014), 
                               featured guest vocals from Pitbull and went on to top the Latin Rhythm Airplay chart in the United States. 
                          </p>',
                'image' => 'Becky_G_1.jpg',
                'user_id' => 1,
                'category_post_id' => 1
            ]);

            Post::create([
            
                'title' => "Kristen Stewart",
                'slug' => 'kristen-stewart',
                'body' => '<p>
                <h1>Kristen Jaymes Stewart</h1>
                              Kristen Jaymes Stewart (born April 9, 1990) is an American actress and filmmaker.
                               The worlds highest-paid actress in 2012, she has received various accolades, 
                               including a British Academy Film Award and a César Award, in addition to nominations for an Academy Award and a Golden Globe Award.
                              Born and raised in Los Angeles to parents who both worked in the entertainment industry,
                               Stewart first gained notice at age 12 for her role as the daughter of Jodie Fosters character in David Finchers thriller
                                Panic Room (2002), which earned her a Young Artist Award nomination. She subsequently starred in Speak (2004), 
                                Catch That Kid (2004), Zathura: A Space Adventure (2005), and Into the Wild (2007). She went on to achieve global 
                                stardom for her role as Bella Swan in The Twilight Saga film series (2008–2012), which ranks among the highest-grossing 
                                film franchises; for the role, she was awarded the BAFTA Rising Star Award in 2010. 
                          </p>',
                'image' => 'Kristen-Stewart-HQ.jpg',
                'user_id' => 1,
                'category_post_id' => 1
            ]);

            Post::create([
            
                'title' => "Olivia Rodrigo",
                'slug' => 'olivia-rodrigo',
                'body' => '<p>
                 <h1>Olivia Isabel Rodrigo</h1>
                              Olivia Isabel Rodrigo was born on February 20, 2003, at Rancho Springs Medical Center in Murrieta, California.
                               She lived and grew up in neighboring Temecula.[6] Rodrigo is biracial; her father is of Filipino descent
                                and her mother has German and Irish ancestry.[7][8][9] Her father works as a family therapist and her mother works 
                                as a school teacher.[7] She has stated that her paternal great-grandfather moved from the Philippines to the United States
                                 as a teenager and her family follows Filipino traditions and cuisine.[10] Rodrigo started taking vocal lessons 
                                 in kindergarten and learned to play piano soon after.[11] She began taking acting and singing classes at age six 
                                 and started acting in theater productions in elementary school.[5][12] Rodrigo was playing guitar by age 12.
                                  She grew up listening to her parents favorite alternative rock music, such as the bands No Doubt, Pearl Jam, the White Stripes, 
                                  and Green Day. Rodrigo became interested in songwriting after listening to country music, especially American singer-songwriter
                                   Taylor Swift.[13] She moved to Los Angeles after landing her role on Bizaardvark.[12]
                          </p>',
                'image' => 'olivia_1.jpg',
                'user_id' => 2,
                'category_post_id' => 1
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
            
                'title' => "Game of Thrones",
                'slug' => 'game-of-thrones',
                'body' => '
                <h1>The Song of Ice and Fire</h1>
                <p>
                                Game of Thrones is an American fantasy drama television series created by David Benioff and D. B. Weiss for HBO.
                                It is an adaptation of A Song of Ice and Fire, a series of fantasy novels by George R. R. Martin,
                                the first of which is A Game of Thrones. The show was shot in the United Kingdom, Canada, Croatia, Iceland, Malta, 
                                Morocco, and Spain. It premiered on HBO in the United States on April 17, 2011, and concluded on May 19, 2019, 
                                with 73 episodes broadcast over eight seasons.

                                Set on the fictional continents of Westeros and Essos, Game of Thrones has a large ensemble cast and follows several story arcs throughout the course of the show.
                                The first major arc concerns the Iron Throne of the Seven Kingdoms of Westeros through a web of political conflicts
                                among the noble families either vying to claim the throne or fighting for independence from whoever sits on it. A second focuses
                                on the last descendant of the realms deposed ruling dynasty, who has been exiled to Essos and is plotting to return and reclaim the throne.
                                The third follows the Nights Watch, a military order defending the realm against threats from beyond Westeross northern border. 
                          </p>',
                'image' => 'game_of_thrones_winter_is_coming_stark-wallpaper.jpg',
                'user_id' => 1,
                'category_post_id' => 2
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
