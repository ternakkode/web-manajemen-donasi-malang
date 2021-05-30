<?php

namespace App\Http\Requests\Admin\Publication;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInformationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'information_title' => 'bail|required|max:255',
            'campaign_id' => 'bail|nullable|exists:campaigns,id',
            'information_category_id' => 'bail|required|exists:information_categories,id',
            'information_photo' => 'bail|nullable|image',
            'information_description' => 'bail|required',
            'publish' => 'bail|nullable'
        ];
    }
}
