<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\MakeDonationRequest;
use App\Model\Campaign;
use App\Model\Donation;
use App\Model\Faq;
use App\Model\Information;
use App\Model\Outcome;
use App\Model\Setting;
use App\Model\Solia;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
        $payload['campaigns'] = Campaign::limit(3)->get();
        $payload['informations'] = Information::limit(3)->get();

        return view('page/frontend/index', $payload);
    }

    public function information() {
        $payload['informations'] = Information::where('is_published', true)->paginate(9);

        return view('page/frontend/information', $payload);
    }

    public function informationDetail($id) {
        $payload['information'] = Information::find($id);
        if (!$payload['information']) return redirect('/')->with('failed_message', 'Data informasi tidak ditemukan');

        return view('page/frontend/information_detail', $payload);
    }

    public function faq() {
        $payload['faqs'] = Faq::where('is_published', true)->get();

        return view('page/frontend/faq', $payload);
    }

    public function solia() {
        $payload['solias'] = Solia::paginate(9);

        return view('page/frontend/solia', $payload);
    }

    public function soliaDetail($id) {
        $payload['solia'] = Solia::find($id);
        if (!$payload['solia']) return redirect('/')->with('failed_message', 'Data solia tidak ditemukan');

        return view('page/frontend/solia_detail', $payload);
    }

    public function campaign() {
        $payload['campaigns'] = Campaign::paginate(9);

        return view('page/frontend/campaign', $payload);
    }

    public function campaignDetail($id) {
        $payload['campaign'] = Campaign::find($id);
        if (!$payload['campaign']) return redirect('/')->with('failed_message', 'Data penggalangan dana tidak ditemukan');

        return view('page/frontend/campaign_detail', $payload);
    }

    public function donation(Request $request) {
        $campaignId = $request->query('campaign_id');
        if (!$campaignId) {
            $campaignId = Setting::where('key', 'campaign_utama')->value('value');
            $payload['status'] = "Dikarenakan anda tidak memilih penggalangan dana yang akan didonasikan, bantuan anda akan didonasikan pada penggalangan dana utama kami :)";
        }

        $payload['campaign'] = Campaign::find($campaignId);
        if (!$payload['campaign']) return redirect('/')->with('failed_message', 'Data penggalangan dana tidak ditemukan');
        $payload['tata_cara_donasi'] = Setting::where('key', 'tata_cara_donasi')->value('value');

        return view('page/frontend/donation', $payload);
    }

    public function processDonation(MakeDonationRequest $request) {
        $input = $request->validated();

        $fileName = uniqid() .'.'. $input['donation_proof']->extension();
        $input['donation_proof']->storeAs(config('url.donation-proof'), $fileName);

        $donation = new Donation();
        $donation->campaign_id = $input['campaign_id'];
        $donation->donatur_name = isset($input['donatur_name']) ? $input['donatur_name'] : null;
        $donation->donation_time = date('Y-m-d');
        $donation->amount = $input['amount'];
        $donation->message = $input['message'];
        $donation->donation_proof = $fileName;
        $donation->status = 9;
        $donation->save();

        return redirect('/')->with('success_message', 'Terimakasih atas donasi yang telah anda berikan, semoga sukses selalu :)');
    }

    public function transparation() {
        $payload['donations'] = Donation::all();
        $payload['outcomes'] = Outcome::all();

        return view('page/frontend/transparation', $payload);
    }
}
