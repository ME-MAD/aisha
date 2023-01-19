<?php

namespace App\Services\StudentLessonReview;

use App\Models\StudentLesson;
use App\Models\StudentLessonReview;

class StudentLessonReviewService
{
    private $student_id;
    private $lesson_id;
    private $group_id;
    public  $studentLesson;


    public function firstOrCreateStudentLesson($request)
    {
        $this->setStudentId($request->student_id);
        $this->setLessonId($request->lesson_id);
        $this->setGroupId($request->group_id);

        $this->studentLesson = StudentLesson::firstOrCreate([
            'group_id'   => $this->group_id,
            'lesson_id'  => $this->lesson_id,
            'student_id' => $this->student_id
        ], []);

        return $this->studentLesson;
    }

    public function finished($request)
    {
        $this->setStudentId($request->student_id);
        $this->setLessonId($request->lesson_id);
        $this->setGroupId($request->group_id);

        StudentLessonReview::updateOrCreate([
            'student_lesson_id'     => $this->studentLesson->id
        ], [
            'finished'              => true,
            'percentage'            => 100,
            'last_chapter_finished' => $request->chapters_count,
            'last_page_finished'    => $request->last_page_finished,
        ]);
    }


    public function notFinished($request)
    {
        $this->setStudentId($request->student_id);
        $this->setLessonId($request->lesson_id);
        $this->setGroupId($request->group_id);

        StudentLessonReview::updateOrCreate([
            'student_lesson_id'     => $this->studentLesson->id
        ], [
            'finished' => false,
        ]);
    }


    private function setStudentId(int $student_id): void
    {
        $this->student_id = $student_id;
    }

    private function setLessonId(int $lesson_id): void
    {
        $this->lesson_id = $lesson_id;
    }

    private function setGroupId(int $group_id): void
    {
        $this->group_id = $group_id;
    }
}
