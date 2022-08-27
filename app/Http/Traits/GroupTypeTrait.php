<?php


namespace App\Http\Traits;

use App\Models\GroupType;

trait GroupTypeTrait
{
    private function getGroupTypesDesc()
    {
        return GroupType::orderBy('id', 'DESC')->get();
    }
    private function getGroupType()
    {
        return GroupType::select(['id','group_id','name','price'])
                     ->with('group:id,from,to')
                     ->get();
    }
}
