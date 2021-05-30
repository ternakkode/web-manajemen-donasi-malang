<?php

namespace App\Http\Controllers\Admin\Financial;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Financial\CreateDonationRequest;
use App\Http\Requests\Admin\Financial\UpdateDonationRequest;
use App\Model\Campaign;
use App\Model\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        $payload['donations'] = Donation::all();

        return view('page/admin/financial/donation/index', $payload);
    }

    public function create()
    {
        $payload['campaigns'] = Campaign::all();

        return view('page/admin/financial/donation/create', $payload);
    }


    public function store(CreateDonationRequest $request)
    {
        $input = $request->validated();

        $fileName = uniqid() .'.'. $input['donation_proof']->extension();
        $input['donation_proof']->storeAs(config('url.donation-proof'), $fileName);

        $donation = new Donation();
        $donation->campaign_id = $input['campaign_id'];
        $donation->donatur_name = isset($input['donatur_name']) ? $input['donatur_name'] : null;
        $donation->donation_time = $input['donation_time'];
        $donation->amount = $input['amount'];
        $donation->message = $input['message'];
        $donation->donation_proof = $fileName;
        $donation->status = 1;
        $donation->save();

        return redirect('admin/financial/donation')->with('success_message', 'Berhasil menambahkan data donasi baru');
    }

    public function edit($id)
    {
        $payload['donation'] = Donation::find($id);
        if (!$payload['donation']) redirect('admin/financial/donation')->with('failed_message', 'Data donasi tidak ditemukan');
        $payload['campaigns'] = Campaign::all();

        return view('page/admin/financial/donation/update', $payload);
    }

    public function update(UpdateDonationRequest $request, $id)
    {
        $input = $request->validated();

        $donation = Donation::find($id);
        if (!$donation) redirect('admin/financial/donation')->with('failed_message', 'Data donasi tidak ditemukan');

        if (isset($input['donation_proof'])) {
            $fileName = uniqid() .'.'. $input['donation_proof']->extension();
            $input['donation_proof']->storeAs(config('url.donation-proof'), $fileName);
            
            $donation->donation_proof = $fileName;
        }

        $donation->donatur_name = isset($input['donatur_name']) ? $input['donatur_name'] : null;
        $donation->donation_time = $input['donation_time'];
        $donation->campaign_id = $input['campaign_id'];
        $donation->amount = $input['amount'];
        $donation->message = $input['message'];
        $donation->save();

        return redirect('admin/financial/donation')->with('success_message', 'Berhasil mengubah data donasi');
    }

    public function destroy($id)
    {
        $donation = Donation::find($id);
        if (!$donation) redirect('admin/financial/donation')->with('failed_message', 'Data donasi tidak ditemukan');
        $donation->delete();

        return redirect('admin/financial/donation')->with('success_message', 'Berhasil menghapus data donasi');
    }

    public function approval(Request $request, $id) {
        $status = $request->input('status');
        $donation = Donation::find($id);
        if (!$donation) redirect('admin/financial/donation')->with('failed_message', 'Data donasi tidak ditemukan');

        switch($status) {
            case 'approve':
                $donation->status = 1;
                break;
            case 'decline':
                $donation->status = 0;
                break;
            default:
                break;
        }

        $donation->save();
        return redirect('admin/financial/donation')->with('success_message', 'Berhasil mengkonfirmasi data donasi');
    }
}
