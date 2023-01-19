<?php

namespace App\Http\Controllers;

use App\Models\StudentLesson;
use App\Models\StudentLessonReview;
use App\Http\Requests\StudentLesson\StudentLessonReviewRequest;
use App\Services\StudentLessonReview\StudentLessonReviewService;

class StudentLessonReviewController extends Controller
{

    public $studentLessonReviewService;

    public function __construct(StudentLessonReviewService $studentLessonReviewService)
    {
        $this->studentLessonReviewService = $studentLessonReviewService;
    }


    public function ajaxStudentLessonFinishedReview(StudentLessonReviewRequest $request)
    {
        $this->studentLessonReviewService->firstOrCreateStudentLesson($request);

        if ($request->finished == "true") {
            $this->studentLessonReviewService->finished($request);
        } else {
            $this->studentLessonReviewService->notFinished($request);
        }

        return response()->json([
            'status' => 200
        ]);
    }
}
