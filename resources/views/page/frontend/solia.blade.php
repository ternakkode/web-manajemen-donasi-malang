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
            @foreach ($solias as $solia)
            <div class="col-lg-4 col-md-6">
                <a href="{{ url('solia/'.$solia->id) }}">
                    <div class="causes-single mb-30" data-aos="fade-up" data-aos-delay="100">
                        <div class="causes-thumb">
                            @foreach($solia->photos as $photo)
                            @if($photo->is_primary)
                            <img src="{{ solia_image_url($photo->solia_photo_url) }}" alt="">
                            @endif
                            @endforeach
                        </div>
                        <div class="causes-content" style="height:200px">
                            <div class="causes-head clearfix mb-10">
                                <h4><a href="{{ url('solia/'.$solia->id) }}">{{ $solia->name }}</a></h4>
                            </div>
                            <div class="causes-text mb-25">
                                <p>{{ truncateDescription($solia->description) }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12">
                <div class="pagination-wrapper text-center mt-35" data-aos="fade-up" data-aos-delay="100">
                    {{ $solias->links()  }}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- news end -->
@endsection
