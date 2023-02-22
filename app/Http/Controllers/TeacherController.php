<?php

namespace App\Http\Controllers;

use App\DataTables\TeacherDataTable;
use App\Http\Requests\Teacher\StoreTeacherRequest;
use App\Http\Requests\Teacher\UpdateTeacherRequest;
use App\Http\Traits\AuthTrait;
use App\Models\Role;
use App\Models\Teacher;
use App\Services\Experience\ExperienceService;
use App\Services\Permission\PermissionService;
use App\Services\Teacher\TeacherService;
use Illuminate\Http\JsonResponse;
use RealRashid\SweetAlert\Facades\Alert;

class TeacherController extends Controller
{
    private TeacherDataTable $teacherDataTable;
    private TeacherService $teacherService;
    private ExperienceService $experienceService;
    private PermissionService $permissionService;

    public function __construct(
        TeacherDataTable  $teacherDataTable,
        TeacherService    $teacherService,
        ExperienceService $experienceService,
        PermissionService $permissionService
    )
    {
        $this->teacherDataTable = $teacherDataTable;
        $this->teacherService = $teacherService;
        $this->experienceService = $experienceService;
        $this->permissionService = $permissionService;


        $this->permissionService->handlePermissions($this,[
            'index' => 'index-teacher',
            'store' => 'store-teacher',
            'show' => 'show-teacher',
            'update' => 'update-teacher',
            'delete' => 'delete-teacher',
        ]);
    }

    public function index()
    {
        $roles = Role::select(['id', 'name'])->get();

        return $this->teacherDataTable->render('pages.teacher.index', [
            'roles' => $roles
        ]);
    }

    public function show(Teacher $teacher)
    {
        $this->teacherService->setAllDataAboutTeacher($teacher);

        $roles = Role::select(['id', 'name'])->get();

        return view('pages.teacher.show', [
            'teacher' => $teacher,
            'experiences' => $this->teacherService->getTeacherExperiences($teacher),
            'groups' => $this->teacherService->getAllTeacherGroups($teacher),
            'countGroups' => $this->teacherService->getCountOfGroups($teacher),
            'countStudent' => $this->teacherService->getCountOfStudents($teacher),
            'roles' => $roles
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

    public function getTeacherShowDataAjax(Teacher $teacher): JsonResponse
    {
        $this->teacherService->setAllDataAboutTeacher($teacher);

        $experiences = $this->teacherService->getTeacherExperiences();

        $yearsOfExperience = $this->experienceService->getCountOfExperienceYears($experiences);

        return response()->json([
            'statistics' => [
                [
                    'name' => 'Groups Count',
                    'value' => $this->teacherService->getCountOfGroups($teacher)
                ],
                [
                    'name' => 'Student Count',
                    'value' => $this->teacherService->getCountOfStudents($teacher)
                ],
            ],
            'teacher' => $teacher,

            'experiences' => $this->teacherService->getTeacherExperiences($teacher),

            'groups' => $this->teacherService->getAllTeacherGroups($teacher),
        ]);
    }

    public function getExpereincesDataForChart(Teacher $teacher)
    {
        $data = [];
        
        foreach($teacher->experiences as $experience)
        {
            $data []= [
                'name' => ellipsis($experience->title, 50),
                'value' => round($this->experienceService->getCountOfExperienceYears([
                    $experience
                ]),2)
            ];
        }

        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }
}
