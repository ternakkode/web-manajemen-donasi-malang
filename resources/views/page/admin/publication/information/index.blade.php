@extends('layout')
@section('title', 'Data Informasi')
@section('breadcrumbs')
<div class="breadcrumb-item">Informasi</div>
@endsection
@section('content')
<a href="{{ url('admin/publication/information/create') }}" class="btn btn-primary btn-sm" style="position:absolute;right:0">Tambah Informasi</a>
<div class="row pt-5">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <table class="categoryTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($informations as $key => $information)
                        <tr>
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td>
                                {{ $information->information_title }}
                            </td>
                            <td>
                                {{ $information->category->information_category_name }}
                            </td>
                            <td>
                                {{ $information->user->name }}
                            </td>
                            <td>
                                {{ $information->is_published ? 'Telah Publish' : 'Draft' }}
                            </td>
                            <td>
                                <a href="{{ url('admin/publication/information/'.$information->id.'/edit') }}" class="btn btn-primary d-inline">Ubah</a>
                                <form method="POST" action="{{ url('admin/publication/information/'.$information->id)}}"
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
