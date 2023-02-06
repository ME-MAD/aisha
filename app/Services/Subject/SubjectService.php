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

    public function createSubject($request,$book_name,$fileName)
    {
        return  Subject::create([
                'name' => $request->name,
                'book' => $book_name,
                'avatar' => $fileName,
               ]);
    }

    public function updateSubject($subject,$request,$book_name,$fileName)
    {
        return   $subject->update([
            'name' => $request->name,
            'book' => $book_name,
            'avatar' => $fileName,
        ]);
    }
}