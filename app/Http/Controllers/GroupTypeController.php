<?php

namespace App\Http\Controllers;

use App\Models\GroupType;
use App\Http\Requests\GroupType\StoreGroupTypeRequest;
use App\Http\Requests\GroupType\UpdateGroupTypeRequest;
use App\Http\Traits\GroupTrait;
use App\Http\Traits\GroupTypeTrait;
use App\Models\Group;

class GroupTypeController extends Controller
{
    
    use GroupTypeTrait,
    GroupTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grouptypes = $this->getGroupType();
        return view('pages.groupType.index',[
            "grouptypes"=>$grouptypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGroupTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GroupType  $groupType
     * @return \Illuminate\Http\Response
     */
    public function show(GroupType $groupType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GroupType  $groupType
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupType $groupType)
    {
        $groups = Group::get();
        
        return view('pages.groupType.edit',[
            "groupType"=>$groupType,
            "groups"=>$groups
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupTypeRequest  $request
     * @param  \App\Models\GroupType  $groupType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupTypeRequest $request, GroupType $groupType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GroupType  $groupType
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupType $groupType)
    {
        //
    }
}
