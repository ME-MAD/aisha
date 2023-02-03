<?php

namespace App\Services\Teacher;

use App\Models\Teacher;
use App\Services\ImageService;
use Illuminate\Support\Facades\Hash;

class TeacherService
{
    private $imageService;
    private $allDataAboutTeacher;

    public function __construct(
        ImageService $imageService
    )
    {
        $this->imageService = $imageService;
    }



    public function getAllTeachers(array $columns = ['id', 'name'])
    {
        return Teacher::select($columns)->get();
    }


    public function setAllDataAboutTeacher(Teacher $teacher)
    {
        $this->allDataAboutTeacher = $teacher->load([
            'groupStudents',
            'groups.groupDays',
            'groups.groupType',
            'groups.students',
            'experiences'
        ]);
    }

    public function getTeacherExperiences()
    {
        return $this->allDataAboutTeacher->experiences;
    }

    public function getCountOfGroups()
    {
        return $this->allDataAboutTeacher->groups->count();
    }

    public function getCountOfStudents()
    {
        return $this->allDataAboutTeacher->groupStudents->count();
    }

    public function getAllTeacherGroups()
    {
        return $this->allDataAboutTeacher->groups;
    }

    public function createTeacher(object $request)
    {
        $fileName = $this->imageService->uploadImage(imageObject: $request->file('avatar'), path: Teacher::AVATARS_PATH);

        return Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'qualification' => $request->qualification,
            'avatar' => $fileName,
        ]);
    }

    public function updateTeacher(Teacher $teacher, object $request): bool
    {
        $fileName = $teacher->getRawOriginal('avatar');

        if ($request->file('avatar')) {
            $this->imageService->deleteImage(path: $teacher->getAvatarPath());

            $fileName = $this->imageService->uploadImage(
                imageObject: $request->file('avatar'),
                path: Teacher::AVATARS_PATH
            );
        }
        
         $teacher->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $teacher->password,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'qualification' => $request->qualification,
            'avatar' => $fileName,
        ]);

        $teacher->detachRole($teacher->role);

        $teacher->attachRole($request->role);

        return true;

    }

    public function deleteTeacher(Teacher $teacher): ?bool
    {
        $this->imageService->deleteImage(path: $teacher->getAvatarPath());

        return $teacher->delete();
    }
}
