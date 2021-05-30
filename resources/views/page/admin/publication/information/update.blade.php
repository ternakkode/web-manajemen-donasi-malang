@extends('layout')
@section('title', 'Ubah Informasi')
@section('breadcrumbs')
<div class="breadcrumb-item"><a href="{{ url('admin/publication/information') }}">Informasi</a></div>
<div class="breadcrumb-item">Ubah Informasi</div>
@endsection
@section('content')
<form method="POST" action="{{ url('admin/publication/information/'.$information->id) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Judul</label>
                        <input type="text" class="form-control" name="information_title" id="form_information_title"
                            value="{{ $information->information_title }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Kategori</label>
                        <select class="form-control" name="information_category_id" id="form_kecamatan">
                            <option selected disabled>Pilih Kategori Informasi</option>
                            @foreach($informationCategories as $category)
                            <option value="{{ $category->id }}" @if($information->information_category_id ==
                                $category->id) selected @endif)>{{ $category->information_category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Penggalangan Dana</label>
                        <select class="form-control" name="campaign_id" id="form_kecamatan">
                            <option selected disabled>Pilih Penggalangan Dana</option>
                            @foreach($campaigns as $campaign)
                            <option value="{{ $campaign->id }}">{{ $campaign->campaign_title }}</option>
                            @endforeach
                        </select>
                        <small id="emailHelp" class="form-text text-muted">Biarkan kosong apabila informasi tidak berhubungan dangan salah satu penggalangan dana.</small>
                    </div>
                    <div class="form-group">
                        <label for="name">Foto</label>
                        <div class="image-wrapper row">
                            <div class="col-md-2">
                                <a target="_blank" href="{{ information_image_url($information->information_photo) }}">
                                    <img src="{{ information_image_url($information->information_photo) }}" class="img-thumbnail"
                                        width="70%">
                                </a>
                            </div>
                            <div class="col-md-10">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="information_photo"
                                        id="form_foto">
                                    <label class="custom-file-label" for="form_foto">Pilih Foto</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" name="information_description" id="form_deskripsi"
                            rows="2">{{ $information->information_description }}</textarea>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkboxPublish" name="publish"
                            @if($information->is_published) checked @endif>
                        <label class="form-check-label" for="checkboxPublish">Publikasikan Artikel</label>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('js')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('information_description');

</script>
@endsection
