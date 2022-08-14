<?php

namespace App\Http\Controllers;

use App\Models\GroupDay;
use App\Http\Requests\GroupDay\StoreGroupDayRequest;
use App\Http\Requests\GroupDay\UpdateGroupDayRequest;

class GroupDayController extends Controller
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
     * @param  \App\Http\Requests\StoreGroupDayRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupDayRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GroupDay  $groupDay
     * @return \Illuminate\Http\Response
     */
    public function show(GroupDay $groupDay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GroupDay  $groupDay
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupDay $groupDay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupDayRequest  $request
     * @param  \App\Models\GroupDay  $groupDay
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupDayRequest $request, GroupDay $groupDay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GroupDay  $groupDay
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupDay $groupDay)
    {
        //
    }
}
