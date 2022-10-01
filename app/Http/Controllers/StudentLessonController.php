<?php

namespace App\Http\Controllers;

use App\Models\StudentLesson;
use App\Http\Requests\StudentLesson\StoreStudentLessonRequest;
use App\Http\Requests\StudentLesson\UpdateStudentLessonRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StudentLessonController extends Controller
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
     * @param  \App\Http\Requests\StoreStudentLessonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentLessonRequest $request)
    {
        //
    }


    public function ajax(Request $request)
    {
        StudentLesson::create([
            'student_id' => $request->student_id,
            'lesson_id' => $request->lesson_id,
            'group_id' => $request->group_id,
            'finished' => true,
            'percentage' => 100,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentLesson  $studentLesson
     * @return \Illuminate\Http\Response
     */
    public function show(StudentLesson $studentLesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentLesson  $studentLesson
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentLesson $studentLesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentLessonRequest  $request
     * @param  \App\Models\StudentLesson  $studentLesson
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentLessonRequest $request, StudentLesson $studentLesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentLesson  $studentLesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentLesson $studentLesson)
    {
        //
    }
}