<?php

namespace App\Services\Permission;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class PermissionService
{

    public function getAllPermissionNames($requestPermissions): array
    {
        $allPermissionsNames = [];

        if (!is_null($requestPermissions)) {
            foreach ($requestPermissions as $table => $permissions) {
                foreach ($permissions as $permission) {
                    $allPermissionsNames [] = $permission;
                }
            }
        }

        return $allPermissionsNames;
    }

    public function setPermissionsRedis($permissions)
    {
        $redis = Redis::connection();

        $redis->set('permissions',json_encode($permissions));
    }

    public function getPermissionsRedis()
    {
        $redis = Redis::connection();

        return json_decode($redis->get('permissions'));
    }

    public function handlePermissions($controller ,array $arr): void
    {
        foreach($arr as $method => $permission)
        {
            $controller->middleware(function($request, $next) use ($permission) {
                $user = Auth::guard(getGuard())->user();
                if(in_array($permission, $this->getPermissionsRedis()))
                {
                    return $next($request);
                }
                abort(403);
            })->only($method);
        }
    }
}
