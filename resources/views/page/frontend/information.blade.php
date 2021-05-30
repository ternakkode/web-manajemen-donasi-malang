@extends('frontend_layout')
@section('title', 'Informasi')
@section('content')
<!-- slider area start -->
<section class="page-title-area bg-overly slider-area slider-2" data-overlay="5"
    data-background="https://xpressrow.com/html/foundy/img/bg/slider-bg-01.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title text-center" data-aos="fade-up" data-aos-delay="100">
                    <h1>Informasi</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="{{ ('') }}">Beranda</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Informasi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- page title end -->

<!-- news feeds start -->
<section class="news-feeds-area pt-120 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="news-wrapper mb-40">
                    <article>
                        <div class="post-item mb-30" data-aos="fade-up" data-aos-delay="100">
                            <div class="post-inner">
                                <div class="post-content">
                                    <div class="post-meta mb-20">
                                        <span>Ditulis Oleh : Firhan</span>
                                        <span>Update Penggalangan Dana</span>
                                        <span>21 September 2021</span>
                                    </div>
                                    <h4 class="post-title">
                                        <a href="news-details.html">Rorem ipsum dolor sit amet, consectetur adipisicing
                                            elit, sed do eiusmod tempor incididunt</a>
                                    </h4>
                                    <div class="post-text mb-30">
                                        <p>Rorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna a liqua. Ut enim ad minim
                                            veniam, quis nostrud exerc itaullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor.</p>
                                    </div>
                                    <div class="post-btn">
                                        <a class="thm-btn thm-btn-4" href="news-details.html">Baca Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <div class="pagination-wrapper mt-55" data-aos="fade-up" data-aos-delay="100">
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
    </div>
</section>
<!-- news end -->
@endsection
