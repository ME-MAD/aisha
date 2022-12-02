<?php

namespace App\Services;

use App\Models\Group;

class HomeService
{

    public function countGroupskid()
    {
        return Group::get()->where('age_type', 'kid')->count();
    }

    public function divisionGroupskid()
    {
        return  round(($this->countGroupskid() / $this->allCountGroups()) * 100);
    }

    public function countGroupsAdult()
    {
        return Group::get()->where('age_type', 'adult')->count();
    }

    public function divisionGroupsAdult()
    {
        return  round(($this->countGroupsAdult() / $this->allCountGroups()) * 100);
    }

    public function allCountGroups()
    {
        $groups = Group::get()->count();
        if ($groups == 0) {
            return "0%";
        } else {
            return $groups;
        }
    }

    ////////////////////////////////////////////////////////////////


    public function countGroupsPrice80()
    {
        return Group::get()->where('group_type_id', '1')->count();
    }

    // public function divisionGroupsPrice80()
    // {
    //     return  round(($this->countGroupsPrice80() / $this->allCountGroups()) * 100);
    // }

    public function countGroupsPrice120()
    {
        return Group::get()->where('group_type_id', '2')->count();
    }

    public function divisionGroupsPrice120()
    {
        return  round(($this->divisionGroupsPrice120() / $this->allCountGroups()) * 100);
    }

    public function countGroupsPrice200()
    {
        return Group::get()->where('group_type_id', '3')->count();
    }

    // public function divisionGroupsPrice200()
    // {
    //     return  round(($this->divisionGroupsPrice200() / $this->allCountGroups()) * 100);
    // }
}