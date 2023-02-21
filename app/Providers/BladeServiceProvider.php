<?php

namespace App\Providers;

use App\Services\Permission\PermissionService;
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

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(PermissionService $permissionService)
    {
        Blade::if('check_permission', function ($permission) use($permissionService) {
            return in_array($permission, $permissionService->getPermissionsRedis());
        });

        Blade::if('check_permission_in_permissions', function (array $permissions) use($permissionService) {
            foreach ($permissions as $permission) {
                if (in_array($permission, $permissionService->getPermissionsRedis())) {
                    return true;
                }
            }
            return false;
        });
    }
}
