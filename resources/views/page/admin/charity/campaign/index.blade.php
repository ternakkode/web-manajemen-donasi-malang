@extends('layout')
@section('title', 'Data Penggalangan Dana')
@section('breadcrumbs')
<div class="breadcrumb-item">Penggalangan Dana</div>
@endsection
@section('content')
<a href="{{ url('admin/charity/campaign/create') }}" class="btn btn-primary btn-sm" style="position:absolute;right:0">Tambah Penggalangan Dana</a>
<div class="row pt-5">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <table class="categoryTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Target</th>
                            <th scope="col">Terkumpul</th>
                            <th scope="col">Terpakai</th>
                            <th scope="col">Waktu Mulai</th>
                            <th scope="col">Waktu Selesai</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($campaigns as $key => $campaign)
                        <tr>
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td>
                                {{ $campaign->campaignType->campaign_type_name }}
                            </td>
                            <td>
                                {{ $campaign->campaign_title }}
                            </td>
                            <td>
                                Rp. {{ number_formatting($campaign->campaign_target) }}
                            </td>
                            <td>
                                Rp. {{ number_formatting($campaign->donations()->sum('amount')) }}
                            </td>
                            <td>
                                Rp. {{ number_formatting($campaign->outcomes()->sum('amount')) }}
                            </td>
                            <td>
                                {{ indonesian_date($campaign->campaign_start_time) }}
                            </td>
                            <td>
                                {{ indonesian_date($campaign->campaign_end_time) }}
                            </td>
                            <td>
                                <a href="{{ url('admin/charity/campaign/'.$campaign->id.'/edit') }}" class="btn btn-primary d-inline">Ubah</a>
                                <form method="POST" action="{{ url('admin/charity/campaign/'.$campaign->id)}}"
                                    class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('.categoryTable').DataTable();
    });
</script>
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
