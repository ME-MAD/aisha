<?php

namespace App\Services\Student;

use App\Http\Traits\ImageTrait;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class StudentService
{
    use ImageTrait;

    public function getAllStudent()
    {
        return Student::get();
    }

    public function createStudent($request): void
    {
        $fileName = $this->uploadImage(
            imageObject: $request->file('avatar'),
            path: Student::AVATARS_PATH
        );

        Student::create([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'qualification' => $request->qualification,
            'avatar' => $fileName,

        ]);
    }

    public function updateStudent($request, $student): void
    {
        $fileName = $student->getRawOriginal('avatar');
        if ($request->file('avatar')) {

            $this->deleteImage(
                path: $student->getAvatarPath()
            );
            $fileName = $this->uploadImage(
                imageObject: $request->file('avatar'),
                path: Student::AVATARS_PATH
            );
        }
        $student->update([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'qualification' => $request->qualification,
            'avatar' => $fileName,

        ]);
    }

    public function showStudent($student): Factory|View|Application
    {
        $subjects = Subject::with('lessons')->get();

        $student->load([
            'groupStudents' => function ($q) {
                $q->with('group.studentLessons');
            }
        ]);

        return view('pages.student.show', [
            'student' => $student,
            'subjects' => $subjects,
        ]);
    }

    public function deleteStudent($student): void
    {

        $this->deleteImage(path: $student->getAvatarPath());
        $student->delete();
    }

    public function getGroupStudent($student): JsonResponse
    {
        $subjects = Subject::with([
            'lessons.studentLessons.syllabus',
            'lessons.studentLessons.studentLessonReview.syllabusReviews',
        ])->get();

        return response()->json([
            'groupStudents' => $student->groupStudents->load(['group.groupDays']),
            'subjects' => $subjects,
        ]);
    }
}