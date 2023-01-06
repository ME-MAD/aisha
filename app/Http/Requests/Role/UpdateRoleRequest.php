<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return
            [
                'name' => ['nullable', 'string', Rule::unique('roles', 'name')],
                'display_name' => ['nullable', 'string', Rule::unique('roles', 'name')],
                'description' => ['nullable', 'string']
            ];
    }
}
