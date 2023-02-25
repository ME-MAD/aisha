<?php

namespace App\Http\Requests\GroupSubject;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGroupSubjectRequest extends FormRequest
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
            'subject_id' => "required|exists:subjects,id",
            'group_id' => "required|exists:subjects,id",
        ];
    }
}