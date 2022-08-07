<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\EntryYear;
use Illuminate\Database\Seeder;

class EntryYearTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (EntryYear::count() == 0) {
            EntryYear::create([
            
                'year' => Carbon::create('2004')->format('Y')
            ]);
    
            EntryYear::create([
                'year' => Carbon::create('2003')->format('Y')
    
                ]);
    
            EntryYear::create([
                'year' => Carbon::create('2002')->format('Y')
    
                ]);
    
            EntryYear::create([
                'year' => Carbon::create('2001')->format('Y')
    
                ]);
    
            EntryYear::create([
                'year' => Carbon::create('2000')->format('Y')
    
                ]);
    
            EntryYear::create([
                'year' => Carbon::create('1999')->format('Y')
    
                ]);
    
            }
    }
}
