<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStudentRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "name" => ["required", "string"],
            'email' => ['required', Rule::unique('students', 'email')],
            'password' => 'required|confirmed',
            "birthday" => ["nullable", "date"],
            "phone" => ["required", "string"],
            "qualification" => ["nullable", "string"],
        ];
    }
}
