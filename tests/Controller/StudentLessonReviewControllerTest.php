<?php

namespace Tests\Controller;

use App\Services\StudentLesson\StudentLessonService;
use App\Services\StudentLessonReview\StudentLessonReviewService;
use Mockery\MockInterface;
use Tests\TestCaseWithTransLationsSetUp;
use Tests\Traits\TestGroupStudentTrait;
use Tests\Traits\TestGroupTrait;
use Tests\Traits\TestGroupTypeTrait;
use Tests\Traits\TestLessonTrait;
use Tests\Traits\TestStudentLessonTrait;
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
    use TestStudentLessonTrait;

    protected function setUp() : void
    {
        parent::setUp();

        $this->refreshApplicationWithLocale('en');
    }

    public function test_ajax_student_lesson_finished_review_passes_if_lesson_is_finished()
    {
        $groupStudent = $this->generateRandomGroupStudent();
        $lesson = $this->generateRandomLesson();
        $studentLesson = $this->generateRandomStudentLesson();

        $this->mock(StudentLessonService::class, function (MockInterface $mock) use($studentLesson) {
            $mock->shouldReceive('firstOrCreateStudentLesson')->once()->andReturn($studentLesson);
        });

        $this->mock(StudentLessonReviewService::class, function (MockInterface $mock) {
            $mock->shouldReceive('finished')->once();
        });

        $res = $this->call('post',route('admin.student_lesson_review.ajaxStudentLessonFinishedReview'),[
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
    
    public function test_ajax_student_lesson_finished_review_passes_if_lesson_is_not_finished()
    {
        $groupStudent = $this->generateRandomGroupStudent();
        $lesson = $this->generateRandomLesson();
        $studentLesson = $this->generateRandomStudentLesson();

        $this->mock(StudentLessonService::class, function (MockInterface $mock) use ($studentLesson) {
            $mock->shouldReceive('firstOrCreateStudentLesson')->once()->andReturn($studentLesson);
        });

        $this->mock(StudentLessonReviewService::class, function (MockInterface $mock) {
            $mock->shouldReceive('notFinished')->once();
        });

        $res = $this->call('post',route('admin.student_lesson_review.ajaxStudentLessonFinishedReview'),[
            'chapters_count' => $lesson->chapters_count,
            "finished" => "false",
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