<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name" => ["required", "string",'alpha', Rule::unique('students', 'name')->ignore($this->student->id)],
            'email' => ['required', Rule::unique('students', 'email')->ignore($this->student->id)],
            'password' => 'nullable|confirmed',
            "birthday" => ["nullable", "date"],
            "phone" => ["nullable", "string"],
            "qualification" => ["nullable", "string"],
        ];
    }
}
