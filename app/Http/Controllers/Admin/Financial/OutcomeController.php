<?php

namespace App\Http\Controllers\Admin\Financial;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Financial\CreateOutcomeRequest;
use App\Http\Requests\Admin\Financial\UpdateOutcomeRequest;
use App\Model\Campaign;
use App\Model\Outcome;
use Illuminate\Http\Request;

class OutcomeController extends Controller
{

    public function index()
    {
        $payload['outcomes'] = Outcome::all();

        return view('page/admin/financial/outcome/index', $payload);
    }


    public function create()
    {
        $payload['campaigns'] = Campaign::all();
        return view('page/admin/financial/outcome/create', $payload);
    }


    public function store(CreateOutcomeRequest $request)
    {
        $input = $request->validated();

        $fileName = uniqid() .'.'. $input['proof']->extension();
        $input['proof']->storeAs(config('url.outcome-proof'), $fileName);

        $outcome = new Outcome();
        $outcome->necessity = $input['necessity'];
        $outcome->user_id = auth()->user()->id;
        $outcome->campaign_id = $input['campaign_id'];
        $outcome->amount = $input['amount'];
        $outcome->description = $input['description'];
        $outcome->transaction_date = $input['transaction_date'];
        $outcome->proof = $fileName;
        $outcome->save();

        return redirect('admin/financial/outcome')->with('success_message', 'Berhasil menambahkan data pengeluaran baru');
    }


    public function edit($id)
    {
        $payload['outcome'] = Outcome::find($id);
        if (!$payload['outcome']) redirect('admin/financial/outcome')->with('failed_message', 'Data Pengeluaran tidak ditemukan');
        $payload['campaigns'] = Campaign::all();
        
        return view('page/admin/financial/outcome/update', $payload);
    }

    public function update(UpdateOutcomeRequest $request, $id)
    {
        $input = $request->validated();

        $outcome = Outcome::find($id);
        if (!$outcome) redirect('admin/financial/outcome')->with('failed_message', 'Data Pengeluaran tidak ditemukan');

        if (isset($input['proof'])) {
            $fileName = uniqid() .'.'. $input['proof']->extension();
            $input['proof']->storeAs(config('url.outcome-proof'), $fileName);
            
            $outcome->proof = $fileName;
        }

        $outcome->necessity = $input['necessity'];
        $outcome->user_id = auth()->user()->id;
        $outcome->campaign_id = $input['campaign_id'];
        $outcome->amount = $input['amount'];
        $outcome->description = $input['description'];
        $outcome->transaction_date = $input['transaction_date'];
        $outcome->save();

        return redirect('admin/financial/outcome')->with('success_message', 'Berhasil mengubah data pengeluaran');
    }

    public function destroy($id)
    {
        $outcome = Outcome::find($id);
        if (!$outcome) redirect('admin/financial/outcome')->with('failed_message', 'Data Pengeluaran tidak ditemukan');
        $outcome->delete();

        return redirect('admin/financial/outcome')->with('success_message', 'Berhasil menghapus data pengeluaran');
    }
}
