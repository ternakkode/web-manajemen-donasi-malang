@extends('layout')
@section('title', 'Tambah Pengeluaran')
@section('breadcrumbs')
<div class="breadcrumb-item"><a href="{{ url('admin/financial/outcome') }}">Pengeluaran</a></div>
<div class="breadcrumb-item">Tambah Pengeluaran</div>
@endsection
@section('content')
<form method="POST" action="{{ url('admin/financial/outcome') }}" enctype="multipart/form-data">
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
                        <input type="text" name="necessity" class="form-control" required>
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
                        <label>Jumlah Pengeluaran</label>
                        <input type="number" name="amount" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Waktu Transaksi</label>
                        <input type="date" name="transaction_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Bukti Pembayaran</label>
                        <div class="custom-file">
                            <input name="proof" type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="description" style="min-height:100px">-</textarea>
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
