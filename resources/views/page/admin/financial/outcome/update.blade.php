@extends('layout')
@section('title', 'Ubah Pengeluaran')
@section('breadcrumbs')
<div class="breadcrumb-item"><a href="{{ url('admin/financial/pengeluaran') }}">Pengeluaran</a></div>
<div class="breadcrumb-item">Ubah Pengeluaran</div>
@endsection
@section('content')
<form method="POST" action="{{ url('admin/financial/outcome/'.$outcome->id) }}" enctype="multipart/form-data">
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
                        <label>Keperluan</label>
                        <input type="text" name="necessity" class="form-control" required value="{{ $outcome->necessity }}">
                    </div>
                    <div class="form-group">
                        <label for="">Penggalangan Dana</label>
                        <select class="form-control" name="campaign_id" id="form_kecamatan">
                            <option selected disabled>Pilih Penggalangan Dana</option>
                            @foreach($campaigns as $campaign)
                            <option value="{{ $campaign->id }}" @if($outcome->campaign_id == $campaign->id) selected @endif>{{ $campaign->campaign_title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Pengeluaran</label>
                        <input type="number" name="amount" class="form-control" value="{{ $outcome->amount }}" required>
                    </div>
                    <div class="form-group">
                        <label>Waktu Transaksi</label>
                        <input type="date" name="transaction_date" class="form-control"
                            value="{{ $outcome->transaction_date }}" required required>
                    </div>
                    <div class="form-group">
                        <label>Bukti Pembayaran</label>
                        <div class="image-wrapper row">
                            <div class="col-md-2">
                                <a target="_blank" href="{{ outcome_proof_url($outcome->proof) }}">
                                    <img src="{{ outcome_proof_url($outcome->proof) }}" class="img-thumbnail"
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
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="description"
                            style="min-height:100px">{{ $outcome->description }}</textarea>
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
