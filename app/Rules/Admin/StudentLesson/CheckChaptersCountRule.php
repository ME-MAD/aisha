<?php

namespace App\Rules\Admin\StudentLesson;

use App\Models\Lesson;
use Illuminate\Contracts\Validation\Rule;

class CheckChaptersCountRule implements Rule
{
    
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        $lesson = Lesson::find(request('lesson_id'));
       
        return $value == $lesson->chapters_count;
    }
    
    public function message()
    {
        return 'the chapters are not equal to the lesson chapters count';
    }
}
