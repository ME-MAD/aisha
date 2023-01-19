<?php

namespace App\Services\StudentLessonReview;

use App\Models\StudentLessonReview;

class StudentLessonReviewService
{
    public  $studentLesson;

    public function finished(object $request)
    {
        StudentLessonReview::updateOrCreate([
            'student_lesson_id'     => $request->student_lesson_id
        ], [
            'finished'              => true,
            'percentage'            => 100,
            'last_chapter_finished' => $request->chapters_count,
            'last_page_finished'    => $request->last_page_finished,
        ]);
    }

    public function notFinished(object $request)
    {
        StudentLessonReview::updateOrCreate([
            'student_lesson_id'     =>  $request->student_lesson_id
        ], [
            'finished' => false,
        ]);
    }
}
