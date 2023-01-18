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
            "name" => ["required", "string", Rule::unique('students', 'id')->ignore($this->name)],
            "birthday" => ["nullable", "date"],
            "phone" => ["nullable", "string"],
            "qualification" => ["nullable", "string"],
        ];
    }
}
