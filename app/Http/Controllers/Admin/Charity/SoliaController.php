<?php

namespace App\Http\Controllers\Admin\Charity;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Charity\CreateSoliaRequest;
use App\Http\Requests\Admin\Charity\UpdateSoliaRequest;
use App\Model\Campaign;
use App\Model\Solia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SoliaController extends Controller
{

    public function index()
    {
        $payload['solias'] = Solia::all();

        return view('page/admin/charity/solia/index', $payload);
    }

    public function create()
    {
        $payload['campaigns'] = Campaign::all();
        return view('page/admin/charity/solia/create', $payload);
    }

    public function store(CreateSoliaRequest $request)
    {
        $input = $request->validated();

        $solia = new Solia();
        $solia->user_id = auth()->user()->id;
        $solia->name = $input['name'];
        $solia->location = $input['location'];
        $solia->description = $input['description'];
        $solia->campaign_id = isset($input['campaign_id']) ? $input['campaign_id'] : null;
        $solia->save();

        $photos = [];
        $oldStorageFolder = config('url.tmp-image');
        $newStorageFolder = config('url.solia-photo');

        foreach ($input['foto'] as $foto) {
            $moveFile = Storage::move($oldStorageFolder. '/' .$foto, $newStorageFolder. '/' .$foto);
            if ($moveFile) {
                $newFoto = [];
                $newFoto['solia_photo_url'] = $foto;
                $newFoto['is_primary'] = empty($photos) ? 1 : 0;
                array_push($photos, $newFoto);
            }
        }

        $solia->photos()->createMany($photos);

        return redirect('admin/charity/solia')->with('success_message', 'Berhasil menambahkan data solia');
    }

    public function edit($id)
    {
        $payload['solia'] = Solia::with('photos')->find($id);
        if (!$payload['solia']) redirect('admin/charity/solia')->with('failed_message', 'Data solia tidak ditemukan');
        $payload['campaigns'] = Campaign::all();

        return view('page/admin/charity/solia/update', $payload);
    }

    public function update(UpdateSoliaRequest $request, $id)
    {
        $input = $request->validated();

        $solia = Solia::find($id);
        if (!$solia) redirect('admin/charity/solia')->with('failed_message', 'Data solia tidak ditemukan');
        $solia->user_id = auth()->user()->id;
        $solia->name = $input['name'];
        $solia->location = $input['location'];
        $solia->description = $input['description'];
        $solia->campaign_id = isset($input['campaign_id']) ? $input['campaign_id'] : null;
        $solia->save();

        if (isset($input['foto'])) { 
            $photos = [];
            $oldStorageFolder = config('url.tmp-image');
            $newStorageFolder = config('url.solia-photo');
            
            foreach ($input['foto'] as $foto) {
                $moveFile = Storage::move($oldStorageFolder. '/' .$foto, $newStorageFolder. '/' .$foto);
                if ($moveFile) {
                    $newFoto = [];
                    $newFoto['is_primary'] = 0;
                    $newFoto['solia_photo_url'] = $foto;
                    array_push($photos, $newFoto);
                }
            }

            $solia->photos()->createMany($photos);
        }

        return redirect('admin/charity/solia')->with('success_message', 'Berhasil mengubah data solia');
    }

    public function destroy($id)
    {
        $solia = Solia::find($id);
        if (!$solia) redirect('admin/charity/solia')->with('failed_message', 'Data solia tidak ditemukan');
        $solia->delete();

        return redirect('admin/charity/solia')->with('success_message', 'Berhasil menghapus data solia');
    }
}
