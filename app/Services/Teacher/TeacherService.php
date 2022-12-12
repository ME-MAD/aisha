<?php

namespace App\Services\Teacher;

use App\Models\Teacher;
use App\Http\Traits\ImageTrait;

class TeacherService
{
    use ImageTrait;

    private $teacherWithAllData;

    public function getAllTeachers(array $columns = ['id', 'name'])
    {
        return Teacher::select($columns)->get();
    }


    public function setTeacherWithAllData(Teacher $teacher)
    {
        $this->teacherWithAllData =  $teacher->load([
            'groupStudents',
            'groups.groupDays',
            'groups.groupType',
            'groups.students',
            'experiences'
        ]);
    }

    public function teacherExperiences()
    {
        return $this->teacherWithAllData->experiences;
    }

    public function countGroups()
    {
        return $this->teacherWithAllData->groups->count();
    }

    public function countStudent()
    {
        return $this->teacherWithAllData->groupStudents->count();
    }

    public function groups()
    {
        return $this->teacherWithAllData->groups;
    }

    public function createTeacher(object $request)
    {
        $fileName = $this->uploadImage(
            imageObject: $request->file('avatar'),
            path: Teacher::AVATARS_PATH
        );


        return Teacher::create([
            'name'          => $request->name,
            'phone'         => $request->phone,
            'birthday'      => $request->birthday,
            'qualification' => $request->qualification,
            'avatar'        =>  $fileName,
        ]);
    }

    public function updateTeacher(Teacher $teacher, object $request)
    {
        $fileName = $teacher->getRawOriginal('avatar');

        if ($request->file('avatar')) {

            $this->deleteImage(
                path: $teacher->getAvatarPath()
            );

            $fileName = $this->uploadImage(
                imageObject: $request->file('avatar'),
                path: Teacher::AVATARS_PATH
            );
        }

        return $teacher->update([
            'name'          => $request->name,
            'phone'         => $request->phone,
            'birthday'      => $request->birthday,
            'qualification' => $request->qualification,
            'avatar'        => $fileName,
        ]);
    }

    public function deleteTeacher(Teacher $teacher)
    {
        $this->deleteImage(
            path: $teacher->getAvatarPath()
        );

        return $teacher->delete();
    }

    
}
