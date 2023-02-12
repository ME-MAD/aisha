<?php

namespace App\Services\Syllabus;

use App\Models\StudentLesson;
use App\Models\StudentLessonReview;
use App\Models\syllabus;
use App\Models\SyllabusReview;

class SyllabusReviewService
{
    public function firstOrCreateStudentLesson(object $request)
    {
       return StudentLesson::firstOrCreate([
            'group_id' => $request->group_id,
            'lesson_id' => $request->lesson_id,
            'student_id' => $request->student_id
        ], [

        ]);
    }

    public function firstOrCreateStudentLessonReview($student_lesson_id)
    {
        return StudentLessonReview::firstOrCreate([
                'student_lesson_id' => $student_lesson_id
            ], [

            ]);
    }
    

    public function updateSyllabusReviewIfRateFalse($syllabusReview,$request,$trueOrfalse)
    {
       return $syllabusReview->update([
            'finished' => $trueOrfalse,
            'rate' => $request->rate
        ]);
    }

    public function createSyllabusReview($syllabusReview)
    {
       return SyllabusReview::create([
                'student_lesson_review_id' => $syllabusReview->student_lesson_review_id,
                'from_chapter' => $syllabusReview->from_chapter,
                'to_chapter' => $syllabusReview->to_chapter,
                'from_page' => $syllabusReview->from_page,
                'to_page' => $syllabusReview->to_page,
                'finished' => false
            ]);
    }

    public function finishNewLessonReview($syllabusReview)
    {
        $studentLessonReview = $syllabusReview->studentLessonReview;
        $lesson = $studentLessonReview->studentLesson->lesson;

        $percentage = $lesson->chapters_count > 0 ? (($syllabusReview->to_chapter / $lesson->chapters_count) * 100) : 0;

        return $studentLessonReview->update([
            'last_page_finished' => $syllabusReview->to_page,
            'last_chapter_finished' => $syllabusReview->to_chapter,
            'percentage' => round($percentage, 2),
            'finished' => $syllabusReview->to_chapter == $lesson->chapters_count ? true : false
        ]);
    }
}