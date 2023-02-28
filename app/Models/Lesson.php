<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = ['subject_id', 'title', 'chapters_count', 'from_page', 'to_page'];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function studentLessons()
    {
        return $this->hasMany(StudentLesson::class, 'lesson_id');
    }

    public function scopeLessons($query)
    {
        if(getGuard() == 'admin')
        {
            return $query->select([
                'lessons.id',
                'lessons.subject_id',
                'title',
                'from_page',
                'to_page',
                'chapters_count',
            ]);
        }
        else if(getGuard() == 'teacher')
        {
            return Auth::guard(getGuard())->user()->lessons()->select([
                'lessons.id',
                'lessons.subject_id',
                'title',
                'from_page',
                'to_page',
                'chapters_count',
            ])->getQuery();
        }
        else if(getGuard() == "student")
        {
            return Auth::guard(getGuard())->user()->lessons()->select([
                'lessons.id',
                'lessons.subject_id',
                'title',
                'from_page',
                'to_page',
                'chapters_count',
            ])->getQuery();

        }
    }
}