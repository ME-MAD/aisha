<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('check_permission', function ($permission) {
            return userCan($permission);
        });

        Blade::if('check_permission_in_permissions', function (array $permissions) {
            foreach ($permissions as $permission) {
                if (Auth::guard(getGuard())->user()->isAbleTo($permission)) {
                    return true;
                }
            }
            return false;
        });
    }
}
