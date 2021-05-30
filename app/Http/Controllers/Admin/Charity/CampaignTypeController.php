<?php

namespace App\Http\Controllers\Admin\Charity;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Charity\StoreCampaignTypeRequest;
use App\Model\CampaignType;
use Illuminate\Http\Request;

class CampaignTypeController extends Controller
{

    public function index()
    {
        $payload['campaignTypes'] = CampaignType::all();

        return view('page/admin/charity/campaign-type/index', $payload);
    }

    public function create()
    {
        return view('page/admin/charity/campaign-type/create');
    }

    public function store(StoreCampaignTypeRequest $request)
    {
        $input = $request->validated();

        $campaignType = new CampaignType();
        $campaignType->campaign_type_name = $input['campaign_type_name'];
        $campaignType->save();

        return redirect('admin/charity/campaign-type')->with('success_message', 'Berhasil menambahkan data kategori penggalangan dana');
    }

    public function edit($id)
    {
        $payload['campaignType'] = CampaignType::find($id);
        if (!$payload['campaignType']) redirect('admin/charity/campaign-type')->with('failed_message', 'Data kategori penggalangan dana tidak ditemukan');

        return view('page/admin/charity/campaign-type/update', $payload);
    }

    public function update(StoreCampaignTypeRequest $request, $id)
    {
        $input = $request->validated();

        $campaignType = CampaignType::find($id);
        if (!$campaignType)  redirect('admin/charity/campaign-type')->with('failed_message', 'Data kategori penggalangan dana tidak ditemukan');

        $campaignType->campaign_type_name = $input['campaign_type_name'];
        $campaignType->save();

        return redirect('admin/charity/campaign-type')->with('success_message', 'Berhasil mengubah data kategori penggalangan dana');
    }

    public function destroy($id)
    {
        $campaignType = CampaignType::find($id);
        if (!$campaignType)  redirect('admin/charity/campaign-type')->with('failed_message', 'Data kategori penggalangan dana tidak ditemukan');
        $campaignType->delete();

        return redirect('admin/charity/campaign-type')->with('success_message', 'Berhasil menghapus data kategori penggalangan dana');
    }
}
