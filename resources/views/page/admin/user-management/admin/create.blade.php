@extends('layout')
@section('title', 'Tambah Admin')
@section('breadcrumbs')
<div class="breadcrumb-item"><a href="{{ url('admin/user-management/admin') }}">Admin</a></div>
<div class="breadcrumb-item">Tambah Admin</div>
@endsection
@section('content')
<form method="POST" action="{{ url('admin/user-management/admin') }}">
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Akses</label>
                        <select name="role_id" class="form-control" required>
                            <option selected disabled>Pilih Akses</option>
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>No Telefon</label>
                        <input type="number" name="telephone" class="form-control" placeholder="+62xxxx" required>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
