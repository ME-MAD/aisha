<?php

namespace App\Http\Requests\Student;

use App\Rules\Global\CheckIsFaieldString;
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
            "name" => ["required", "string" , new CheckIsFaieldString()],
            'email' => ['required','email', Rule::unique('students', 'email')],
            'password' => 'required|confirmed',
            'role' => ['required' , Rule::exists('roles','name')],
            "birthday" => ["nullable", "date"],
            "phone" => ["required", "string"],
            "qualification" => ["nullable", "string"],
        ];
    }
}
