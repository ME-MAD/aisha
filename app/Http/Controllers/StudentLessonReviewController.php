<?php

namespace App\Http\Controllers;

use App\Models\StudentLesson;
use App\Models\StudentLessonReview;
use Illuminate\Http\Request;

class StudentLessonReviewController extends Controller
{
    public function ajaxStudentLessonFinishedReview(Request $request)
    {
        $studentLesson = StudentLesson::firstOrCreate([
            'group_id' => $request->group_id,
            'lesson_id' => $request->lesson_id,
            'student_id' => $request->student_id
        ],[
            
        ]);

        if($request->finished == "true")
        {
            StudentLessonReview::updateOrCreate([
                'student_lesson_id' => $studentLesson->id
            ], [
                'finished' => true,
                'percentage' => 100,
                'last_chapter_finished' => $request->chapters_count,
                'last_page_finished' => $request->last_page_finished,
            ]);
        }
        else
        {
            StudentLessonReview::updateOrCreate([
                'student_lesson_id' => $studentLesson->id
            ], [
                'finished' => false,
            ]);
        }

        

        return response()->json([
            'status' => 200
        ]);
    }
}
