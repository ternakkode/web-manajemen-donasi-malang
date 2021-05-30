<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Campaign;
use App\Model\Donation;
use App\Model\Solia;
use App\Model\Information;
use App\Model\Setting;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $payload['total_campaign'] = Campaign::count();
        $payload['total_donation'] = Donation::count();
        $payload['total_solia'] = Solia::count();
        $payload['total_information'] = Information::count();
        $payload['pengumuman'] = Setting::where('key', 'pengumuman')->value('value');

        return view('page/admin/dashboard', $payload);
    }
}
