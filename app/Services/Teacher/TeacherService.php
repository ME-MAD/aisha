<?php

namespace App\Services\Teacher;

use App\Models\Teacher;
use App\Http\Traits\ImageTrait;

class TeacherService
{
    use ImageTrait;

    public function getAllTeachers(array $columns = ['id', 'name'])
    {
        return Teacher::select($columns)->get();
    }


    public function relationsOfTeacher(Teacher $teacher)
    {
        return  $teacher->load([
            'groupStudents',
            'groups.groupDays',
            'groups.groupType',
            'groups.students',
            'experiences'
        ]);
    }


    public function teacherExperiences(Teacher $teacher)
    {
        return $this->relationsOfTeacher($teacher)->experiences;
    }

    public function countGroups(Teacher $teacher)
    {
        return $this->relationsOfTeacher($teacher)->groups->count();
    }

    public function countStudent(Teacher $teacher)
    {
        return $this->relationsOfTeacher($teacher)->groupStudents->count();
    }

    public function groups(Teacher $teacher)
    {
        return $this->relationsOfTeacher($teacher)->groups;
    }

    public function createTeacher(object $request)
    {
        $fileName = $this->uploadImage(
            imageObject: $request->file('avatar'),
            path: Teacher::AVATARS_PATH
        );


        Teacher::create([
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

        $teacher->update([
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
