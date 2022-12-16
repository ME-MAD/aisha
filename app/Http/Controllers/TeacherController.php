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
use App\Services\Experience\ExperienceService;

class TeacherController extends Controller
{


    // use GroupTrait;

    private $teacherDataTable;
    private $teacherService;
    private $experienceService;

    public function __construct(
        TeacherDataTable $teacherDataTable,
        TeacherService $teacherService,
        ExperienceService $experienceService
    ) {
        $this->teacherDataTable = $teacherDataTable;
        $this->teacherService = $teacherService;
        $this->experienceService = $experienceService;
    }

    public function index()
    {
        return $this->teacherDataTable->render('pages.teacher.index');
    }

    public function show(Teacher $teacher)
    {
        $this->teacherService->setTeacherWithAllData($teacher);

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
        $this->teacherService->setTeacherWithAllData($teacher);

        $experiences  = $this->teacherService->teacherExperiences($teacher);
        $yearsOfExperience = $this->experienceService->getCountOfExperienceYears($experiences);

        return response()->json([
            'statistics' => [
                [
                    'name'  => __('teacher.group count'),
                    'value' => $this->teacherService->countGroups($teacher)
                ],
                [
                    'name'  =>  __('teacher.student count'),
                    'value' =>  $this->teacherService->countStudent($teacher)
                ],
                [
                    'name'  => __('teacher.total experience years'),
                    'value' => $yearsOfExperience . " Years"
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