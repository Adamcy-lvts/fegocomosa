<?php

namespace App\Providers;

use App\Models\Lga;
use App\Models\House;
use App\Models\State;
use App\Models\Gender;
use App\Models\Category;
use Laravel\Fortify\Fortify;
use App\Models\MaritalStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       Schema::defaultStringLength(191);

    //    $houses = House::all();

        Fortify::registerView(function () {
           

            return view('auth.register', [
                'houses' => House::all(), 
                'marital_statuses' => MaritalStatus::all(),
                'genders' => Gender::all(),
                'proCategories' => Category::all(),
          
             ]);
        });

    }
}
