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
        ]);
    }
}
