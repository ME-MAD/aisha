<?php

namespace App\Http\Controllers;

use App\Models\syllabus;
use App\Http\Requests\syllabus\StoresyllabusRequest;
use App\Http\Requests\syllabus\UpdatesyllabusRequest;
use RealRashid\SweetAlert\Facades\Alert;

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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoresyllabusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresyllabusRequest $request)
    {
        syllabus::create([
            'student_id' => $request->student_id,
            'new_lesson' => $request->new_lesson,
            'old_lesson' => $request->old_lesson,
            'is_reverse' => $request->is_reverse,

        ]);
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect()->back();
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
        $syllabus->update([
            'student_id' => $request->student_id,
            'new_lesson' => $request->new_lesson,
            'old_lesson' => $request->old_lesson,
            'is_reverse' => $request->is_reverse,
        ]);

        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function delete(syllabus $syllabus)
    {
        $syllabus->delete();
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect()->back();
    }
}