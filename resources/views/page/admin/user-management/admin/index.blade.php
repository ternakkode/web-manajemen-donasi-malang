@extends('layout')
@section('title', 'Data Admin')
@section('breadcrumbs')
<div class="breadcrumb-item">Admin</div>
@endsection
@section('content')
<a href="{{ url('admin/user-management/admin/create') }}" class="btn btn-primary btn-sm" style="position:absolute;right:0">Tambah Admin</a>
<div class="row pt-5">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <table class="adminTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">No Telefon</th>
                            <th scope="col">Akses</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $user)
                        <tr>
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                {{ $user->telephone }}
                            </td>
                            <td>
                                {{ $user->role->role_name }}
                            </td>
                            <td>
                                <a href="{{ url('admin/user-management/admin/'.$user->id.'/edit') }}"
                                    class="btn btn-primary d-inline">Ubah</a>
                                <form method="POST" action="{{ url('admin/user-management/admin/'.$user->id)}}"
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
        $('.adminTable').DataTable();
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
