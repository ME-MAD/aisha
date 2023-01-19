<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTeacherRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|alpha|max:255',
            'email' => ['required', Rule::unique('teachers', 'email')->ignore($this->email)],
            'password' => 'required|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'birthday' => 'nullable',
            'phone' => 'required',
            'qualification' => 'required',
        ];
    }
}
