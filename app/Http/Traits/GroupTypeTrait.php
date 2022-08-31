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
        return GroupType::select(['id','days_num','name','price'])->get();
    }
}
