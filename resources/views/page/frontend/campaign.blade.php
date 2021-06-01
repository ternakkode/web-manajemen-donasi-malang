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
            @foreach($campaigns as $campaign)
            <div class="col-lg-4 col-md-6">
                <a href="{{ url('campaign/'.$campaign->id) }}">
                    <div class="causes-single mb-30" data-aos="fade-up" data-aos-delay="100">
                        <div class="causes-thumb">
                            @foreach($campaign->photos as $photo)
                            @if($photo->is_primary)
                            <img src="{{ campaign_image_link($photo->campaign_photo_url) }}" alt=""
                                style="height:300px">
                            @endif
                            @endforeach
                        </div>
                        <div class="causes-content" style="height:250px">
                            <div class="causes-head clearfix mb-10">
                                <h4><a href="{{ url('campaign/'.$campaign->id) }}">{{ $campaign->campaign_title }}</a>
                                </h4>
                                <span> Berakhir {{ indonesian_date($campaign->campaign_end_time) }}</span>
                            </div>
                            <div class="causes-text mb-25">
                                <p>{{ truncateDescription($campaign->campaign_description) }}</p>
                            </div>
                            <div class="all-skill-bar">
                                <div class="skill-bar"
                                    data-percentage="{{ $campaign->donations()->sum('amount')/$campaign->campaign_target * 100 }}%">
                                    <h4 class="progress-title-holder">
                                        <span class="progress-number-mark">
                                            <span
                                                class="percent">{{ $campaign->donations()->sum('amount')/$campaign->campaign_target * 100 }}%</span>
                                        </span>
                                    </h4>
                                    <div class="progress-content-outter">
                                        <div class="progress-content"
                                            style="width: {{ $campaign->donations()->sum('amount')/$campaign->campaign_target * 100 }}%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="raised">
                                <li>
                                    <h5>Target</h5>
                                    <span class="rate">Rp. {{ number_formatting($campaign->campaign_target) }}</span>
                                </li>
                                <li>
                                    <h5>Terkumpul</h5>
                                    <span class="rate">Rp.
                                        {{ number_formatting($campaign->donations()->sum('amount')) }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12">
                <div class="pagination-wrapper text-center mt-35" data-aos="fade-up" data-aos-delay="100">
                    {{ $campaigns->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- news end -->
@endsection
