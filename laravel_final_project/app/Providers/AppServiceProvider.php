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

        $this->defineGateLogic();

    }


    /**
     * Defining a gate logic and blade directive for superadmin, and subadmins
     *
     * @return void
     */
    protected function defineGateLogic()
    {
        //admin
        Gate::define("admin", function (User $user) {
            return $user->role === "admin";
        });

        Blade::if("admin", function () {
            return auth()->user()?->can('admin');
        });

        Blade::if("cannotadmin", function () {
            return auth()->user()?->cannot("admin");
        });


        //Superadmin
        Gate::define("superadmin", function (User $user) {
            return $user->specific_role == "superadmin";
        });

        Blade::if("superadmin", function () {
            return auth()->user()?->can('superadmin');
        });

        Blade::if("cannotsuperadmin", function () {
            return auth()->user()?->cannot('superadmin');
        });


        //Cdadmin
        Gate::define("cdadmin", function (User $user) {
            return $user->specific_role == "cdadmin";
        });

        Blade::if("cdadmin", function () {
            return auth()->user()?->can('cdadmin');
        });


        //Bookadmin
        Gate::define("bookadmin", function (User $user) {
            return $user->specific_role == "bookadmin";
        });

        Blade::if("bookadmin", function () {
            return auth()->user()?->can('bookadmin');
        });


        //Gameadmin
        Gate::define("gameadmin", function (User $user) {
            return $user->specific_role == "gameadmin";
        });

        Blade::if("gameadmin", function () {
            return auth()->user()?->can('gameadmin');
        });


        $subAdmins = ['bookadmin', 'gameadmin', 'cdadmin'];

        Gate::define("subadmins", function (User $user) {
            return $user->specific_role == "cdadmin" || $user->specific_role == "gameadmin" || $user->specific_role == "bookadmin";
        });

        Blade::if("subadmins", function () {
            return auth()->user()?->can('subadmins');
        });

    }
}
