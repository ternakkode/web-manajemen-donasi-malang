@extends('layout')
@section('title', 'Tambah Penggalangan Dana')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css"
    integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
    crossorigin="anonymous" />
@endsection
@section('breadcrumbs')
<div class="breadcrumb-item"><a href="{{ url('admin/charity/campaign') }}">Penggalangan Dana</a></div>
<div class="breadcrumb-item">Tambah Penggalangan Dana</div>
@endsection
@section('content')
<form method="POST" action="{{ url('admin/charity/campaign') }}">
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
                        <label>Kategori Penggalangan Dana</label>
                        <select class="form-control" name="campaign_type_id" id="form_kecamatan">
                            <option selected disabled>Pilih Kategori Penggalangan Dana</option>
                            @foreach($campaignTypes as $campaignType)
                            <option value="{{ $campaignType->id }}">{{ $campaignType->campaign_type_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Penggalangan Dana</label>
                        <input type="text" name="campaign_title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <div class="needsclick dropzone" id="document-dropzone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" name="campaign_description" id="form_deskripsi"
                            rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Target Penggalangan Dana (dalam rupiah)</label>
                        <input type="text" name="campaign_target" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Waktu Penggalangan Dana Ditutup</label>
                        <input type="date" name="campaign_end_time" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Solia Yang Akan Didonasikan</label>
                        <table class="categoryTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Diikutkan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($solias as $key => $solia)
                                <tr>
                                    <td>
                                        {{ $key+1 }}
                                    </td>
                                    <td>
                                        {{ $solia->name }}
                                    </td>
                                    <td>
                                        <input class="form-check" type="checkbox" name="solia[]" value="{{ $solia->id }}" style="width:20px;height:20px">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <small id="emailHelp" class="form-text text-muted">Anda bisa tidak memilih solia yang akan
                            didonasikan.</small>
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
@section('js')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"
    integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w=="
    crossorigin="anonymous"></script>
<script>
    $('.categoryTable').DataTable();
    CKEDITOR.replace('campaign_description');
    let uploadedDocumentMap = {}
    Dropzone.options.documentDropzone = {
        url: '{{ url('api/campaign/image') }}',
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function (file, response) {
            $('form').append('<input type="hidden" name="foto[]" value="' + response.name + '">')
            uploadedDocumentMap[file.name] = response.name
        },
        removedfile: function (file) {
            file.previewElement.remove()
            let name = ''
            if (typeof file.file_name !== 'undefined') {
                name = file.file_name
            } else {
                name = uploadedDocumentMap[file.name]
            }
            $('form').find('input[name="foto[]"][value="' + name + '"]').remove()
        }
    }
</script>
@endsection
