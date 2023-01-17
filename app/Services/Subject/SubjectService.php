<?php
namespace App\Services\Subject;

use App\Models\Subject;

class SubjectService
{
    public function getSubjectsWithLessonsWithReviews()
    {
        return Subject::with([
            'lessons.studentLessons.syllabus',
            'lessons.studentLessons.studentLessonReview.syllabusReviews',
        ])->get();
    }

    public function getSubjectsWtihLessons()
    {
        return Subject::with('lessons')->get();
    }
}