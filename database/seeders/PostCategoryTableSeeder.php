<?php

namespace Database\Seeders;

use App\Models\CategoryPost;
use Illuminate\Database\Seeder;

class PostCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (CategoryPost::count() == 0) {
            CategoryPost::create([
            
                'name' => "Health",
                'slug' => 'health',
                'description' => 'Articles about health issues and fitness and lifestyle tips',
                'image' => '',
                'meta_title' => 'Healthy Life Style ',
                'meta_description' => 'Health issues and healthy lifestyle Meta Description',
                'meta_keyword' => 'Health Anatomy Lifestyle Fitness Disease Medication Meta Keyword',
            ]);
    
            CategoryPost::create([
                'name' => "Entertaiment",
                'slug' => 'entertaiment',
                'description' => 'All things entertaiment',
                'image' => '',
                'meta_title' => 'Movies TV-Shows Music',
                'meta_description' => 'Movies TV-Shows Music Meta Description',
                'meta_keyword' => 'Movies TV-Shows Music Meta Keyword',
                ]);
    
            CategoryPost::create([
                'name' => "Sport",
                'slug' => 'sport',
                'description' => 'Sport News and Articles for All Things Sport',
                'image' => '',
                'meta_title' => 'Football Basket Ball Table Tenis Olympics',
                'meta_description' => 'Football Basket Ball Table Tenis Olympics Meta Description',
                'meta_keyword' => 'Football Basket Ball Table Tenis Olympics Meta Keyword',
                ]);
    
            CategoryPost::create([
                'name' => "Science",
                'slug' => 'science',
                'description' => 'Scentific Journals Discoveries Theories Physic Chmistry',
                'image' => '',
                'meta_title' => 'Scentific Journals Discoveries Theories Physic Chmistry',
                'meta_description' => 'Scentific Journals Discoveries Theories Physic Chmistry Meta Description',
                'meta_keyword' => 'Scentific Journals Discoveries Theories Physic Chmistry Meta Keyword',
                ]);
    
            CategoryPost::create([
                'name' => "Technology",
                'slug' => 'technology',
                'description' => 'Latest Tech News and Articles Reviews ',
                'image' => '',
                'meta_title' => 'Smart Phones Laptops Smart Home Cloud Tech Web Development Apple Microsoft Samsung Intel Google',
                'meta_description' => 'Smart Phones Laptops Smart Home Cloud Tech Web Development Apple Microsoft Samsung Intel Google Meta Description',
                'meta_keyword' => 'Smart Phones Laptops Smart Home Cloud Tech Web Development Apple Microsoft Samsung Intel Google Meta Keyword',
                ]);

             CategoryPost::create([
                'name' => "How To",
                'slug' => 'how-to',
                'description' => 'Learn how to do almost anything from intalling windows to troubleshooting your phone to cooking....',
                'image' => '',
                'meta_title' => 'Learn how to do almost anything from intalling windows to troubleshooting your phone to cooking',
                'meta_description' => 'Learn how to do almost anything from intalling windows to troubleshooting your phone to cooking Meta Description',
                'meta_keyword' => 'Learn how to do almost anything from intalling windows to troubleshooting your phone to cooking Meta Keyword',
                ]);
    
            }
    }
}
