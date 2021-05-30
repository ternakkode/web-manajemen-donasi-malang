<?php

namespace App\Http\Requests\Admin\Charity;

use Illuminate\Foundation\Http\FormRequest;

class CreateCampaignRequest extends FormRequest
{
    public function rules()
    {
        return [
            'campaign_type_id' => 'bail|required|exists:campaign_types,id',
            'campaign_title' => 'bail|required|max:255',
            'campaign_description' => 'bail|required',
            'campaign_target' => 'bail|required|numeric',
            'campaign_end_time' => 'bail|required|date',
            'foto' => 'bail|required|array',
            'solia' => 'bail|nullable|array'
        ];
    }
}
