<?php

namespace App\Http\Controllers\Admin\Publication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Publication\CreateInformationRequest;
use App\Http\Requests\Admin\Publication\UpdateInformationRequest;
use App\Model\Campaign;
use App\Model\Information;
use App\Model\InformationCategory;
use Illuminate\Http\Request;

class InformationController extends Controller
{

    public function index()
    {
        $payload['informations'] = Information::with(['user', 'category'])->get();

        return view('page/admin/publication/information/index', $payload);
    }

    public function create()
    {
        $payload['informationCategories'] = InformationCategory::all();
        $payload['campaigns'] = Campaign::all();

        return view('page/admin/publication/information/create', $payload);
    }

    public function store(CreateInformationRequest $request)
    {
        $input = $request->validated();
        $fileName = uniqid() .'.'. $input['information_photo']->extension();
        $input['information_photo']->storeAs(config('url.information-photo'), $fileName);

        $information = new Information();
        $information->user_id = auth()->user()->id;
        $information->campaign_id = isset($input['campaign_id']) ? $input['campaign_id'] : null;
        $information->information_category_id = $input['information_category_id'];
        $information->information_title = $input['information_title'];
        $information->information_description = $input['information_description'];
        $information->is_published = isset($input['publish']) ? true : false;
        if ($information->is_published) $information->publish_date = date('Y-m-d');
        $information->information_photo = $fileName;
        $information->save();

        return redirect('admin/publication/information')->with('success_message', 'Berhasil menambahkan data informasi baru');
    }


    public function edit($id)
    {
        $payload['information'] = Information::find($id);
        if (!$payload['information']) redirect('admin/publication/information')->with('failed_message', 'Data Informasi tidak ditemukan');
        $payload['informationCategories'] = InformationCategory::all();
        $payload['campaigns'] = Campaign::all();

        return view('page/admin/publication/information/update', $payload);
    }

    public function update(UpdateInformationRequest $request, $id)
    {
        $input = $request->validated();

        $information = Information::find($id);
        if (!$information) redirect('admin/publication/information')->with('failed_message', 'Data Informasi tidak ditemukan');

        if(isset($input['information_photo'])) {
            $fileName = uniqid() .'.'. $input['information_photo']->extension();
            $input['information_photo']->storeAs(config('url.information-photo'), $fileName);
        }

        $information->campaign_id = isset($input['campaign_id']) ? $input['campaign_id'] : null;
        $information->information_category_id = $input['information_category_id'];
        $information->information_title = $input['information_title'];
        $information->information_description = $input['information_description'];
        if (!$information->is_published && isset($input['publish'])) $information->publish_date = date('Y-m-d');
        $information->is_published = isset($input['publish']) ? true : false;
        $information->information_photo = isset($fileName) ? $fileName : $information->information_photo;
        $information->save();

        return redirect('admin/publication/information')->with('success_message', 'Berhasil mengubah data Informasi');
    }

    public function destroy($id)
    {
        $information = Information::find($id);
        if (!$information) redirect('admin/publication/information')->with('failed_message', 'Data Informasi tidak ditemukan');

        $information->delete();

        return redirect('admin/publication/information')->with('success_message', 'Berhasil menghapus data informasi');
    }
}
