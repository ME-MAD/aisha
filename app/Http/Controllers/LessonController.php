<?php

namespace App\Http\Controllers;

use App\DataTables\LessonsDataTable;
use App\Models\Lesson;
use App\Http\Requests\Lesson\StoreLessonRequest;
use App\Http\Requests\Lesson\UpdateLessonRequest;
use App\Http\Traits\LessonTrait;
use App\Http\Traits\SubjectTrait;
use Exception;
use Illuminate\Http\Request;
use FaizShukri\Quran\Quran;
use RealRashid\SweetAlert\Facades\Alert;
use XMLWriter;

class LessonController extends Controller
{
    use LessonTrait;
    use SubjectTrait;

    private $quran;

    public function __construct(Quran $quran)
    {
        $this->quran = $quran;
    }

    public function index(LessonsDataTable $lessonsDataTable)
    {
        return $lessonsDataTable->render('pages.lesson.index');
    }

    public function create()
    {
        $subjects = $this->getSubject();
        return view('pages.lesson.create', [
            "subjects" => $subjects
        ]);
    }

    public function store(StoreLessonRequest $request)
    {
        Lesson::create([
            'subject_id' => $request->subject_id,
            'title' => $request->title,
            'chapters_count' => $request->chapters_count,
        ]);
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect(route('admin.lesson.index'));
    }

    public function show(Lesson $lesson)
    {
        //
    }

    public function edit(Lesson $lesson)
    {
        $subjects = $this->getSubject();
        return view('pages.lesson.edit', [
            "lesson" => $lesson,
            "subjects" => $subjects
        ]);
    }

    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        $lesson->update([
            'subject_id' => $request->subject_id,
            'title' => $request->title,
            'chapters_count' => $request->chapters_count,
        ]);
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect(route('admin.lesson.index'));
    }

    public function delete(Lesson $lesson)
    {
        $lesson->delete();
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect()->back();
    }
}