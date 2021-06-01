@extends('frontend_layout')
@section('title', 'Detail Informasi')
@section('content')
<!-- slider area start -->
<section class="page-title-area bg-overly slider-area slider-2" data-overlay="5"
    data-background="https://xpressrow.com/html/foundy/img/bg/slider-bg-01.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title text-center" data-aos="fade-up" data-aos-delay="100">
                    <h1>{{ $information->information_title }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="{{ ('') }}">Beranda</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Informasi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- page title end -->

<section class="news-feeds-area pt-120 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="news-wrapper mb-40">
                    <article>
                        <div class="single-news-post mb-30">
                            <div class="post-thumb mb-30 text-center" data-aos="fade-up" data-aos-delay="100">
                                <img src="{{ information_image_url($information->information_photo) }}" alt="" style="height:60vh;width: auto;">
                            </div>
                            <div class="post-content">
                                <div class="post-meta mb-20" data-aos="fade-up" data-aos-delay="100">
                                        <span>Ditulis Oleh : {{ $information->user->name }}</span>
                                        <span>{{ $information->category->information_category_name }}</span>
                                        <span>{{ indonesian_date($information->publish_date) }}</span>
                                </div>
                                <div class="text mb-40" data-aos="fade-up" data-aos-delay="100">
                                    {!! $information->information_description !!}
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
