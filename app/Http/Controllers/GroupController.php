<?php

namespace App\Http\Controllers;

use App\DataTables\GroupDataTable;
use App\Http\Requests\Group\StoreGroupRequest;
use App\Http\Requests\Group\UpdateGroupRequest;
use App\Http\Traits\GroupStudentTrait;
use App\Models\Group;
use App\Http\Traits\GroupTrait;
use App\Http\Traits\GroupTypeTrait;
use App\Models\Teacher;
use App\Http\Traits\TeacherTrait;
use App\Models\GroupStudent;
use App\Models\GroupType;
use RealRashid\SweetAlert\Facades\Alert;

class GroupController extends Controller
{
    use GroupTrait;
    use TeacherTrait;
    use GroupTypeTrait;
    use GroupStudentTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GroupDataTable $GroupDataTable)
    {
        $teaches = Teacher::get();
        $groupTypes = GroupType::get();
        // $groups = $this->getGroups();

        // return view('pages.group.index', [
        //     'groups' => $groups,
        // ]);
        return $GroupDataTable->render('pages.group.index', [
            'teachers' => $teaches,
            'groupTypes' => $groupTypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teaches = Teacher::get();
        $groupTypes = GroupType::get();
        return view('pages.group.create', [
            'teachers' => $teaches,
            'groupTypes' => $groupTypes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupRequest $request)
    {


        Group::create([
            'from' => $request->from,
            'to' => $request->to,
            'teacher_id' => $request->teacher_id,
            'group_type_id' => $request->group_type_id,
            'age_type' => $request->age_type,
        ]);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect(route('admin.group.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $group->load('groupStudents.student');

        return view('pages.group.show', [
            'group' => $group,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group 
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        $teachers = $this->getTeachers();
        $groupTypes = GroupType::get();
        return view('pages.group.edit', [
            'group'  => $group,
            'teachers'  => $teachers,
            'groupTypes'  => $groupTypes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupRequest  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupRequest $request, Group $group)
    {

        dd($request);
        $group->update([
            'from' => $request->from,
            'to' => $request->to,
            'group_type_id' => $request->group_type_id,
            'teacher_id' => $request->teacher_id,
            'age_type' => $request->age_type,

        ]);
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect(route('admin.group.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function delete(Group $group)
    {
        $group->delete();
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }
}