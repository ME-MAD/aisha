<?php

namespace App\Http\Requests\StudentLesson;

use App\Rules\CheckIsChaptersCountOfLesson;
use App\Rules\CheckIsMaxChaptersCountOfLessonValid;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStudentLessonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "group_id" =>         [ 'required',Rule::exists('groups','id')],
            "lesson_id" =>        [ "required",Rule::exists('lessons','id')],
            "student_id" =>       [ "required",Rule::exists('students','id')],
            "max_chapters" =>     [ "required",'integer' , new CheckIsMaxChaptersCountOfLessonValid()],
            "chapters_count" =>   [ "required",'integer']
        ];
    }
}
