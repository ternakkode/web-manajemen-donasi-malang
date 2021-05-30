@extends('layout')
@section('title', 'Data Donasi')
@section('breadcrumbs')
<div class="breadcrumb-item">Donasi</div>
@endsection
@section('content')
<a href="{{ url('admin/financial/donation/create') }}" class="btn btn-primary btn-sm"
    style="position:absolute;right:0">Tambah Donasi</a>
<div class="row pt-5">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <table class="userTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Donatur</th>
                            <th scope="col">Penggalangan Dana</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Waktu Donasi</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($donations as $key => $donation)
                        <tr>
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td>
                                {{ $donation->donatur_name }}
                            </td>
                            <td>
                                {{ $donation->campaign->campaign_title }}
                            </td>
                            <td>
                                Rp. {{ number_formatting($donation->amount) }}
                            </td>
                            <td>
                                {{ indonesian_date($donation->donation_time) }}
                            </td>
                            <td>
                                @switch($donation->status)
                                @case(0)
                                Donasi Tidak Valid
                                @break
                                @case(1)
                                Donasi Terkonfirmasi
                                @break
                                @case(9)
                                <form method="POST"
                                    action="{{ url('admin/financial/donation/'.$donation->id.'/approval')}}"
                                    class="d-inline">
                                    @method('PATCH')
                                    @csrf
                                    <button type="submit" name="status" value="approve" class="btn btn-success btn-sm">Konfirmasi</button>
                                    <button type="submit" name="status" value="decline" class="btn btn-danger btn-sm">Tidak Valid</button>
                                </form>
                                @break
                                @default
                                @break
                                @endswitch
                            </td>
                            <td>
                                <a href="{{ donation_proof_url($donation->donation_proof) }}" target="_blank"
                                    class="btn btn-warning d-inline">Bukti Donasi</a>
                                <a href="{{ url('admin/financial/donation/'.$donation->id.'/edit') }}"
                                    class="btn btn-primary d-inline">Ubah</a>
                                <form method="POST" action="{{ url('admin/financial/donation/'.$donation->id)}}"
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
        $('.userTable').DataTable();
    });

</script>
@if (session('success_message'))
<script type="text/javascript">
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session('success_message') }}'
    })

</script>
@elseif (session('failed_message'))
<script type="text/javascript">
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: '{{ session('failed_message') }}'
    })

</script>
@endif
@endsection
