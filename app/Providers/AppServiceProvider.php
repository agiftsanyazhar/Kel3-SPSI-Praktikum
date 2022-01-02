<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        Gate::define('paa', function(User $user){                 //Admin => administrator
            return $user->role === 'PAA';
        });

        Gate::define('dosen', function(User $user){              //Pengurus
            return $user->role === 'Dosen';
        });

        Gate::define('mahasiswa', function(User $user){         //Admin+Pengurus
            return $user->role !== 'Mahasiswa';
        });
    }
}
