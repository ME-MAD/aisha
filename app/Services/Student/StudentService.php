<?php

namespace App\Services\Student;

use App\Http\Traits\ImageTrait;
use App\Models\Student;

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

    public function getStudentWithGroupStudents($student)
    {
        $student->load([
            'groupStudents' => function ($q) {
                $q->with('group.studentLessons');
            }
        ]);
    }

    public function deleteStudent($student): void
    {
        $this->deleteImage(path: $student->getAvatarPath());
        $student->delete();
    }
}