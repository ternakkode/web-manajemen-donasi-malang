<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    public function rules()
    {
        return [
            'tata_cara_donasi' => 'bail|required',
            'pengumuman' => 'bail|required',
            'campaign_utama' => 'bail|nullable|exists:campaigns,id',
            'whatsapp' => 'bail|required',
            'email' => 'bail|required'
        ];
    }
}
