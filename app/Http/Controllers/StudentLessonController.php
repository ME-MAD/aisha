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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentLessonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentLessonRequest $request)
    {

        if ($request->max_chapters == $request->chapters_count) {
            StudentLesson::updateOrCreate([
                'student_id' => $request->student_id,
                'lesson_id' => $request->lesson_id,
                'group_id' => $request->group_id,
            ], [
                'finished' => true,
                'percentage' => 100,
                'last_chapter_finished' => $request->chapters_count,
                'last_page_finished' => $request->last_page_finished,
            ]);
        } else {
            $parcentage = ($request->chapters_count / $request->max_chapters) * 100;
            StudentLesson::updateOrCreate([
                'student_id' => $request->student_id,
                'lesson_id' => $request->lesson_id,
                'group_id' => $request->group_id,
            ], [
                'finished' => false,
                'percentage' => round($parcentage, 2),
                'last_chapter_finished' => $request->chapters_count,
                'last_page_finished' => $request->last_page_finished,
            ]);
        }
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }


    public function ajaxStudentLessonFinished(Request $request)
    {
        if ($request->finished == "true") {
            StudentLesson::updateOrCreate([
                'student_id' => $request->student_id,
                'lesson_id' => $request->lesson_id,
                'group_id' => $request->group_id,
            ], [
                'finished' => true,
                'percentage' => 100,
                'last_chapter_finished' => intval($request->chapters_count),
                'last_page_finished' => intval($request->last_page_finished),
            ]);
        } else {
            StudentLesson::updateOrCreate([
                'student_id' => $request->student_id,
                'lesson_id' => $request->lesson_id,
                'group_id' => $request->group_id,
            ], [
                'finished' => false,
            ]);
        }
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