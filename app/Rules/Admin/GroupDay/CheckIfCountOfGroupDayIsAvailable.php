<?php

namespace App\Rules\Admin\GroupDay;

use App\Models\Group;
use Illuminate\Contracts\Validation\Rule;

class CheckIfCountOfGroupDayIsAvailable implements Rule
{
    private $maxDaysOfGroup;

    public function __construct()
    {
        //
    }


    public function passes($attribute, $value): bool
    {
        $group = Group::find(request('group_id'));
        $this->maxDaysOfGroup = $group->groupType->days_num;

        return $this->maxDaysOfGroup <= count($value);
    }


    public function message(): string
    {
        return 'This Group Available For ' . $this->maxDaysOfGroup . 'Days';
    }
}
