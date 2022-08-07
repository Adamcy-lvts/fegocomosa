<?php

namespace App\Providers;

use Livewire\Livewire;
use Laravel\Jetstream\Jetstream;
use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\ServiceProvider;
use App\Http\Responses\RegisterResponse;
use App\Http\Livewire\UpdateProfileInformationForm;


class JetstreamServiceProvider extends ServiceProvider
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

         // Register New RegisterResponse
        //  $this->app->singleton(
        // \Laravel\Fortify\Contracts\RegisterResponse::class,
        // \App\Http\Responses\RegisterResponse::class);

        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);

        Livewire::component('profile.update-profile-information-form', UpdateProfileInformationForm::class);

       
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
