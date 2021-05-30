<?php

namespace App\Http\Requests\Admin\Publication;

use Illuminate\Foundation\Http\FormRequest;

class StoreFaqRequest extends FormRequest
{
    public function rules()
    {
        return [
            'question' => 'bail|required|max:255',
            'answer' => 'bail|required',
            'is_published' => 'bail|nullable'
        ];
    }
}
