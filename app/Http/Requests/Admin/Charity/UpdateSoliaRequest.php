<?php

namespace App\Http\Requests\Admin\Charity;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSoliaRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'bail|required|max:200',
            'location' => 'bail|required',
            'description' => 'bail|required',
            'campaign_id' => 'bail|nullable|exists:campaigns,id',
            'foto' => 'bail|nullable|array',
        ];
    }
}
