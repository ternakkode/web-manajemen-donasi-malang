@extends('layout')
@section('title', 'Tambah Kategori Penggalangan Dana')
@section('breadcrumbs')
<div class="breadcrumb-item"><a href="{{ url('admin/charity/campaign-type') }}">Kategori Penggalangan Dana</a></div>
<div class="breadcrumb-item">Tambah Kategori Penggalangan Dana</div>
@endsection
@section('content')
<form method="POST" action="{{ url('admin/charity/campaign-type') }}">
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
                        <label>Nama Kategori Penggalangan Dana</label>
                        <input type="text" name="campaign_type_name" class="form-control" required>
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
