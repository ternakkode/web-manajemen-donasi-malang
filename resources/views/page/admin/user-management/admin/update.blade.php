@extends('layout')
@section('title', 'Ubah Admin')
@section('breadcrumbs')
<div class="breadcrumb-item"><a href="{{ url('admin/user-management/admin') }}">Admin</a></div>
<div class="breadcrumb-item">Ubah Admin</div>
@endsection
@section('content')
<form method="POST" action="{{ url('admin/user-management/admin/'.$user->id) }}">
    @method('PUT')
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
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                    </div>
                    <div class="form-group">
                        <label>Akses</label>
                        <select name="role_id" class="form-control" required>
                            <option selected disabled>Pilih Akses</option>
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}" @if($user->role_id == $role->id) selected @endif>{{ $role->role_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                        <small id="passwordHelp" class="form-text text-muted">Kosongi jika tidak ingin merubah password yang ada.</small>
                    </div>
                    <div class="form-group">
                        <label>No Telefon</label>
                        <input type="number" name="telephone" class="form-control" value="{{ $user->telephone }}">
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
