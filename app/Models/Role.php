<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    use HasFactory;
    
    public $guarded = [];

    public function roleUsers()
    {
        return $this->hasMany(RoleUser::class, 'role_id');
    }

    public function rolePermissions()
    {
        return $this->hasMany(PermissionRole::class, 'role_id');
    }

}


