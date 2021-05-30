<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'bail|required|max:100',
            'password' => 'bail|required|max:100',
        ];
    }
}
