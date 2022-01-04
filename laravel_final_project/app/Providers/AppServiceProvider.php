<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
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
        Paginator::useTailwind();

        Model::unguard();

        Gate::define("admin", function(User $user) {
           return $user->email === "rajeshbasnet@gmail.com";
        });

        Blade::if("admin", function () {
            return auth()->user()?->can('admin');
        });

        Blade::if("cannotadmin", function () {
            return auth()->user()?->cannot("admin");
        });
    }
}
