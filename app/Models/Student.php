<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'birthday', 'phone', 'qualification'];

    public function groupStudents()
    {
        return $this->hasMany(GroupStudent::class, 'student_id');
    }

    public function syllabus()
    {
        return $this->hasMany(syllabus::class, 'student_id');
    }

    public function studentLessons()
    {
        return $this->hasMany(StudentLesson::class,'student_id');
    }
}