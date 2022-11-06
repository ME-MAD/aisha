<?php

namespace App\Http\Controllers;

use App\DataTables\TeacherDataTable;
use App\Http\Requests\Teacher\StoreTeacherRequest;
use App\Http\Requests\Teacher\UpdateTeacherRequest;
use App\Http\Traits\TeacherTrait;
use App\Models\Group;
use App\Models\GroupStudent;
use App\Models\Student;
use App\Models\Teacher;
use DateTime;
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
        $teacher->load([
            'groupStudents',
            'groups.groupDays',
            'groups.groupType',
            'groups.students',
            'experiences'
        ]);

        $experiences = $teacher->experiences;
        $countGroups = $teacher->groups->count();
        $countStudent = $teacher->groupStudents->count();
        $groups = $teacher->groups;

        return view('pages.teacher.show', [
            'teacher' => $teacher,
            'experiences' => $experiences,
            'groups' => $groups,
            'countGroups' => $countGroups,
            'countStudent' => $countStudent
        ]);
    }

    public function getTeacherShowDataAjax(Teacher $teacher)
    {
        $teacher->load([
            'groupStudents',
            'groups.groupDays',
            'groups.groupType',
            'groups.students',
            'experiences'
        ]);

        $experiences = $teacher->experiences;
        $countGroups = $teacher->groups->count();
        $countStudent = $teacher->groupStudents->count();
        $groups = $teacher->groups;

        $years = 0;
        $months = 0;
        $days = 0;
        foreach ($experiences as $experience) {
            $from = new DateTime($experience->from);
            $to = new DateTime($experience->to);
            $years += $from->diff($to)->y;
            $months += $from->diff($to)->m;
            $days += $from->diff($to)->d;
        }

        while ($days > 30) {
            $months += 1;
            $days -= 30;
        }
        while ($months > 11) {
            $months -= 12;
            $years += 1;
        }


        return response()->json([
            'statistics' => [
                [
                    'name' => 'Groups Count',
                    'value' => $countGroups
                ],
                [
                    'name' => 'Student Count',
                    'value' => $countStudent
                ],
                [
                    'name' => 'Total Experience',
                    'value' => $years . " Years"
                ],
            ],
            'teacher' => $teacher,
            'experiences' => $experiences,
            'groups' => $groups,
        ]);
    }

    public function store(StoreTeacherRequest $request)
    {
        if ($image = $request->file('avatar')) {
            $fileName = now()->timestamp . "_" . $image->getClientOriginalName();
            $image->move(Teacher::AVATARS_PATH, $fileName);
        }

        Teacher::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'qualification' => $request->qualification,
            'avatar' => $fileName ?? null,
        ]);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $fileName = $teacher->getRawOriginal('avatar');

        if ($image = $request->file('avatar')) {
            if($fileName && file_exists($teacher->getAvatarPath()))
            {
                unlink($teacher->getAvatarPath());
            }
            $fileName = now()->timestamp . "_" . $image->getClientOriginalName();
            $image->move(Teacher::AVATARS_PATH, $fileName);
        }

        $teacher->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'qualification' => $request->qualification,
            'avatar' => $fileName,
        ]);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function delete(Teacher $teacher)
    {
        if($teacher->getRawOriginal('avatar') && file_exists($teacher->getAvatarPath()))
        {
            unlink($teacher->getAvatarPath());
        }

        $teacher->delete();
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }
}