@extends('frontend_layout')
@section('title', 'Sosok Mulia')
@section('content')
<section class="page-title-area bg-overly slider-area slider-2" data-overlay="5"
    data-background="https://xpressrow.com/html/foundy/img/bg/slider-bg-01.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title text-center" data-aos="fade-up" data-aos-delay="100">
                    <h1>Sosok Mulia</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="{{ ('') }}">Beranda</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Solia</li>
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
                <div class="causes-single mb-30" data-aos="fade-up" data-aos-delay="100">
                    <div class="causes-thumb">
                        <img src="https://xpressrow.com/html/foundy/img/causes/causes-08.jpg" alt="">
                    </div>
                    <div class="causes-content">
                        <div class="causes-head clearfix mb-10">
                            <h4><a href="causes-details.html">Food For Israfil</a></h4>
                        </div>
                        <div class="causes-text mb-25">
                            <p>Rorem ipsum dolor sit amet, consecteadi pisicing elit, sed do eiusmod temincididunt ut
                                labore et dolore magna aliqua. Utele enimey.</p>
                        </div>
                    </div>
                </div>
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
