<?php

namespace App\Providers;

use View;
use App\Models\Lga;
use App\Models\House;
use App\Models\State;
use App\Models\Gender;
use App\Models\Category;
use Laravel\Fortify\Fortify;
use App\Models\MaritalStatus;
use App\Models\NavigationMenu;
use App\Models\GuestNavbarMenu;
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

        Fortify::registerView(function () {
           

            return view('auth.register', [
                'houses' => House::all(), 
                'marital_statuses' => MaritalStatus::all(),
                'genders' => Gender::all(),
                'proCategories' => Category::all(),
          
             ]);
        });

        View::composer('*', function($view)
        {
            $menus = NavigationMenu::orderBy('sorting')->get();
            $guestNavbar = GuestNavbarMenu::orderBy('sorting')->get();

            $view->with(['menus' => $menus, 'guestNavbar' => $guestNavbar]);
        });

    }
}
