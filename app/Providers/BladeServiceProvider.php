<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;

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
            if(Auth::guard(getGuard())->user()->isAbleTo($permission))
            {
                return true;
            }
            return false;
        });

        Blade::if('check_permission_in_permissions', function (array $permissions) {
            foreach($permissions as $permission)
            {
                if(Auth::guard(getGuard())->user()->isAbleTo($permission))
                {
                    return true;
                }
            }
            return false;
        });
    }
}
