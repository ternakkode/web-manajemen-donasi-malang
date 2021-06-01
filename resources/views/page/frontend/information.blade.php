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
                    @foreach($informations as $information)
                    <article>
                        <div class="post-item mb-30" data-aos="fade-up" data-aos-delay="100">
                            <div class="post-inner">
                                <div class="post-content">
                                    <div class="post-meta mb-20">
                                        <span>Ditulis Oleh : {{ $information->user->name }}</span>
                                        <span>{{ $information->category->information_category_name }}</span>
                                        <span>{{ indonesian_date($information->publish_date) }}</span>
                                    </div>
                                    <h4 class="post-title">
                                        <a href="{{ url('information/'.$information->id) }}">{{ $information->information_title }}</a>
                                    </h4>
                                    <div class="post-text mb-30">
                                        <p>{{ truncateDescription($information->information_description) }}</p>
                                    </div>
                                    <div class="post-btn">
                                        <a class="thm-btn thm-btn-4" href="{{ url('information/'.$information->id) }}">Baca Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    @endforeach
                    <div class="pagination-wrapper mt-55" data-aos="fade-up" data-aos-delay="100">
                        {{ $informations->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- news end -->
@endsection
