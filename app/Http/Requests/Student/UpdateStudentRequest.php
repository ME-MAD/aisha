<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name" => ["nullable", "string"],
            "birthday" => ["nullable", "date"],
            "phone" => ["nullable", "string"],
            "qualification" => ["nullable", "string"],
        ];
    }
}
