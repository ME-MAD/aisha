<?php


namespace App\Http\Traits;

use App\Models\Group;

trait GroupTrait
{
    private function getGroupsDesc()
    {
        return Group::orderBy('id', 'DESC')->get();
    }
    private function getGroups()
    {
        return Group::select(['id','from','to','teacher_id','group_type_id','age_type'])
                     ->with('teacher:id,name')
                     ->get();
    }
}
