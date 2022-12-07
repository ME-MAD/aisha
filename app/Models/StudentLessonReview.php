<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentLessonReview extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'lesson_id', 'group_id', 'finished', 'percentage', 'last_chapter_finished','last_page_finished'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function syllabusReviews()
    {
        return $this->hasMany(SyllabusReview::class,'student_lesson_review_id');
    }
}
