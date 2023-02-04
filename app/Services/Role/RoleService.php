<?php

namespace App\Services\Role;

use App\Models\Role;

class RoleService
{
    /**
     * takes columns names and return roles
     * return collection of roles
     * @param array $selectColumns
     * @return Collection
     */
    public function getRoles(array $selectColumns = ['*'])
    {
        return Role::select([$selectColumns])->get();
    }
}
