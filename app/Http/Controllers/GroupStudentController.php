<?php

namespace App\Http\Controllers;

use App\DataTables\GroupStudentDataTable;
use App\Models\GroupStudent;
use App\Http\Requests\GroupStudent\StoreGroupStudentRequest;
use App\Http\Requests\GroupStudent\UpdateGroupStudentRequest;
use App\Http\Traits\GroupStudentTrait;
use App\Http\Traits\GroupTrait;
use App\Http\Traits\StudentTrait;
use App\Models\Group;
use App\Models\Student;
use RealRashid\SweetAlert\Facades\Alert;

class GroupStudentController extends Controller
{
    use GroupStudentTrait;
    use StudentTrait;
    use GroupTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GroupStudentDataTable $GroupStudentDataTable)
    {
        return $GroupStudentDataTable->render('pages.GroupStudent.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::get();
        $groups = Group::get();
         return view('pages.GroupStudent.create', [
             'students' => $students,
             'groups' => $groups,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGroupStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupStudentRequest $request)
    {
        GroupStudent::create([
            'student_id' => $request->student_id,
            'group_id' => $request->group_id,
        ]);
      
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect(route('admin.group_students.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GroupStudent  $groupStudent
     * @return \Illuminate\Http\Response
     */
    public function show(GroupStudent $groupStudent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GroupStudent  $groupStudent
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupStudent $groupStudent)
    {
        $student = $this->getStudents();
        $group = Group::get();
        dd($groupStudent);
        return view('pages.groupStudent.edit', [
            'groupStudent'  => $groupStudent,
            'student'  => $student,
            'group'  => $group,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupStudentRequest  $request
     * @param  \App\Models\GroupStudent  $groupStudent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupStudentRequest $request, GroupStudent $groupStudent)
    {
        $groupStudent->update([
           
            'student_id' => $request->student_id,
            'group_id' => $request->group_id,
           
            
        ]);
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect(route('admin.group_students.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GroupStudent  $groupStudent
     * @return \Illuminate\Http\Response
     */
    public function delete(GroupStudent $groupStudent)
    {
         $groupStudent->delete();
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect()->back();
    }
}
