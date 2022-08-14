<?php

namespace App\Http\Controllers;

use App\Models\syllabus;
use App\Http\Requests\syllabus\StoresyllabusRequest;
use App\Http\Requests\syllabus\UpdatesyllabusRequest;

class SyllabusController extends Controller
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
     * @param  \App\Http\Requests\StoresyllabusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresyllabusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function show(syllabus $syllabus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function edit(syllabus $syllabus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesyllabusRequest  $request
     * @param  \App\Models\syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesyllabusRequest $request, syllabus $syllabus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function destroy(syllabus $syllabus)
    {
        //
    }
}
