<?php

namespace App\Http\Controllers\Admin\Publication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Publication\StoreInformationCategoryRequest;
use App\Model\InformationCategory;
use Illuminate\Http\Request;

class InformationCategoryController extends Controller
{

    public function index()
    {
        $payload['informationCategories'] = InformationCategory::all();

        return view('page/admin/publication/information-category/index', $payload);
    }


    public function create()
    {
        return view('page/admin/publication/information-category/create');
    }


    public function store(StoreInformationCategoryRequest $request)
    {
        $input = $request->validated();

        $informationCategory = new InformationCategory();
        $informationCategory->information_category_name = $input['information_category_name'];
        $informationCategory->save();

        return redirect('admin/publication/information-category')->with('success_message', 'Berhasil menambahkan data kategori informasi baru');
    }


    public function edit($id)
    {
        $payload['informationCategory'] = InformationCategory::find($id);
        if (!$payload['informationCategory']) redirect('admin/publication/information-category')->with('failed_message', 'Data Kategori Informasi tidak ditemukan');

        return view('page/admin/publication/information-category/update', $payload);
    }

    public function update(StoreInformationCategoryRequest $request, $id)
    {
        $input = $request->validated();

        $informationCategory = InformationCategory::find($id);
        if (!$informationCategory) redirect('admin/publication/information-category')->with('failed_message', 'Data Kategori Informasi tidak ditemukan');

        $informationCategory->information_category_name = $input['information_category_name'];
        $informationCategory->save();


        return redirect('admin/publication/information-category')->with('success_message', 'Berhasil mengubah data kategori informasi baru');
    }

    public function destroy($id)
    {
        $informationCategory = InformationCategory::find($id);
        if (!$informationCategory) redirect('admin/publication/information-category')->with('failed_message', 'Data Kategori Informasi tidak ditemukan');

        $informationCategory->delete();


        return redirect('admin/publication/information-category')->with('success_message', 'Berhasil menghapus data kategori informasi baru');
    }
}
