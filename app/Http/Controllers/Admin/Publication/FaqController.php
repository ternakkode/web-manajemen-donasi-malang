<?php

namespace App\Http\Controllers\Admin\Publication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Publication\StoreFaqRequest;
use App\Model\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{

    public function index()
    {
        $payload['faqs'] = Faq::all();

        return view('page/admin/publication/faq/index', $payload);
    }


    public function create()
    {
        return view('page/admin/publication/faq/create');
    }


    public function store(StoreFaqRequest $request)
    {
        $input = $request->validated();

        $faq = new Faq();
        $faq->question = $input['question'];
        $faq->answer = $input['answer'];
        $faq->is_published = isset($input['is_published']) ? true : false;
        $faq->save();

        return redirect('admin/publication/faq')->with('success_message', 'Berhasil menambahkan data pertanyaan umum baru');
    }


    public function edit($id)
    {
        $payload['faq'] = Faq::find($id);
        if (!$payload['faq']) redirect('admin/publication/faq')->with('failed_message', 'Data Pertanyaan Umum tidak ditemukan');

        return view('page/admin/publication/faq/update', $payload);
    }

    public function update(StoreFaqRequest $request, $id)
    {
        $input = $request->validated();

        $faq = Faq::find($id);
        if (!$faq) redirect('admin/publication/faq')->with('failed_message', 'Data Pertanyaan Umum tidak ditemukan');

        $faq->question = $input['question'];
        $faq->answer = $input['answer'];
        $faq->is_published = isset($input['is_published']) ? true : false;
        $faq->save();

        return redirect('admin/publication/faq')->with('success_message', 'Berhasil mengubah data pertanyaan umum');
    }

    public function destroy($id)
    {
        $faq = Faq::find($id);
        if (!$faq) redirect('admin/publication/faq')->with('failed_message', 'Data Pertanyaan Umum tidak ditemukan');
        $faq->delete();

        return redirect('admin/publication/faq')->with('success_message', 'Berhasil menghapus data pertanyaan umum');
    }
}
