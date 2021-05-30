@extends('layout')
@section('title', 'Tambah Kategori Informasi')
@section('breadcrumbs')
<div class="breadcrumb-item"><a href="{{ url('admin/publication/information-category') }}">Kategori Informasi</a></div>
<div class="breadcrumb-item">Tambah Kategori Informasi</div>
@endsection
@section('content')
<form method="POST" action="{{ url('admin/publication/information-category') }}">
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
                        <label>Nama Kategori Informasi</label>
                        <input type="text" name="information_category_name" class="form-control" required>
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
