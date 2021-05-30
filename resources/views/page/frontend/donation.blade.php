@extends('frontend_layout')
@section('title', 'Form Donasi')
@section('content')
<section class="page-title-area bg-overly slider-area slider-2" data-overlay="5"
    data-background="https://xpressrow.com/html/foundy/img/bg/slider-bg-01.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title text-center" data-aos="fade-up" data-aos-delay="100">
                    <h1>Form Donasi</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="{{ ('') }}">Beranda</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Form Donasi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider area start -->
<section class="causes-details pt-120 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="causes-dtls-content">
                    <div class="donate-amount mb-35">
                        <div class="donate-title mb-35" data-aos="fade-up" data-aos-delay="100">
                            <h3>Tata Cara Donasi</h3>
                            <p></p>
                        </div>
                    </div>
                    <form class="give-form" action="#">
                        <div class="form-title" data-aos="fade-up" data-aos-delay="300">
                            <h3>Form Donasi</h3>
                        </div>
                        <div class="row" data-aos="fade-up" data-aos-delay="300">
                            <div class="col-xl-12">
                                <label>Penggalangan Dana<span> *</span></label>
                                <input type="text" name="fname">
                            </div>
                            <div class="col-xl-12">
                                <label>Nama Lengkap<span> *</span></label>
                                <input type="text" name="fname">
                            </div>
                            <div class="col-xl-12">
                                <label>Jumlah Donasi<span> *</span></label>
                                <input type="number" name="lname">
                            </div>
                            <div class="col-xl-12">
                                <label>Pesan Yang Ingin Disampaikan<span> *</span></label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" style="min-height:200px"></textarea>
                            </div>
                            <div class="col-xl-12">
                                <label>Bukti Donasi<span>*</span></label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            <div class="col-xl-12">
                                <div class="form-bottom d-flex flex-wrap align-items-center justify-content-between w-100"
                                    data-aos="fade-up" data-aos-delay="100">
                                    <div class="form-btn mb-30">
                                        <button class="thm-btn thm-btn-3" type="submit">Konfirmasi</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- news end -->
@endsection
