<?php

namespace App\Http\Controllers\Admin\Charity;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Charity\CreateCampaignRequest;
use App\Http\Requests\Admin\Charity\UpdateCampaignRequest;
use App\Model\Campaign;
use App\Model\CampaignType;
use App\Model\Solia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CampaignController extends Controller
{

    public function index()
    {
        $payload['campaigns'] = Campaign::all();

        return view('page/admin/charity/campaign/index', $payload);
    }

    public function create()
    {
        $payload['campaignTypes'] = CampaignType::all();
        $payload['solias'] = Solia::all();

        return view('page/admin/charity/campaign/create', $payload);
    }

    public function store(CreateCampaignRequest $request)
    {
        $input = $request->validated();
        $campaign = new Campaign();
        $campaign->campaign_type_id = $input['campaign_type_id'];
        $campaign->campaign_title = $input['campaign_title'];
        $campaign->campaign_description = $input['campaign_description'];
        $campaign->campaign_target = $input['campaign_target'];
        $campaign->campaign_start_time = date('Y-m-d');
        $campaign->campaign_end_time = $input['campaign_end_time'];
        $campaign->save();

        $photos = [];
        $oldStorageFolder = config('url.tmp-image');
        $newStorageFolder = config('url.campaign-photo');

        foreach ($input['foto'] as $foto) {
            $moveFile = Storage::move($oldStorageFolder. '/' .$foto, $newStorageFolder. '/' .$foto);
            if ($moveFile) {
                $newFoto = [];
                $newFoto['campaign_photo_url'] = $foto;
                $newFoto['is_primary'] = empty($photos) ? 1 : 0;
                array_push($photos, $newFoto);
            }
        }

        $campaign->photos()->createMany($photos);

        if (isset($input['solia'])) {
            Solia::whereIn('id', $input['solia'])->update(['campaign_id' => $campaign->id]);
        }

        return redirect('admin/charity/campaign')->with('success_message', 'Berhasil menambahkan data penggalangan dana');
    }

    public function edit($id)
    {
        $payload['campaign'] = Campaign::with(['photos', 'solia'])->find($id);
        if (!$payload['campaign']) redirect('admin/charity/campaign')->with('failed_message', 'Data penggalangan dana tidak ditemukan');
        $payload['campaignTypes'] = CampaignType::all();
        $payload['solias'] = Solia::all();

        return view('page/admin/charity/campaign/update', $payload);
    }

    public function update(UpdateCampaignRequest $request, $id)
    {
        $input = $request->validated();

        $campaign = Campaign::find($id);
        if (!$campaign) redirect('admin/charity/campaign')->with('failed_message', 'Data penggalangan dana tidak ditemukan');
        $campaign->campaign_type_id = $input['campaign_type_id'];
        $campaign->campaign_title = $input['campaign_title'];
        $campaign->campaign_description = $input['campaign_description'];
        $campaign->campaign_target = $input['campaign_target'];
        $campaign->campaign_start_time = date('Y-m-d');
        $campaign->campaign_end_time = $input['campaign_end_time'];
        $campaign->save();

        if (isset($input['foto'])) {
            $photos = [];
            $oldStorageFolder = config('url.tmp-image');
            $newStorageFolder = config('url.campaign-photo');

            foreach ($input['foto'] as $foto) {
                $moveFile = Storage::move($oldStorageFolder. '/' .$foto, $newStorageFolder. '/' .$foto);
                if ($moveFile) {
                    $newFoto = [];
                    $newFoto['campaign_photo_url'] = $foto;
                    $newFoto['is_primary'] = empty($photos) ? 1 : 0;
                    array_push($photos, $newFoto);
                }
            }

            $campaign->photos()->createMany($photos);
        }

        Solia::where('campaign_id', $campaign->id)->update(['campaign_id' => null]);
        
        if (isset($input['solia'])) {
            Solia::whereIn('id', $input['solia'])->update(['campaign_id' => $campaign->id]);
        }

        return redirect('admin/charity/campaign')->with('success_message', 'Berhasil mengubah data penggalangan dana');
    }

    public function destroy($id)
    {
        $campaign = Campaign::find($id);
        if (!$campaign) redirect('admin/charity/campaign')->with('failed_message', 'Data penggalangan dana tidak ditemukan');
        $campaign->delete();

        return redirect('admin/charity/campaign')->with('success_message', 'Berhasil menghapus data penggalangan dana');
    }
}
