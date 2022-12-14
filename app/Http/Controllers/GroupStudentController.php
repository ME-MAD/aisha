<?php

namespace App\Http\Controllers;

use App\DataTables\GroupStudentDataTable;
use App\Models\GroupStudent;
use App\Http\Requests\GroupStudent\StoreGroupStudentRequest;
use App\Http\Requests\GroupStudent\UpdateGroupStudentRequest;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\VarDumper\Cloner\Stub;

class GroupStudentController extends Controller
{
    public function index(GroupStudentDataTable $GroupStudentDataTable)
    {
        $groups = Group::get();
        $students = Student::get();
        return $GroupStudentDataTable->render('pages.groupStudent.index', [
            'groups' => $groups,
            'students' => $students,
        ]);
    }

    public function create()
    {
        
    }

    public function store(StoreGroupStudentRequest $request)
    {
        GroupStudent::create([
            'student_id' => $request->student_id,
            'group_id' => $request->group_id,
        ]);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function show(GroupStudent $groupStudent)
    {
        //
    }

    public function edit(GroupStudent $groupStudent)
    {
        
    }

    public function update(UpdateGroupStudentRequest $request, GroupStudent $groupStudent)
    {
        
    }

    public function delete(GroupStudent $groupStudent)
    {
        $groupStudent->delete();
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function getStudentsOfGroup(Request $request)
    {
        $groupStudents = GroupStudent::where('group_id', $request->group_id)->select(['group_id', 'student_id'])->get();

        return response()->json([
            'groupStudents' => $groupStudents
        ]);
    }
}