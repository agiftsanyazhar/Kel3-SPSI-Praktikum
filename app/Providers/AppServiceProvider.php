<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\User;

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
        Gate::define('paa', function(User $user){
            return $user->role === 'PAA';
        });

        Gate::define('dosen', function(User $user){
            return $user->role === 'Dosen';
        });

        Gate::define('mahasiswa', function(User $user){
            return $user->role === 'Mahasiswa';
        });
    }
}
