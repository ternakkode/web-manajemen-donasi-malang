@extends('layout')
@section('title', 'Data Kategori Penggalangan Dana')
@section('breadcrumbs')
<div class="breadcrumb-item">Kategori Penggalangan Dana</div>
@endsection
@section('content')
<a href="{{ url('admin/charity/campaign-type/create') }}" class="btn btn-primary btn-sm" style="position:absolute;right:0">Tambah Kategori Penggalangan Dana</a>
<div class="row pt-5">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <table class="categoryTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Kategori Penggalangan Dana</th>
                            <th scope="col">Aksi</th>
                            <!-- TODO : tambahkan total dana terkumpul dan total campaign -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($campaignTypes as $key => $campaignType)
                        <tr>
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td>
                                {{ $campaignType->campaign_type_name }}
                            </td>
                            <td>
                                <a href="{{ url('admin/charity/campaign-type/'.$campaignType->id.'/edit') }}" class="btn btn-primary d-inline">Ubah</a>
                                <form method="POST" action="{{ url('admin/charity/campaign-type/'.$campaignType->id)}}"
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
