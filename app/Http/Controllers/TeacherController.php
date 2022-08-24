<?php

namespace App\Http\Controllers;


use App\Http\Requests\Teacher\StoreTeacherRequest;
use App\Http\Requests\Teacher\UpdateTeacherRequest;
use App\Http\Traits\TeacherTrait;
use App\Models\Teacher;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TeacherController extends Controller
{

    use TeacherTrait;

    public function index()
    {
        $teachers = $this->getTeachersDesc();

        return view('pages.teacher.index', [
            'teachers' => $teachers,
        ]);
    }

    public function show(Teacher $teacher)
    {
        $experiences = $teacher->experiences()->orderBy('date','DESC')->get();
        return view('pages.teacher.show',[
            'teacher' => $teacher,
            'experiences' => $experiences,  
        ]);
    }

    public function create()
    {
        return view('pages.teacher.create');
    }

    public function store(StoreTeacherRequest $request)
    {
        Teacher::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'qualification' => $request->qualification,
           
        ]);
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect(route('admin.teacher.index'));
    }

    public function edit(Teacher $teacher)
    {
        return view('pages.teacher.edit', [
            'teacher'  => $teacher,
        ]);
    }

    public function update(UpdateTeacherRequest $request,Teacher $teacher)
    {

        $teacher->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'qualification' => $request->qualification,
          
        ]);


        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect(route('admin.teacher.index'));
    }

    public function delete(Teacher $teacher)
    {
        $teacher->delete();
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect()->back();
    }
}
