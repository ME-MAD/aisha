<?php

namespace App\Http\Controllers;

use App\DataTables\StudentDataTable;
use App\Http\Requests\Student\StoreStudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Http\Traits\ImageTrait;
use App\Models\Student;
use App\Models\Subject;
use App\Services\Student\StudentService;
use App\Services\Subject\SubjectService;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
    use ImageTrait;

    private $studentService;
    private $subjectService;

    public function __construct(StudentService $studentService, SubjectService $subjectService)
    {
        $this->studentService = $studentService;
        $this->subjectService = $subjectService;
    }

    public function index(StudentDataTable $studentDataTable)
    {
        return $studentDataTable->render('pages.student.index');
    }

    public function store(StoreStudentRequest $request): RedirectResponse
    {

        $this->studentService->createStudent($request);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function show(Student $student)
    {
        $subjects = $this->subjectService->getSubjectsWtihLessons();

        $this->studentService->getStudentWithGroupStudents($student);

        return view('pages.student.show', [
            'student' => $student,
            'subjects' => $subjects,
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
        $subjects = $this->subjectService->getSubjectsWithLessonsWithReviews();
         
        return response()->json([
            'groupStudents' => $student->groupStudents->load(['group.groupDays']),
            'subjects' => $subjects,
        ]);
    }
}