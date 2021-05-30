@extends('frontend_layout')
@section('title', 'Penggalangan Dana')
@section('content')
<section class="page-title-area bg-overly slider-area slider-2" data-overlay="5"
    data-background="https://xpressrow.com/html/foundy/img/bg/slider-bg-01.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title text-center" data-aos="fade-up" data-aos-delay="100">
                    <h1>Penggalangan Dana</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="{{ ('') }}">Beranda</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Penggalangan Dana</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider area start -->
<section class="causes-area gray-bg pt-120 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <a href="#">
                    <div class="causes-single mb-30" data-aos="fade-up" data-aos-delay="100">
                        <div class="causes-thumb">
                            <img src="https://xpressrow.com/html/foundy/img/causes/causes-01.jpg" alt="">
                        </div>
                        <div class="causes-content">
                            <div class="causes-head clearfix mb-10">
                                <h4><a href="causes-details.html">Lorem Ipsum Dolor Sit Amet Mas</a></h4>
                                <span> Berakhir 3 Mei 2021</span>
                            </div>
                            <div class="causes-text mb-25">
                                <p>Rorem ipsum dolor sit amet, consecteadi pisicing elit, sed do eiusmod temincididunt
                                    ut
                                    labore et dolore magna aliqua. Utele enimey.</p>
                            </div>
                            <div class="all-skill-bar">
                                <div class="skill-bar" data-percentage="73%">
                                    <h4 class="progress-title-holder">
                                        <span class="progress-number-mark">
                                            <span class="percent">73%</span>
                                        </span>
                                    </h4>
                                    <div class="progress-content-outter">
                                        <div class="progress-content" style="width: 73%;"></div>
                                    </div>
                                </div>
                            </div>
                            <ul class="raised">
                                <li>
                                    <h5>Target</h5>
                                    <span class="rate">Rp. 2.000.000</span>
                                </li>
                                <li>
                                    <h5>Terkumpul</h5>
                                    <span class="rate">Rp. 300.000</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="pagination-wrapper text-center mt-35" data-aos="fade-up" data-aos-delay="100">
                    <ul>
                        <li><a href="#"><i class="fas fa-angle-double-left"></i></a></li>
                        <li><a href="#">01</a></li>
                        <li class="active"><a href="#">02</a></li>
                        <li><a href="#">03</a></li>
                        <li><a href="#"><i class="fas fa-ellipsis-h"></i></a></li>
                        <li><a href="#"><i class="fas fa-angle-double-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- news end -->
@endsection
