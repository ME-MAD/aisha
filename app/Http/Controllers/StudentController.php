<?php

namespace App\Http\Controllers;

use App\DataTables\StudentDataTable;
use App\Http\Traits\GroupTrait;
use App\Http\Traits\StudentTrait;
use App\Models\Student;
use Illuminate\Http\Request;
use App\http\requests\Student\StoreStudentRequest;
use App\http\requests\Student\UpdateStudentRequest;

use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{

    use GroupTrait;
    use StudentTrait;

    public function index(StudentDataTable $studentDataTable)
    {
        return $studentDataTable->render('pages.student.index');
        // $students  = $this->getStudentsDesc();

        // return view('admin.pages.student.index', [
        //     'students' => $students,
        // ]);
    }

    public function create()
    {
       
        return view('pages.student.create');
    }

    public function store(StoreStudentRequest $request)
    {
       // dd($request);
        Student::create([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'qualification' => $request->qualification,
            
        ]);
    // dd($request->qualification);
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect(route('admin.student.index'));
    }

    public function edit(Student $student)
    {
       
        
        return view('pages.student.edit', [
            
            'student' => $student
        ]);
    }

    public function update(UpdateStudentRequest $request ,Student $student)
    {
        $student->update([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'qualification' => $request->qualification,
           
        ]);

        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect(route('admin.student.index'));
    }

    public function delete(Request $request ,Student $student)
    {
        $student->delete();

        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect()->back();
    }
}
