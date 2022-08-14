<?php

namespace App\Http\Controllers;

use App\Models\GroupType;
use App\Http\Requests\StoreGroupTypeRequest;
use App\Http\Requests\UpdateGroupTypeRequest;

class GroupTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
