<?php


namespace App\Http\Traits;

use App\Models\Lesson;

trait LessonTrait
{
    private function getLessons()
    {
        return Lesson::get();
    }
}
