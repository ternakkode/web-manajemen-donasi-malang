@extends('frontend_layout')
@section('title', 'Beranda')
@section('content')
<!-- slider area start -->
<section class="slider-area">
    <div class="slider-active">
        <div class="single-slider slider-height d-flex align-items-center"
            data-background="https://xpressrow.com/html/foundy/img/bg/slider-bg-01.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-8 offset-lg-2 offset-xl-3">
                        <div class="slider-content text-center">
                            <div class="silder-text">
                                <div class="slider-caption">
                                    <h1 data-animation="fadeInUp" data-delay=".2s">Ketimbang Ngemis Malang</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- causes start -->
<section class="causes-area gray-bg pt-120 pb-90">
    <div class="container">
        <div class="section-title text-center" data-aos="fade-up" data-aos-delay="100">
            <div class="bg-title">
                <h1>Penggalangan Dana</h1>
            </div>
            <h5>Bantu Sedikit Meringankan Beban Para Sosok Mulia</h5>
            <h2>Penggalangan Dana</h2>
        </div>
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
    </div>
</section>

<!-- news start -->
<section class="news-area gray-bg pt-120 pb-90">
    <div class="container">
        <div class="section-title text-center" data-aos="fade-up" data-aos-delay="100">
            <div class="bg-title">
                <h1>UPDATE</h1>
            </div>
            <h5>Informasi</h5>
            <h2>Informasi Terbaru</h2>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="news-single mb-30" data-aos="fade-up" data-aos-delay="100">
                    <div class="news-thumb">
                        <a href="news-details.html">
                            <img src="https://xpressrow.com/html/foundy/img/news/news-01.jpg" alt="">
                        </a>
                    </div>
                    <div class="news-content">
                        <div class="news-head">
                            <span>Update Penggalangan Dana</span>
                            <h3><a href="news-details.html">School Students Need Food.</a></h3>
                        </div>
                        <div class="news-text">
                            <p>Rorem ipsum dolor sit amet, consecteadipis icing deiusmod temincididunt ut labore of
                                marky.</p>
                        </div>
                        <div class="news-btn">
                            <a href="news-details.html">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- news end -->
@endsection
