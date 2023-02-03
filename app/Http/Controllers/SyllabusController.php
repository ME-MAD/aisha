<?php

namespace App\Http\Controllers;

use App\Http\Requests\syllabus\CreateNewLessonRequest;
use App\Http\Traits\AuthTrait;
use App\Models\syllabus;
use App\Services\StudentLesson\StudentLessonService;
use Illuminate\Http\Request;

class SyllabusController extends Controller
{
    use AuthTrait;

    private StudentLessonService $studentLessonService;

    public function __construct(StudentLessonService $studentLessonService)
    {
        $this->studentLessonService = $studentLessonService;
    }

    public function createNewLesson(CreateNewLessonRequest $request)
    {
        $student_lesson_id = $request->student_lesson_id;
        if (!$request->student_lesson_id) {
            $studentLesson = $this->studentLessonService->firstOrCreateStudentLesson($request);
            $student_lesson_id = $studentLesson->id;
        }

        if (syllabus::where([
            ['student_lesson_id', $student_lesson_id],
            ['finished', false]
        ])->exists()) {
            return response()->json([
                'status' => 400,
            ]);
        }

        $syllabi = syllabus::create([
            'student_lesson_id' => $student_lesson_id,
            'from_chapter' => $request->from_chapter,
            'to_chapter' => $request->to_chapter,
            'from_page' => $request->from_page,
            'to_page' => $request->to_page,
            'finished' => false
        ]);

        return response()->json([
            'status' => 200,
            'syllabi' => $syllabi
        ]);
    }

    public function finishNewLessonAjax(Request $request, syllabus $syllabus)
    {
        if ($syllabus->finished == true) {
            return response()->json([
                'status' => 400,
            ]);
        }

        if ($request->rate == "fail") {
            $syllabus->update([
                'finished' => true,
                'rate' => $request->rate
            ]);
            syllabus::create([
                'student_lesson_id' => $syllabus->student_lesson_id,
                'from_chapter' => $syllabus->from_chapter,
                'to_chapter' => $syllabus->to_chapter,
                'from_page' => $syllabus->from_page,
                'to_page' => $syllabus->to_page,
                'finished' => false
            ]);
        } else {
            $syllabus->update([
                'finished' => true,
                'rate' => $request->rate
            ]);
        }


        $studentLesson = $syllabus->studentLesson;
        $lesson = $studentLesson->lesson;

        $percentage = ($syllabus->to_chapter / $lesson->chapters_count) * 100;

        $studentLesson->update([
            'last_page_finished' => $syllabus->to_page,
            'last_chapter_finished' => $syllabus->to_chapter,
            'percentage' => round($percentage, 2),
            'finished' => $syllabus->to_chapter == $lesson->chapters_count ? true : false
        ]);

        return response()->json([
            'status' => 200,
            'studentLesson' => $studentLesson,
            'syllabus' => $syllabus
        ]);
    }
}
