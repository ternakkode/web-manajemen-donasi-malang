@extends('layout')
@section('title', 'Data Kategori Informasi')
@section('breadcrumbs')
<div class="breadcrumb-item">Kategori Informasi</div>
@endsection
@section('content')
<a href="{{ url('admin/publication/information-category/create') }}" class="btn btn-primary btn-sm" style="position:absolute;right:0">Tambah Kategori Informasi</a>
<div class="row pt-5">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <table class="categoryTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Kategori Informasi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($informationCategories as $key => $informationCategory)
                        <tr>
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td>
                                {{ $informationCategory->information_category_name }}
                            </td>
                            <td>
                                <a href="{{ url('admin/publication/information-category/'.$informationCategory->id.'/edit') }}" class="btn btn-primary d-inline">Ubah</a>
                                <form method="POST" action="{{ url('admin/publication/information-category/'.$informationCategory->id)}}"
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
