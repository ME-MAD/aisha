<?php

namespace Tests\Controller;

use Tests\TestCaseWithTransLationsSetUp;
use Tests\Traits\TestGroupStudentTrait;
use Tests\Traits\TestGroupTrait;
use Tests\Traits\TestGroupTypeTrait;
use Tests\Traits\TestLessonTrait;
use Tests\Traits\TestStudentTrait;
use Tests\Traits\TestSubjectTrait;
use Tests\Traits\TestTeacherTrait;

class StudentLessonReviewControllerTest extends TestCaseWithTransLationsSetUp
{
    use TestStudentTrait;
    use TestGroupTrait;
    use TestGroupStudentTrait;
    use TestTeacherTrait;
    use TestGroupTypeTrait;
    use TestLessonTrait;
    use TestSubjectTrait;

    protected function setUp() : void
    {
        parent::setUp();

        $this->refreshApplicationWithLocale('en');
    }

    public function test_ajax_student_lesson_finished_review_passes_with_all_data()
    {
        $groupStudent = $this->generateRandomGroupStudent();
        $lesson = $this->generateRandomLesson();

        $res = $this->call('get',route('admin.student_lesson_review.ajaxStudentLessonFinishedReview'),[
            'chapters_count' => $lesson->chapters_count,
            "finished" => "true",
            "group_id" => $groupStudent->group_id,
            "last_page_finished" => $lesson->to_page,
            "lesson_id" => $lesson->id,
            "student_id" => $groupStudent->student_id
        ]);

        $res->assertJson([
            'status' => 200
        ]);
    }
}