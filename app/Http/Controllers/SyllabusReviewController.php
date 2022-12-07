<?php

namespace App\Http\Controllers;

use App\Models\SyllabusReview;
use Illuminate\Http\Request;

class SyllabusReviewController extends Controller
{
    public function finishNewReviewLessonAjax(Request $request, SyllabusReview $syllabusReview)
    {
        if($syllabusReview->finished == true)
        {
            return response()->json([
                'status' => 400,
            ]);
        }

        $syllabusReview->update([
            'finished' => true,
            'rate' => $request->rate
        ]);

        $studentLessonReview = $syllabusReview->studentLessonReview;
        $lesson = $studentLessonReview->lesson;

        $percentage = $lesson->chapters_count > 0 ? (($syllabusReview->to_chapter / $lesson->chapters_count) * 100) : 0;

        $studentLessonReview->update([
            'last_page_finished' => $syllabusReview->to_page,
            'last_chapter_finished' => $syllabusReview->to_chapter,
            'percentage' => round($percentage, 2),
            'finished' => $syllabusReview->to_chapter == $lesson->chapters_count ? true : false
        ]);

        return response()->json([
            'status' => 200,
            'studentLessonReview' => $studentLessonReview,
            'syllabusReview' => $syllabusReview
        ]);
    }
}
