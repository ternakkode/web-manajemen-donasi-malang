@extends('layout')
@section('title', 'Tambah Donasi')
@section('breadcrumbs')
<div class="breadcrumb-item"><a href="{{ url('admin/financial/donation') }}">Donasi</a></div>
<div class="breadcrumb-item">Tambah Donasi</div>
@endsection
@section('content')
<form method="POST" action="{{ url('admin/financial/donation') }}" enctype="multipart/form-data">
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
                        <label>Nama Donatur</label>
                        <input type="text" name="donatur_name" class="form-control" required>
                        <small id="emailHelp" class="form-text text-muted">Biarkan kosong jika donatur tidak ingin menyebutkan namanya.</small>
                    </div>
                    <div class="form-group">
                        <label for="">Penggalangan Dana</label>
                        <select class="form-control" name="campaign_id" id="form_kecamatan">
                            <option selected disabled>Pilih Penggalangan Dana</option>
                            @foreach($campaigns as $campaign)
                            <option value="{{ $campaign->id }}">{{ $campaign->campaign_title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Waktu Donasi</label>
                        <input type="date" name="donation_time" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Donasi</label>
                        <input type="number" name="amount" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Pesan Donasi</label>
                        <textarea name="message" class="form-control" id="exampleFormControlTextarea1"
                            style="min-height:100px;"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Bukti Donasi</label>
                        <div class="custom-file">
                            <input name="donation_proof" type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
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
