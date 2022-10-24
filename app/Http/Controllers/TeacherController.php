<?php

namespace App\Http\Controllers;

use App\DataTables\TeacherDataTable;
use App\Http\Requests\Teacher\StoreTeacherRequest;
use App\Http\Requests\Teacher\UpdateTeacherRequest;
use App\Http\Traits\TeacherTrait;
use App\Models\Teacher;
use RealRashid\SweetAlert\Facades\Alert;

class TeacherController extends Controller
{

    use TeacherTrait;
    // use GroupTrait;

    public function index(TeacherDataTable $teacherDataTable)
    {
        return $teacherDataTable->render('pages.teacher.index');
    }

    public function show(Teacher $teacher)
    {
        $teacher->load(['groups','experiences']);
        
        $experiences = $teacher->experiences;
        $groups = $teacher->groups->sortByDesc('id');
        $countGroups = $teacher->groups->count();

        return view('pages.teacher.show', [
            'teacher' => $teacher,
            'experiences' => $experiences,
            'groups' => $groups,
            'countGroups' => $countGroups,
        ]);
    }

    public function store(StoreTeacherRequest $request)
    {
        Teacher::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'qualification' => $request->qualification,
        ]);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $teacher->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'qualification' => $request->qualification,
        ]);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function delete(Teacher $teacher)
    {
        $teacher->delete();
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }
}