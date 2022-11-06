<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
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
            'name' => 'required',
            // 'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'avatar' => 'required',
            'birthday' => 'required',
            'phone' => 'required',
            'qualification' => 'required',

        ];
    }
}