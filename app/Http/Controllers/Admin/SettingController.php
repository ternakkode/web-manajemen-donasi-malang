<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Model\Campaign;
use App\Model\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function view() {
        $payload['campaigns'] = Campaign::all();
        $payload['pengumuman'] = Setting::where('key', 'pengumuman')->value('value');
        $payload['tata_cara_donasi'] = Setting::where('key', 'tata_cara_donasi')->value('value');
        $payload['campaign_utama'] = Setting::where('key', 'campaign_utama')->value('value');
        $payload['whatsapp'] = Setting::where('key', 'whatsapp')->value('value');
        $payload['email'] = Setting::where('key', 'email')->value('value');

        return view('page/admin/setting', $payload);
    }

    public function action(SettingRequest $request) {
        $input = $request->validated();

        foreach ($input as $key => $value) {
            Setting::where('key', $key)->update(['value' => $value]);
        }

        return redirect()->back()->with('success_message', 'Telah berhasil mengubah pengaturan');
    }
}
