@extends('layout')
@section('title', 'Tambah Pertanyaan Umum')
@section('breadcrumbs')
<div class="breadcrumb-item"><a href="{{ url('admin/publication/faq') }}">Pertanyaan Umum</a></div>
<div class="breadcrumb-item">Tambah Pertanyaan Umum</div>
@endsection
@section('content')
<form method="POST" action="{{ url('admin/publication/faq') }}">
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
                        <label>Pertanyaan</label>
                        <input type="text" name="question" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Jawaban</label>
                        <textarea class="form-control" name="answer" style="min-height:100px">-</textarea>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="checkboxPublish" name="is_published">
                            <label class="form-check-label" for="checkboxPublish">Publikasikan Pertanyaan</label>
                        </div>
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
