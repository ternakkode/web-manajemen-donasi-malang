<?php

namespace App\Http\Requests\Admin\Financial;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOutcomeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'necessity' => 'bail|required|max:255',
            'amount' => 'bail|required|max:11',
            'campaign_id' => 'bail|required|exists:campaigns,id',
            'proof' => 'bail|nullable|image',
            'description' => 'bail|required',
            'transaction_date' => 'bail|required'
        ];
    }
}
