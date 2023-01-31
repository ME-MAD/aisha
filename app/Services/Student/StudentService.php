<?php

namespace App\Services\Student;

use App\Models\Student;
use App\Services\ImageService;
use Illuminate\Support\Facades\Hash;

class StudentService
{
    private $imageService;

    public function __construct(
        ImageService $imageService
    )
    {
        $this->imageService = $imageService;
    }

    public function getAllStudent()
    {
        return Student::get();
    }

    public function createStudent($request): void
    {
        $fileName = $this->imageService->uploadImage(
            imageObject: $request->file('avatar'),
            path: Student::AVATARS_PATH
        );

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
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

            $this->imageService->deleteImage(
                path: $student->getAvatarPath()
            );
            $fileName = $this->imageService->uploadImage(
                imageObject: $request->file('avatar'),
                path: Student::AVATARS_PATH
            );
        }
        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $student->password,
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
        $this->imageService->deleteImage(path: $student->getAvatarPath());
        $student->delete();
    }
}