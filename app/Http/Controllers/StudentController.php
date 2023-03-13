<?php

namespace App\Http\Controllers;

use App\DataTables\StudentDataTable;
use App\Http\Requests\Student\StoreStudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Http\Traits\AuthTrait;
use App\Models\Role;
use App\Models\Student;
use App\Services\Permission\PermissionService;
use App\Services\Student\StudentService;
use App\Services\Subject\SubjectService;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
    private StudentService $studentService;
    private SubjectService $subjectService;
    private PermissionService $permissionService;

    public function __construct(
        StudentService $studentService,
        SubjectService $subjectService,
        PermissionService $permissionService
    ) {
        $this->studentService = $studentService;
        $this->subjectService = $subjectService;
        $this->permissionService = $permissionService;

        $this->permissionService->handlePermissions($this, [
            'index' => 'index-student',
            'store' => 'store-student',
            'update' => 'update-student',
            'delete' => 'delete-student',
            'show' => 'show-student',
        ]);
    }

    public function index(StudentDataTable $studentDataTable)
    {
        $roles = Role::select(['id', 'name', 'display_name', 'description'])->get();

        return $studentDataTable->render('pages.student.index', [
            'roles' => $roles,
        ]);
    }

    public function store(StoreStudentRequest $request): RedirectResponse
    {
        $this->studentService->createStudent($request);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function show(Student $student)
    {
        $roles = Role::select(['id', 'name'])->get();

        return view('pages.student.show', [
            'student' => $student->load('role:id,name'),
            'roles' => $roles
        ]);
    }

    public function update(UpdateStudentRequest $request, Student $student): RedirectResponse
    {
        $this->studentService->updateStudent($request, $student);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function delete(Student $student): RedirectResponse
    {
        $this->studentService->deleteStudent($student);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function getGroupStudents(Student $student)
    {
        $subjects = $this->subjectService->getSubjectsWithLessonsWithReviewsOfStudent($student);

        return response()->json([
            'groupStudents' => $student->groupStudents->load(['group.groupDays']),
            'subjects' => $subjects,
            'words' => [
                'day' => trans('main.day'),
                'from' => trans('main.from'),
                'to' => trans('main.to'),
                'lessons_count' => trans('lesson.lessons_count'),
                'go_to_review' => trans('lesson.go_to_review'),
                'lesson_starts_from' => trans('lesson.lesson_starts_from'),
                'lesson_ends_to' => trans('lesson.lesson_ends_to'),
                'show_more' => trans('lesson.show_more'),
                'last_page_finished' => trans('lesson.last_page_finished'),
                'next_lesson_is_from_chapter' => trans('lesson.next_lesson_is_from_chapter'),
                'to_chapter' => trans('lesson.to_chapter'),
                'next_lesson_is_from_page' => trans('lesson.next_lesson_is_from_page'),
                'from_page' => trans('lesson.from_page'),
                'to_page' => trans('lesson.to_page'),
                'excellent' => trans('main.excellent'),
                'very_good' => trans('main.very_good'),
                'good' => trans('main.good'),
                'fail' => trans('main.fail'),
                'add_a_lesson' => trans('lesson.add_a_lesson'),
                'finished' => trans('main.finished'),
                'go_to_lesson' => trans('lesson.go_to_lesson'),
            ]
        ]);
    }
}
