<?php

namespace App\Http\Requests\Admin\UserManagement;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'bail|required|max:100',
            'password' => 'bail|nullable|max:100',
            'name' => 'bail|required|max:100',
            'telephone' => 'bail|required|max:20'
        ];
    }
}
