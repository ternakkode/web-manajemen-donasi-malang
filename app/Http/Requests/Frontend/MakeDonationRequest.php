<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class MakeDonationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'campaign_id' => 'bail|required|exists:campaigns,id',
            'donation_time' => 'bail|nullable|date',
            'donatur_name' => 'bail|nullable|max:255',
            'amount' => 'bail|required|max:11',
            'message' => 'bail|nullable',
            'donation_proof' => 'bail|required|image',
        ];
    }
}
