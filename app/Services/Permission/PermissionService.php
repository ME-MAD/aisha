<?php

namespace App\Services\Permission;

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
}
