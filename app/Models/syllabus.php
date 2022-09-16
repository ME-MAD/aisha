<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class syllabus extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'new_lesson', 'old_lesson', 'is_reverse'];

    public function lesson_new()
    {
        return $this->belongsTo(Lesson::class, 'new_lesson');
    }

    public function lesson_old()
    {
        return $this->belongsTo(Lesson::class, 'old_lesson');
    }
}