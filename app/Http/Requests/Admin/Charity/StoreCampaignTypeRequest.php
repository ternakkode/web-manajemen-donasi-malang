<?php

namespace App\Http\Requests\Admin\Charity;

use Illuminate\Foundation\Http\FormRequest;

class StoreCampaignTypeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'campaign_type_name' => 'bail|required|max:100',
        ];
    }
}
