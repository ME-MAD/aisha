<?php

namespace App\Http\Controllers;

use App\DataTables\StudentDataTable;
use App\Http\Traits\GroupTrait;
use App\Http\Traits\StudentTrait;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\Student\StoreStudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Models\Subject;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
    use GroupTrait;
    use StudentTrait;

    public function index(StudentDataTable $studentDataTable)
    {
        return $studentDataTable->render('pages.student.index');
    }

    public function create()
    {
        //
    }

    public function store(StoreStudentRequest $request)
    {
        Student::create([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'qualification' => $request->qualification,

        ]);
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function show(Student $student)
    {
        $subjects = Subject::with('lessons')->get();
        $student->load([
            'groupStudents' => function ($q) {
                $q->with('group.studentLessons');
            }
        ]);
        return view('pages.student.show', [
            'student' => $student,
            'subjects' => $subjects,
        ]);
    }

    public function edit(Student $student)
    {
        //
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'qualification' => $request->qualification,

        ]);
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function delete(Request $request, Student $student)
    {
        $student->delete();

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }
}