<?php

namespace App\Services\GroupDay;

use App\Models\GroupDay;

class GroupDayService
{

    public function getAllGroupdays(array $columns = ['id', 'group_id', 'day'])
    {
        return GroupDay::select($columns)->get();
    }

    public function createGroupDay(object $request)
    {

        return GroupDay::create([
            'group_id' => $request->group_id,
            'day'      => $request->day,
        ]);
    }

    public function updateGroupDay(GroupDay $groupDay, object $request)
    {

        return $groupDay->update([
            'group_id' => $request->group_id,
            'day'      => $request->day,
        ]);
    }

    public function deleteGroupDay(GroupDay $groupDay)
    {
        return $groupDay->delete();
    }

    public function getGroupDaysOfGroup($group_id)
    {
        return GroupDay::where('group_id', $group_id)->select(['group_id', 'day'])->get();
    }
}