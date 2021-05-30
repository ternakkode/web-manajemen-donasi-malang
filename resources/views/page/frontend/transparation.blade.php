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
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 text-center">
                <h1 class="mb-5">Data Pengeluaran</h1>
                <table class="table table-striped" id="outcomeTable">
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
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>@mdo</td>
                        </tr>
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
