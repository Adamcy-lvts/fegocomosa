<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\GraduationYears;
use Illuminate\Database\Seeder;

class GraduationYearTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (GraduationYears::count() == 0) {
            GraduationYears::create([
            
                'year' => Carbon::create('2010')->format('Y')
            ]);
    
            GraduationYears::create([
                'year' => Carbon::create('2009')->format('Y')
    
                ]);
    
            GraduationYears::create([
                'year' => Carbon::create('2008')->format('Y')
    
                ]);
    
            GraduationYears::create([
                'year' => Carbon::create('2007')->format('Y')
    
                ]);
    
            GraduationYears::create([
                'year' => Carbon::create('2006')->format('Y')
    
                ]);
    
            GraduationYears::create([
                'year' => Carbon::create('2005')->format('Y')
    
                ]);
    
            }
    }
}
