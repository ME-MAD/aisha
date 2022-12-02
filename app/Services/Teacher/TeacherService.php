<?php

namespace App\Services\Teacher;

use App\Models\Teacher;

class TeacherService
{
    public function getAllTeachers(array $columns = ['id', 'name'])
    {
        return Teacher::select($columns)->get();
    }
}