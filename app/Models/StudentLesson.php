<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentLesson extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'lesson_id', 'group_id', 'finished', 'percentage', 'last_chapter_finished','last_page_finished'];

    public function students()
    {
        return $this->hasMany(Lesson::class, 'student_id');
    }
    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'lesson_id');
    }
    public function groups()
    {
        return $this->hasMany(Lesson::class, 'group_id');
    }
}