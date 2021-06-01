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
            @foreach($campaigns as $campaign)
            <div class="col-lg-4 col-md-6">
                <a href="{{ url('campaign/'.$campaign->id) }}">
                    <div class="causes-single mb-30" data-aos="fade-up" data-aos-delay="100">
                        <div class="causes-thumb">
                            @foreach($campaign->photos as $photo)
                                @if($photo->is_primary)
                                <img src="{{ campaign_image_link($photo->campaign_photo_url) }}" alt="" style="height:300px">
                                @endif
                            @endforeach
                        </div>
                        <div class="causes-content" style="height:250px">
                            <div class="causes-head clearfix mb-10">
                                <h4><a href="{{ url('campaign/'.$campaign->id) }}">{{ $campaign->campaign_title }}</a></h4>
                                <span> Berakhir {{ indonesian_date($campaign->campaign_end_time) }}</span>
                            </div>
                            <div class="causes-text mb-25">
                                <p>{{ truncateDescription($campaign->campaign_description) }}</p>
                            </div>
                            <div class="all-skill-bar">
                                <div class="skill-bar" data-percentage="{{ $campaign->donations()->sum('amount')/$campaign->campaign_target * 100 }}%">
                                    <h4 class="progress-title-holder">
                                        <span class="progress-number-mark">
                                            <span class="percent">{{ $campaign->donations()->sum('amount')/$campaign->campaign_target * 100 }}%</span>
                                        </span>
                                    </h4>
                                    <div class="progress-content-outter">
                                        <div class="progress-content" style="width: {{ $campaign->donations()->sum('amount')/$campaign->campaign_target * 100 }}%;"></div>
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
                                    <span class="rate">Rp. {{ number_formatting($campaign->donations()->sum('amount')) }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
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
            @foreach($informations as $information)
            <div class="col-lg-4 col-md-6">
                <div class="news-single mb-30" data-aos="fade-up" data-aos-delay="100">
                    <div class="news-thumb">
                        <a href="{{ url('information/'.$information->id) }}">
                            <img src="{{ information_image_url($information->information_photo) }}" alt="">
                        </a>
                    </div>
                    <div class="news-content" style="height:210px">
                        <div class="news-head">
                            <span>{{ $information->category->information_category_name }}</span>
                            <h3><a href="{{ url('information/'.$information->id) }}">{{ $information->information_title }}</a></h3>
                        </div>
                        <div class="news-text">
                            <p>{{ truncateDescription($information->information_description) }}</p>
                        </div>
                        <div class="news-btn">
                            <a href="{{ url('information/'.$information->id) }}">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- news end -->
@endsection
@section('js')
@if (session('success_message'))
<script type="text/javascript">
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session('success_message') }}'
    })

</script>
@elseif (session('failed_message'))
<script type="text/javascript">
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: '{{ session('failed_message') }}'
    })

</script>
@endif
@endsection
