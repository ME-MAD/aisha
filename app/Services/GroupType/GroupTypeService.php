<?php
namespace App\Services\GroupType;

use App\Models\GroupType;

class GroupTypeService
{
    public function getAllGroupTypes(array $columns = ['id', 'name'])
    {
        return GroupType::select($columns)->get();
    }
}