<?php

namespace App\Http\Requests\Admin\Publication;

use Illuminate\Foundation\Http\FormRequest;

class StoreInformationCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'information_category_name' => 'bail|required|max:100',
        ];
    }
}
