@extends('layout')
@section('title', 'Ubah Solia')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css"
    integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
    crossorigin="anonymous" />
@endsection
@section('breadcrumbs')
<div class="breadcrumb-item"><a href="{{ url('admin/charity/solia') }}">Solia</a></div>
<div class="breadcrumb-item">Ubah Solia</div>
@endsection
@section('content')
<form method="POST" action="{{ url('admin/charity/solia/'.$solia->id) }}" enctype="multipart/form-data">
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
                        <input type="text" name="name" class="form-control" required value="{{ $solia->name }}">
                    </div>
                    <div class="form-group">
                        <label>Lokasi</label>
                        <textarea name="location" class="form-control" id="exampleFormControlTextarea1"
                            style="min-height:100px;">{{ $solia->location }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1"
                            style="min-height:100px;">{{ $solia->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Penggalangan Dana</label>
                        <select class="form-control" name="campaign_id" id="form_kecamatan">
                            <option selected disabled>Pilih Penggalangan Dana</option>
                            @foreach($campaigns as $campaign)
                            <option value="{{ $campaign->id }}" @if($solia->campaign_id == $campaign->id) selected @endif>{{ $campaign->campaign_title }}</option>
                            @endforeach
                        </select>
                        <small id="emailHelp" class="form-text text-muted">Biarkan kosong apabila sosok mulia tidak
                            diikutkan pada penggalangan dana.</small>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <div class="row mb-4 solia-image-wrapper">
                            @foreach($solia->photos as $photo)
                            <div class="col-md-3 mx-1 text-center">
                                <a href="{{ solia_image_link($photo->solia_photo_url) }}"></a><img src="{{ solia_image_link($photo->solia_photo_url) }}" class="img-thumbnail" style="max-height:200px"></a>
                                <div class="solia-img-cta mt-2 text-center">
                                    @if(!$photo->is_primary)
                                    <button type="button"
                                        class="btn btn-primary btn-sm d-inline btn-set-primary-image mr-1"
                                        data-id="{{ $photo->id }}" data-solia="{{ $solia->id }}">JADIKAN UTAMA</button>
                                    @endif

                                    <button type="button" class="btn btn-danger btn-sm d-inline btn-delete-image"
                                        data-id="{{ $photo->id }}" data-solia="{{ $solia->id }}">HAPUS</button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="needsclick dropzone" id="document-dropzone">
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
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"
    integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w=="
    crossorigin="anonymous"></script>
<script>
    let uploadedDocumentMap = {}
    Dropzone.options.documentDropzone = {
        url: '{{ url('api/solia/image') }}',
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

    function updateDomFoto(soliaPhotos) {
        let html = '';
        soliaPhotos.forEach(function (photo) {
            html += `<div class="col-md-3 mx-1">
                    <img src="/storage/images/solia/${photo.solia_photo_url}" class="img-thumbnail">
                    <div class="solia-img-cta mt-2 text-center">`

            if (!photo.is_primary) {
                html += `<button type="button" class="btn btn-primary btn-sm d-inline btn-set-primary-image mr-1"
                    data-id="${photo.id}"
                    data-solia="${photo.solia_id}"
                    >JADIKAN UTAMA</button>`;
            }

            html += `<button type="button" class="btn btn-danger btn-sm d-inline btn-delete-image" 
                    data-id="${photo.id}"
                    data-solia="${photo.solia_id}"
                    >HAPUS</button>
                    </div>
                    </div>`;
        });
        
        $('.solia-image-wrapper').html(html);
    }

    $('.solia-image-wrapper').on('click', '.btn-set-primary-image', function () {
        let soliaId = $(this).data('solia');
        let photoId = $(this).data('id');

        $.ajax({
            type: 'PATCH',
            url: `/api/solia/${soliaId}/image/${photoId}`,
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            },
            success: function (response) {
                updateDomFoto(response);
            }
        })
    });

    $('.solia-image-wrapper').on('click', '.btn-delete-image', function () {
        let soliaId = $(this).data('solia');
        let photoId = $(this).data('id');

        $.ajax({
            type: 'DELETE',
            url: `/api/solia/${soliaId}/image/${photoId}`,
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            },
            success: function (response) {
                updateDomFoto(response);
            }
        })
    });
</script>
@endsection
