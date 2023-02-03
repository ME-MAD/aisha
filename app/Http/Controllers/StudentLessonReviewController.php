<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentLesson\StudentLessonReviewRequest;
use App\Http\Traits\AuthTrait;
use App\Services\StudentLesson\StudentLessonService;
use App\Services\StudentLessonReview\StudentLessonReviewService;

class StudentLessonReviewController extends Controller
{
    use AuthTrait;

    public StudentLessonReviewService $studentLessonReviewService;
    public StudentLessonService $studentLessonService;

    public function __construct(StudentLessonReviewService $studentLessonReviewService, StudentLessonService $studentLessonService)
    {
        $this->studentLessonReviewService = $studentLessonReviewService;
        $this->studentLessonService = $studentLessonService;


        $this->handlePermissions([
            'index' => 'index-studentLessonReview',
            'store' => 'store-studentLessonReview',
            'update' => 'update-studentLessonReview',
            'delete' => 'delete-studentLessonReview',
        ]);
    }


    public function ajaxStudentLessonFinishedReview(StudentLessonReviewRequest $request)
    {
        $studentLesson = $this->studentLessonService->firstOrCreateStudentLesson($request);

        $data = $request->all();
        $data['student_lesson_id'] = $studentLesson->id;

        if ($request->finished == "true") {
            $this->studentLessonReviewService->finished((object)$data);
        } else {
            $this->studentLessonReviewService->notFinished((object)$data);
        }

        return response()->json([
            'status' => 200
        ]);
    }
}
