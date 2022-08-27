<?php


namespace App\Http\Traits;

use App\Models\GroupDay;

trait GroupDayTrait
{
    private function getGroupDaysDesc()
    {
        return GroupDay::orderBy('id', 'DESC')->get();
    }
    private function getGroupDays()
    {
        return GroupDay::select(['id','group_id','day'])
                     ->with('group:id,from,to')
                     ->get();
    }
}
