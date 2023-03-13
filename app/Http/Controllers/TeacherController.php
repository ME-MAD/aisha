<?php

namespace App\Http\Controllers;

use App\DataTables\TeacherDataTable;
use App\Http\Requests\Teacher\StoreTeacherRequest;
use App\Http\Requests\Teacher\UpdateTeacherRequest;
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
    ) {
        $this->teacherDataTable = $teacherDataTable;
        $this->teacherService = $teacherService;
        $this->experienceService = $experienceService;
        $this->permissionService = $permissionService;


        $this->permissionService->handlePermissions($this, [
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
        $roles = Role::select(['id', 'name'])->get();

        return view('pages.teacher.show', [
            'teacher' => $teacher,
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

        return response()->json([
            'statistics' => [
                [
                    'name' => trans('group.groups_count'),
                    'value' => $this->teacherService->getCountOfGroups($teacher)
                ],
                [
                    'name' => trans('student.student_count'),
                    'value' => $this->teacherService->getCountOfStudents($teacher)
                ],
            ],
            'teacher' => $teacher,

            'experiences' => $this->teacherService->getTeacherExperiences($teacher),

            'groups' => $this->teacherService->getAllTeacherGroups($teacher),
            'words' => [
                'group' => trans('main.group'),
                'student_count' => trans('student.student_count'),
                'id' => trans('main.id'),
                'name' => trans('main.name'),
                'phone' => trans('main.phone'),
                'add_lesson' => trans('lesson.add_a_lesson'),
                'show_lessons' => trans('lesson.show_lessons'),
                'lesson_starts_from' => trans('lesson.lesson_starts_from'),
                'lesson_ends_to' => trans('lesson.lesson_ends_to'),
                'chapters_count' => trans('lesson.chapters_count'),
                'subject' => trans('main.subject'),
                'user' => trans('main.user'),
                'from_chapter' => trans('lesson.from_chapter'),
                'to_chapter' => trans('lesson.to_chapter'),
                'from_page' => trans('lesson.from_page'),
                'to_page' => trans('lesson.to_page'),
                'choose_lesson' => trans('lesson.choose_lesson'),
                'choose_subject' => trans('subject.choose_subject'),
                'choose_rate' => trans('lesson.choose_rate'),
                'submit' => trans('main.submit'),
                'excellent' => trans('main.excellent'),
                'very_good' => trans('main.very_good'),
                'good' => trans('main.good'),
                'fail' => trans('main.fail'),
            ]
        ]);
    }

    public function getExpereincesDataForChart(Teacher $teacher)
    {
        $data = [];

        foreach ($teacher->experiences as $experience) {
            $data[] = [
                'name' => ellipsis($experience->title, 50),
                'value' => round($this->experienceService->getCountOfExperienceYears([
                    $experience
                ]), 2)
            ];
        }

        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }
}
