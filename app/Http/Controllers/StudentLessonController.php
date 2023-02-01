<?php

namespace App\Http\Controllers;

use App\Models\StudentLesson;
use App\Http\Requests\StudentLesson\StoreStudentLessonRequest;
use App\Services\StudentLesson\StudentLessonService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StudentLessonController extends Controller
{

    private $studentLessonService;

    public function __construct(StudentLessonService $studentLessonService)
    {
        $this->studentLessonService = $studentLessonService;
    }

    public function store(StoreStudentLessonRequest $request)
    {
        if ($this->studentLessonService->isChapterFinished($request))
        {
           $this->studentLessonService->finishStudentLesson($request);
        }
        else
        {
            $this->studentLessonService->store($request);
        }

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function ajaxStudentLessonFinished(Request $request)
    {
        if ($request->finished == "true")
        {
            $this->studentLessonService->finishStudentLesson($request);
        }
        else
        {
            $this->studentLessonService->unFinishStudentLesson($request);
        }

        return response()->json([
            'status' => 200
        ]);
    }

    public function show(StudentLesson $studentLesson): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $studentLessonReview = $this->studentLessonService->getStudentLessonReview($studentLesson);

        return view('pages.studentLesson.show', [
            'studentLesson' => $studentLesson,
            'studentLessonReview' => $studentLessonReview
        ]);
    }



}
