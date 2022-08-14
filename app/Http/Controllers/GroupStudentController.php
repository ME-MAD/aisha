<?php

namespace App\Http\Controllers;

use App\Models\GroupStudent;
use App\Http\Requests\StoreGroupStudentRequest;
use App\Http\Requests\UpdateGroupStudentRequest;

class GroupStudentController extends Controller
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
     * @param  \App\Http\Requests\StoreGroupStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupStudentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GroupStudent  $groupStudent
     * @return \Illuminate\Http\Response
     */
    public function show(GroupStudent $groupStudent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GroupStudent  $groupStudent
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupStudent $groupStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupStudentRequest  $request
     * @param  \App\Models\GroupStudent  $groupStudent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupStudentRequest $request, GroupStudent $groupStudent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GroupStudent  $groupStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupStudent $groupStudent)
    {
        //
    }
}
