<?php


namespace App\Http\Traits;

use App\Models\GroupStudent;

trait GroupStudentTrait
{
    private function getGroupStudentDesc()
    {
        return GroupStudent::orderBy('id', 'DESC')->get();
    }
    private function getGroupStudent()
    {
        return GroupStudent::select(['id','student_id','group_id'])
                     ->with(['student:id,name',
                               'group:id,from,to'     ])
                     ->get();
    }
}
