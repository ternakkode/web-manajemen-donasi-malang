@extends('layout')
@section('title', 'Ubah Penggalangan Dana')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css"
    integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
    crossorigin="anonymous" />
@endsection
@section('breadcrumbs')
<div class="breadcrumb-item"><a href="{{ url('admin/charity/campaign') }}">Penggalangan Dana</a></div>
<div class="breadcrumb-item">Ubah Penggalangan Dana</div>
@endsection
@section('content')
<form method="POST" action="{{ url('admin/charity/campaign/'.$campaign->id) }}">
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
                        <label>Kategori Penggalangan Dana</label>
                        <select class="form-control" name="campaign_type_id" id="form_kecamatan">
                            <option selected disabled>Pilih Kategori Penggalangan Dana</option>
                            @foreach($campaignTypes as $campaignType)
                            <option value="{{ $campaignType->id }}" @if($campaign->campaign_type_id ==
                                $campaignType->id) selected @endif>{{ $campaignType->campaign_type_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Penggalangan Dana</label>
                        <input type="text" name="campaign_title" class="form-control"
                            value="{{ $campaign->campaign_title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <div class="row mb-4 campaign-image-wrapper">
                            @foreach($campaign->photos as $photo)
                            <div class="col-md-3 mx-1 text-center">
                                <a href="{{ campaign_image_link($photo->campaign_photo_url) }}"></a><img
                                    src="{{ campaign_image_link($photo->campaign_photo_url) }}" class="img-thumbnail"
                                    style="max-height:200px"></a>
                                <div class="campaign-img-cta mt-2 text-center">
                                    @if(!$photo->is_primary)
                                    <button type="button"
                                        class="btn btn-primary btn-sm d-inline btn-set-primary-image mr-1"
                                        data-id="{{ $photo->id }}" data-campaign="{{ $campaign->id }}">JADIKAN UTAMA</button>
                                    @endif

                                    <button type="button" class="btn btn-danger btn-sm d-inline btn-delete-image"
                                        data-id="{{ $photo->id }}" data-campaign="{{ $campaign->id }}">HAPUS</button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="needsclick dropzone" id="document-dropzone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" name="campaign_description" id="form_deskripsi"
                            rows="2">{{ $campaign->campaign_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Target Penggalangan Dana (dalam rupiah)</label>
                        <input type="text" name="campaign_target" class="form-control" required value="{{ $campaign->campaign_target }}">
                    </div>
                    <div class="form-group">
                        <label>Waktu Penggalangan Dana Ditutup</label>
                        <input type="date" name="campaign_end_time" class="form-control" required value="{{ $campaign->campaign_end_time }}">
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
                                        <input class="form-check" type="checkbox" name="solia[]"
                                            value="{{ $solia->id }}" style="width:20px;height:20px" @foreach($campaign->solia as $s) @if($s->id == $solia->id) checked @endif @endforeach>
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

    function updateDomFoto(campaignPhotos) {
        let html = '';
        campaignPhotos.forEach(function (photo) {
            html += `<div class="col-md-3 mx-1">
                    <img src="/storage/images/campaign/${photo.campaign_photo_url}" class="img-thumbnail">
                    <div class="campaign-img-cta mt-2 text-center">`

            if (!photo.is_primary) {
                html += `<button type="button" class="btn btn-primary btn-sm d-inline btn-set-primary-image mr-1"
                    data-id="${photo.id}"
                    data-campaign="${photo.campaign_id}"
                    >JADIKAN UTAMA</button>`;
            }

            html += `<button type="button" class="btn btn-danger btn-sm d-inline btn-delete-image" 
                    data-id="${photo.id}"
                    data-campaign="${photo.campaign_id}"
                    >HAPUS</button>
                    </div>
                    </div>`;
        });
        
        $('.campaign-image-wrapper').html(html);
    }

    $('.campaign-image-wrapper').on('click', '.btn-set-primary-image', function () {
        let campaignId = $(this).data('campaign');
        let photoId = $(this).data('id');

        $.ajax({
            type: 'PATCH',
            url: `/api/campaign/${campaignId}/image/${photoId}`,
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            },
            success: function (response) {
                updateDomFoto(response);
            }
        })
    });

    $('.campaign-image-wrapper').on('click', '.btn-delete-image', function () {
        let campaignId = $(this).data('campaign');
        let photoId = $(this).data('id');

        $.ajax({
            type: 'DELETE',
            url: `/api/campaign/${campaignId}/image/${photoId}`,
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
