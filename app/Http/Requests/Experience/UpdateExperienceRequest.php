<?php

namespace App\Http\Requests\Experience;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExperienceRequest extends FormRequest
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
            'title' => 'required',
            'from' => 'required|date|date_format:Y-m-d|before:today|before:to',
            'to' => 'required|date|date_format:Y-m-d|before:today|after:from',
            'teacher_id' => 'required|exists:teachers,id',
        ];
    }
}