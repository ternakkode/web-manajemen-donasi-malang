@extends('frontend_layout')
@section('title', 'Detail Penggalangan Dana')
@section('content')
<!-- slider area start -->
<section class="page-title-area bg-overly slider-area slider-2" data-overlay="5"
    data-background="https://xpressrow.com/html/foundy/img/bg/slider-bg-01.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title text-center" data-aos="fade-up" data-aos-delay="100">
                    <h1>{{ $campaign->campaign_title }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="{{ ('') }}">Beranda</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Penggalangan Dana</li>
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
                            <div class="post-thumb mb-30" data-aos="fade-up" data-aos-delay="100">
                                <img src="https://xpressrow.com/html/foundy/img/news/news-feeds/news-feeds-01.jpg"
                                    alt="">
                            </div>
                            <div class="post-content">
                                <div class="post-meta mb-20" data-aos="fade-up" data-aos-delay="100">
                                    <span>Dimulai Pada : {{ indonesian_date($campaign->campaign_start_time) }}</span>
                                    <span>Selesai Pada : {{ indonesian_date($campaign->campaign_end_time) }}</span>
                                    @if (!$campaign->solia->isEmpty())
                                    <span>Sosok Mulia Yang Dibantu : @for($i=0;$i < count($campaign->solia); $i++) 
                                    <a target="_blank" href="{{ url('solia/'.$campaign->solia[$i]->id) }}">
                                        @if ($i == count($campaign->solia) - 1) {{ $campaign->solia[$i]->name }} @else {{ $campaign->solia[$i]->name. ',' }} @endif
                                    </a>
                                    @endfor</span>
                                    @endif
                                </div>
                                <div class="text mb-40" data-aos="fade-up" data-aos-delay="100">
                                    {!! $campaign->campaign_description !!}
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="campaign-wrapper text-center">
                                            <div class="campaign-head mb-45" data-aos="fade-up" data-aos-delay="100">
                                                <h5>Donasikan Sekarang Juga</h5>
                                            </div>
                                            <div class="campaign-progress" data-aos="fade-up" data-aos-delay="300">
                                                <div class="skill-bar mb-20" data-percentage="{{ $campaign->donations()->sum('amount')/$campaign->campaign_target * 100 }}%">
                                                    <h4 class="progress-title-holder">
                                                        <span class="progress-number-mark">
                                                            <span class="percent">{{ $campaign->donations()->sum('amount')/$campaign->campaign_target * 100 }}%</span>
                                                        </span>
                                                    </h4>
                                                    <div class="progress-content-outter">
                                                        <div class="progress-content" style="width: {{ $campaign->donations()->sum('amount')/$campaign->campaign_target * 100 }}%;"></div>
                                                    </div>
                                                </div>
                                                <div class="campaign-rate clearfix">
                                                    <div class="raisd">
                                                        <p style="color:black">Terkumpul <span>Rp. {{ number_formatting($campaign->donations()->sum('amount')) }}</span></p>
                                                    </div>
                                                    <div class="goal">
                                                        <p style="color:black">Target <span>Rp. {{ number_formatting($campaign->campaign_target) }}</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="campaign-btn" data-aos="fade-up" data-aos-delay="500">
                                                <a href="{{ url('donation?campaign_id='.$campaign->id) }}" class="thm-btn">Donasi</a>
                                            </div>
                                        </div>
                                    </div>
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
