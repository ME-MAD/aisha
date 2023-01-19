<?php

namespace App\Http\Controllers;

use App\Models\StudentLesson;
use App\Models\StudentLessonReview;
use App\Http\Requests\StudentLesson\StudentLessonReviewRequest;
use App\Services\StudentLesson\StudentLessonService;
use App\Services\StudentLessonReview\StudentLessonReviewService;

class StudentLessonReviewController extends Controller
{

    public $studentLessonReviewService;
    public $studentLessonService;

    public function __construct(StudentLessonReviewService $studentLessonReviewService, StudentLessonService $studentLessonService)
    {
        $this->studentLessonReviewService = $studentLessonReviewService;
        $this->studentLessonService = $studentLessonService;
    }


    public function ajaxStudentLessonFinishedReview(StudentLessonReviewRequest $request)
    {
        $studentLesson = $this->studentLessonService->firstOrCreateStudentLesson($request);

        $data = $request->all();
        $data['student_lesson_id'] = $studentLesson->id;

        if ($request->finished == "true") 
        {
            $this->studentLessonReviewService->finished((object) $data);
        } 
        else
        {
            $this->studentLessonReviewService->notFinished((object) $data);
        }

        return response()->json([
            'status' => 200
        ]);
    }
}
