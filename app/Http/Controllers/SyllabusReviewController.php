<?php

namespace App\Http\Controllers;

use App\Http\Requests\SyllabusReview\CreateNewLessonReviewRequest;
use App\Models\StudentLesson;
use App\Models\StudentLessonReview;
use App\Models\SyllabusReview;
use App\Services\Syllabus\SyllabusReviewService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SyllabusReviewController extends Controller
{
    private SyllabusReviewService   $syllabusReviewService;

    public function __construct(
        SyllabusReviewService $syllabusReviewService
    )
    {
        $this->syllabusReviewService = $syllabusReviewService;
    }

    public function createNewLessonAjax(CreateNewLessonReviewRequest $request)
    {
        $syllabusReview = DB::transaction(function () use ($request) {
            // $studentLesson = StudentLesson::firstOrCreate([
            //     'group_id' => $request->group_id,
            //     'lesson_id' => $request->lesson_id,
            //     'student_id' => $request->student_id
            // ], [

            // ]);
            $studentLesson = $this->syllabusReviewService->firstOrCreateStudentLesson($request);


            // $studentLessonReview = StudentLessonReview::firstOrCreate([
            //     'student_lesson_id' => $studentLesson->id
            // ], [

            // ]);
            $studentLessonReview = $this->syllabusReviewService->firstOrCreateStudentLessonReview($studentLesson->id);

            // return SyllabusReview::create([
            //     'student_lesson_review_id' => $studentLessonReview->id,
            //     'from_chapter' => $request->from_chapter,
            //     'to_chapter' => $request->to_chapter,
            //     'from_page' => $request->from_page,
            //     'to_page' => $request->to_page,
            //     'finished' => false,
            //     'rate' => null,
            // ]);
            return $this->syllabusReviewService->createSyllabusReview($request,$studentLessonReview->id);

        });

        return response()->json([
            'status' => 200,
            'syllabusReview' => $syllabusReview
        ]);
    }

    public function finishNewLessonReviewAjax(Request $request, SyllabusReview $syllabusReview)
    {
        // if($syllabusReview->finished == true)
        // {
        //     return response()->json([
        //         'status' => 400,
        //     ]);
        // }

        if ($request->rate == "fail") {
            // $syllabusReview->update([
            //     'finished' => false,
            //     'rate' => $request->rate
            // ]);
            $this->syllabusReviewService->updateSyllabusReviewIfRateFalse($syllabusReview,$request,false);
            
            // SyllabusReview::create([
            //     'student_lesson_review_id' => $syllabusReview->student_lesson_review_id,
            //     'from_chapter' => $syllabusReview->from_chapter,
            //     'to_chapter' => $syllabusReview->to_chapter,
            //     'from_page' => $syllabusReview->from_page,
            //     'to_page' => $syllabusReview->to_page,
            //     'finished' => false
            // ]);
            $this->syllabusReviewService->createSyllabusReview($syllabusReview);

        } else {
            // $syllabusReview->update([
            //     'finished' => true,
            //     'rate' => $request->rate
            // ]);
            $this->syllabusReviewService->updateSyllabusReviewIfRateFalse($syllabusReview,$request,true);
        }

        // $studentLessonReview = $syllabusReview->studentLessonReview;
        // $lesson = $studentLessonReview->studentLesson->lesson;

        // $percentage = $lesson->chapters_count > 0 ? (($syllabusReview->to_chapter / $lesson->chapters_count) * 100) : 0;

        // $studentLessonReview->update([
        //     'last_page_finished' => $syllabusReview->to_page,
        //     'last_chapter_finished' => $syllabusReview->to_chapter,
        //     'percentage' => round($percentage, 2),
        //     'finished' => $syllabusReview->to_chapter == $lesson->chapters_count ? true : false
        // ]);

        $studentLessonReview = $this->syllabusReviewService->finishNewLessonReview($syllabusReview);

        return response()->json([
            'status' => 200,
            'studentLessonReview' => $studentLessonReview,
            'syllabusReview' => $syllabusReview
        ]);
    }
}
