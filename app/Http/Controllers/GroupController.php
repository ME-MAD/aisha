<?php

namespace App\Http\Controllers;

use App\Http\Requests\Group\StoreGroupRequest;
use App\Models\Group;
use App\Http\Traits\GroupTrait;
use App\Models\Teacher;
use App\Http\Traits\TeacherTrait;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GroupController extends Controller
{
    use GroupTrait;
    use TeacherTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = $this->getGroupsDesc();
        
        return view('pages.group.index', [
            'groups' => $groups,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( )
    {
        $teaches = Teacher::get();
       
        return view('pages.group.create', [
            'teachers' => $teaches,
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
            'age_type' => $request->age_type,
            'note' => $request->note,
        ]);
      
        Alert::success('نجاح', 'تمت العملية بنجاح');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        $teachers = $this->getTeachers();
        return view('pages.group.edit', [
            'group'  => $group,
            'teachers'  => $teachers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupRequest  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $group->update([
            'from' => $request->from,
            'to' => $request->to,
            'teacher_id' => $request->teacher_id,
            'age_type' => $request->age_type,
            'note' => $request->note,
        ]);
        Alert::success('نجاح', 'تمت العملية بنجاح');
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
        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect()->back();
    }
}
