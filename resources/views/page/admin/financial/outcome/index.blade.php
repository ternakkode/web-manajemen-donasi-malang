@extends('layout')
@section('title', 'Data Pengeluaran')
@section('breadcrumbs')
<div class="breadcrumb-item">Pengeluaran</div>
@endsection
@section('content')
<a href="{{ url('admin/financial/outcome/create') }}" class="btn btn-primary btn-sm" style="position:absolute;right:0">Tambah Pengeluaran</a>
<div class="row pt-5">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <table class="userTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Keperluan</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Waktu Transaksi</th>
                            <th scope="col">Diubah Oleh</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($outcomes as $key => $outcome)
                        <tr>
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td>
                                {{ $outcome->necessity }}
                            </td>
                            <td>
                                Rp. {{ number_formatting($outcome->amount) }}
                            </td>
                            <td>
                                {{ indonesian_date($outcome->transaction_date) }}
                            </td>
                            <td>
                                {{ $outcome->user->name }}
                            </td>
                            <td>
                                <a href="{{ outcome_proof_url($outcome->proof) }}" target="_blank" class="btn btn-warning d-inline">Bukti Transfer</a>
                                <a href="{{ url('admin/financial/outcome/'.$outcome->id.'/edit') }}" class="btn btn-primary d-inline">Ubah</a>
                                <form method="POST" action="{{ url('admin/financial/outcome/'.$outcome->id)}}"
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
