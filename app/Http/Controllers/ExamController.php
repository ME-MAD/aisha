<?php

namespace App\Http\Controllers;

use App\DataTables\ExamDataTable;
use App\Http\Requests\Exam\StoreExamRequest;
use App\Http\Requests\Exam\UpdateExamRequest;
use App\Http\Traits\AuthTrait;
use App\Models\Exam;
use App\Models\Group;
use App\Models\Lesson;
use App\Models\Student;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use RealRashid\SweetAlert\Facades\Alert;

class ExamController extends Controller
{
    use  AuthTrait;

    public function __construct()
    {
        $this->handlePermissions([
            'index' => 'index-exam',
            'store' => 'store-exam',
            'update' => 'update-exam',
            'delete' => 'delete-exam',
        ]);
    }

    public function index(ExamDataTable $examDataTable)
    {
        return $examDataTable->render('pages.exam.index');
    }

    public function create()
    {
        $students = Student::select(['id', 'name'])->get();
        $groups = Group::select(['id', 'from', 'to'])->get();
        $lessons = Lesson::select(['id', 'title'])->get();

        return view('pages.exam.create', [
            'students' => $students,
            'groups' => $groups,
            'lessons' => $lessons,
        ]);
    }

    public function store(StoreExamRequest $request): Redirector|Application|RedirectResponse
    {
        Exam::create([
            'student_id' => $request->student_id,
            'group_id' => $request->group_id,
            'lesson_from' => $request->lesson_from,
            'lesson_to' => $request->lesson_to,
        ]);

        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect(route('admin.exam.index'));
    }


    public function edit(Exam $exam)
    {
        $students = Student::select(['id', 'name'])->get();
        $groups = Group::select(['id', 'from', 'to'])->get();
        $lessons = Lesson::select(['id', 'title'])->get();

        return view('pages.exam.edit', [
            'exam' => $exam,
            'students' => $students,
            'groups' => $groups,
            'lessons' => $lessons,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateExamRequest $request
     * @param Exam $exam
     * @return Response
     */
    public function update(UpdateExamRequest $request, Exam $exam)
    {
        $exam->update([
            'student_id' => $request->student_id,
            'group_id' => $request->group_id,
            'lesson_from' => $request->lesson_from,
            'lesson_to' => $request->lesson_to,

        ]);
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect(route('admin.exam.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Exam $exam
     * @return Response
     */
    public function delete(Exam $exam)
    {
        $exam->delete();
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect()->back();
    }
}
