@extends('layout')
@section('title', 'Ubah Donasi')
@section('breadcrumbs')
<div class="breadcrumb-item"><a href="{{ url('admin/financial/donation') }}">Donasi</a></div>
<div class="breadcrumb-item">Ubah Donasi</div>
@endsection
@section('content')
<form method="POST" action="{{ url('admin/financial/donation/'.$donation->id) }}" enctype="multipart/form-data">
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
                        <label>Nama Donatur</label>
                        <input type="text" name="donatur_name" class="form-control" value="{{ $donation->donatur_name }}" required>
                        <small id="emailHelp" class="form-text text-muted">Biarkan kosong jika donatur tidak ingin
                            menyebutkan namanya.</small>
                    </div>
                    <div class="form-group">
                        <label for="">Penggalangan Dana</label>
                        <select class="form-control" name="campaign_id" id="form_kecamatan">
                            <option selected disabled>Pilih Penggalangan Dana</option>
                            @foreach($campaigns as $campaign)
                            <option value="{{ $campaign->id }}" @if($campaign->id == $donation->campaign_id) selected
                                @endif>{{ $campaign->campaign_title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Waktu Donasi</label>
                        <input type="date" name="donation_time" class="form-control" value="{{ $donation->donation_time }}" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Donasi</label>
                        <input type="number" name="amount" class="form-control" value="{{ $donation->amount }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Pesan Donasi</label>
                        <textarea name="message" class="form-control" id="exampleFormControlTextarea1"
                            style="min-height:100px;">{{ $donation->message }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Bukti Donasi</label>
                        <div class="image-wrapper row">
                            <div class="col-md-2">
                                <a target="_blank" href="{{ donation_proof_url($donation->donation_proof) }}">
                                    <img src="{{ donation_proof_url($donation->donation_proof) }}" class="img-thumbnail"
                                        width="70%">
                                </a>
                            </div>
                            <div class="col-md-10">
                                <div class="custom-file">
                                    <input name="proof" type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
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
