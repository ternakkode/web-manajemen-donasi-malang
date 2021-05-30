@extends('layout')
@section('title', 'Halaman Awal')
@section('breadcrumbs')
<div class="breadcrumb-item">Halaman Awal</div>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-hand-holding-usd"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Penggalangan Dana</h4>
                </div>
                <div class="card-body">
                    {{ $total_campaign }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fas fa-people-carry"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Donatur</h4>
                </div>
                <div class="card-body">
                    {{ $total_donation }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="far fas fa-people-carry"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Solia</h4>
                </div>
                <div class="card-body">
                    {{ $total_solia }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Informasi</h4>
                </div>
                <div class="card-body">
                    {{ $total_information }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h4>Informasi Untuk Pengurus</h4>
    </div>
    <div class="card-body">
        {{ $pengumuman }}
    </div>
</div>
@endsection
@section('js')
@if (session('success_message'))
<script type="text/javascript">
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{session('
        success_message ') }}'
    })

</script>
@elseif (session('failed_message'))
<script type="text/javascript">
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: '{{session('
        failed_message ') }}'
    })

</script>
@endif
@endsection
