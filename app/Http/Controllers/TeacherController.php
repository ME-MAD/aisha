<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Teacher;
use App\Http\Traits\ImageTrait;
use App\DataTables\TeacherDataTable;
use App\Services\Teacher\TeacherService;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Teacher\StoreTeacherRequest;
use App\Http\Requests\Teacher\UpdateTeacherRequest;

class TeacherController extends Controller
{


    // use GroupTrait;

    private $teacherDataTable;
    private $teacherService;

    public function __construct(
        TeacherDataTable $teacherDataTable,
        TeacherService $teacherService,
    ) {
        $this->teacherDataTable = $teacherDataTable;
        $this->teacherService = $teacherService;
    }

    public function index()
    {
        return $this->teacherDataTable->render('pages.teacher.index');
    }

    public function show(Teacher $teacher)
    {

        return view('pages.teacher.show', [
            'teacher'      => $teacher,
            'experiences'  => $this->teacherService->teacherExperiences($teacher),
            'groups'       => $this->teacherService->groups($teacher),
            'countGroups'  => $this->teacherService->countGroups($teacher),
            'countStudent' => $this->teacherService->countStudent($teacher)
        ]);
    }

    public function getTeacherShowDataAjax(Teacher $teacher)
    {
        $experiences  = $this->teacherService->teacherExperiences($teacher);


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
                    'name'  => 'Groups Count',
                    'value' => $this->teacherService->countGroups($teacher)
                ],
                [
                    'name'  => 'Student Count',
                    'value' =>  $this->teacherService->countStudent($teacher)
                ],
                [
                    'name'  => 'Total Experience',
                    'value' => $years . " Years"
                ],
            ],
            'teacher'     => $teacher,
            'experiences' => $this->teacherService->teacherExperiences($teacher),
            'groups'      => $this->teacherService->groups($teacher),
        ]);
    }

    public function store(StoreTeacherRequest $request)
    {
        $this->teacherService->createTeacher($request);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $this->teacherService->updateTeacher($teacher, $request);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function delete(Teacher $teacher)
    {
        $this->teacherService->deleteTeacher($teacher);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }
}
