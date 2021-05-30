<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'bail|required|max:100|unique:users,email',
            'password' => 'bail|required|max:100|confirmed',
            'name' => 'bail|required|max:100',
            'telephone' => 'bail|required|max:20'
        ];
    }
}
