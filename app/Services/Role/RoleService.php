<?php

namespace App\Services\Role;

use App\Models\Role;

class RoleService
{
    public function getRolesWithSpecificColumn(array $selectColumns)
    {
        return Role::select([$selectColumns])->get();
    }

    public function getRoleDataTable($roleDataTable)
    {
        return $roleDataTable->render('pages.role.index');
    }
}
