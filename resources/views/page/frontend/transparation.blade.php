@extends('frontend_layout')
@section('title', 'Transparansi')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet"
    href="https://demo.getstisla.com/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="https://demo.getstisla.com/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
@endsection
@section('content')
<section class="page-title-area bg-overly slider-area slider-2" data-overlay="5"
    data-background="https://xpressrow.com/html/foundy/img/bg/slider-bg-01.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title text-center" data-aos="fade-up" data-aos-delay="100">
                    <h1>Transparasi Dana</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="{{ ('') }}">Beranda</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Transparasi Dana</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider area start -->
<section class="causes-area gray-bg pt-120 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-5">
                <h1 class="mb-5">Data Donasi</h1>
                <table class="table table-striped" id="donationTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Donatur</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Penggalangan Dana</th>
                            <th scope="col">Waktu Donasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($donations as $key => $donation)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $donation->donatur_name }}</td>
                            <td>Rp. {{ number_formatting($donation->amount) }}</td>
                            <td>{{ $donation->campaign->campaign_title }} </td>
                            <td>{{ indonesian_date($donation->donation_time) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 text-center">
                <h1 class="mb-5">Data Pengeluaran</h1>
                <table class="table table-striped" id="outcomeTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Keperluan</th>
                            <th scope="col">Sumber Dana</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Waktu Transaksi</th>
                            <th scope="col">Bukti Pengeluaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($outcomes as $key => $outcome)
                        <tr>
                            <th scope="row">{{ $key + 1}}</th>
                            <td>{{ $outcome->necessity }}</td>
                            <td>{{ $outcome->campaign->campaign_title }}</td>
                            <td>Rp. {{ number_formatting($outcome->amount) }}</td>
                            <td>{{ indonesian_date($outcome->transaction_date) }}</td>
                            <td><a target="_blank" href="{{ outcome_proof_url($outcome->proof) }}" class="btn btn-primary">Dokumen Bukti</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- news end -->
@endsection
@section('js')
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://demo.getstisla.com/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function () {
    $('#outcomeTable').DataTable();
    $('#donationTable').DataTable();
});
</script>
@endsection
