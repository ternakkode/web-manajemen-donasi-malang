@extends('layout')
@section('title', 'Data Pertanyaan Umum')
@section('breadcrumbs')
<div class="breadcrumb-item">Pertanyaan Umum</div>
@endsection
@section('content')
<a href="{{ url('admin/publication/faq/create') }}" class="btn btn-primary btn-sm" style="position:absolute;right:0">Tambah Pertanyaan Umum</a>
<div class="row pt-5">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <table class="faqTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pertanyaan</th>
                            <th scope="col">Jawaban</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($faqs as $key => $faq)
                        <tr>
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td>
                                {{ $faq->question }}
                            </td>
                            <td>
                                {{ $faq->answer }}
                            </td>
                            <td>
                                @if ($faq->is_published) Dipublikasikan @else Draft @endif
                            </td>
                            <td>
                                <a href="{{ url('admin/publication/faq/'.$faq->id.'/edit') }}" class="btn btn-primary d-inline">Ubah</a>
                                <form method="POST" action="{{ url('admin/publication/faq/'.$faq->id)}}"
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
        $('.faqTable').DataTable();
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
