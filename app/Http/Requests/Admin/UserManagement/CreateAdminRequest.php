<?php

namespace App\Http\Requests\Admin\UserManagement;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdminRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'bail|required|max:100|unique:users,email',
            'role_id' => 'bail|required|exists:roles,id',
            'password' => 'bail|required|max:100',
            'name' => 'bail|required|max:100',
            'telephone' => 'bail|required|max:20'
        ];
    }
}
