<?php

namespace App\Rules\Admin\StudentLesson;

use App\Models\Lesson;
use Illuminate\Contracts\Validation\Rule;

class CheckLastPageFinished implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $lesson = Lesson::find(request('lesson_id'));
        
        if($value == $lesson->to_page)
        {
           return $lesson->to_page;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
