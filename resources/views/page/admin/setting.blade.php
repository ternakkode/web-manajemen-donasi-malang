@extends('layout')
@section('title', 'Pengaturan')
@section('breadcrumbs')
<div class="breadcrumb-item">Pengaturan</div>
@endsection
@section('content')
<form method="POST" action="{{ url('admin/setting') }}">
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
                        <label>Tata Cara Donasi</label>
                        <textarea class="form-control" name="tata_cara_donasi" style="min-height:250px">{{ $tata_cara_donasi }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Penggalangan Dana Utama</label>
                        <select name="campaign_utama" class="form-control" required>
                            <option @if($campaign_utama == null) selected @endif disabled>Pilih Penggalangan Dana Utama</option>
                            @foreach($campaigns as $campaign)
                                <option value="{{ $campaign->id }}" @if($campaign->id == $campaign_utama) selected @endif>{{ $campaign->campaign_title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Informasi Untuk Pengurus</label>
                        <textarea class="form-control" name="pengumuman" style="min-height:250px">{{ $pengumuman }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Email</label>
                        <input class="form-control" type="text" name="email" value="{{ $email }}">
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Whatsapp</label>
                        <input class="form-control" type="text" name="whatsapp" value="{{ $whatsapp }}">
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
@if (session('success_message'))
<script type="text/javascript">
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{session('success_message') }}'
    })

</script>
@elseif (session('failed_message'))
<script type="text/javascript">
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: '{{session('failed_message') }}'
    })
</script>
@endif
@endsection