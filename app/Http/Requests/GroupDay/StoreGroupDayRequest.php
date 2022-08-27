<?php

namespace App\Http\Requests\GroupDay;

use Illuminate\Foundation\Http\FormRequest;

class StoreGroupDayRequest extends FormRequest
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
           "group_id"=>"required",
           "day"=>"required"
        ];
    }
}
