<?php

namespace App\Http\Requests\GroupDay;

use App\Rules\Admin\GroupDay\CheckIfCountOfGroupDayIsAvailable;
use Illuminate\Foundation\Http\FormRequest;

class StoreGroupDayRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "group_id" => "required|exists:groups,id",
            "day" => ["required", new CheckIfCountOfGroupDayIsAvailable()],
        ];
    }
}
