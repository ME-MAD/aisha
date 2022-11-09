<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'birthday', 'phone', 'qualification', 'avatar'];

    const AVATARS_PATH = 'images/student/avatars/';

    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: function ($avatar) {
                if ($avatar && file_exists($this->getAvatarPath())) {
                    return asset(Student::AVATARS_PATH . $avatar);
                }
                return '';
            },
        );
    }

    function getAvatarPath()
    {
        if($this->getRawOriginal('avatar'))
        {
            return public_path(Student::AVATARS_PATH . $this->getRawOriginal('avatar'));
        }
        return '';
    }

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
        return $this->hasMany(StudentLesson::class, 'student_id');
    }
}