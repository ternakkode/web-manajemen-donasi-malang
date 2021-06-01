@extends('frontend_layout')
@section('title', 'Sosok Mulia')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
@endsection
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
                            <li class="breadcrumb-item active" aria-current="page">Sosok Mulia</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="causes-details pt-120 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="causes-dtls-content mb-40">
                    <div class="causes-dtls-thumb mb-40" data-aos="fade-up" data-aos-delay="100">
                        <div class="owl-carousel owl-theme">
                            @foreach($solia->photos as $photo)
                            <div class="item">
                                <a class="fancybox" data-fancybox="gallery"
                                    href="{{ solia_image_url($photo->solia_photo_url) }}">
                                    <img src="{{ solia_image_url($photo->solia_photo_url) }}" alt=""
                                        style="height:377px">
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="causes-dtls-text pb-15 mb-25" data-aos="fade-up" data-aos-delay="100">
                        <h2>{{ $solia->name }}</h2>
                    </div>
                    <p>{{ $solia->description }}</p>
                    <div class="text mt-40" data-aos="fade-up" data-aos-delay="100">
                        <h4>Lokasi</h4>
                        <p>{{ $solia->location }}</p>
                    </div>
                    @if($solia->campaign_id)
                    <div class="text" data-aos="fade-up" data-aos-delay="100">
                        <h4>Bantu Pak Bowo Melalui Ketimbang Ngemis Malang</h4>
                        <p>Apabila kamu belum bisa menemui Pak Bowo namun ingin berdonasi kepada Pak Bowo Kami dari
                            Ketimbang Ngemis Malang akan membantu mendonasikan dana kamu kepada pak bowo, silahkan isi
                            form donas dengan mengklik tautan dibawah :</p>
                    </div>
                    <a href="{{ url('donation?campaign_id='.$solia->campaign_id) }}" class="form-btn mb-30" data-aos="fade-up" data-aos-delay="100">
                        <button class="thm-btn thm-btn-3" type="submit">Donasi</button>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- news end -->
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"
    integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.owl-carousel').owlCarousel({
        margin: 10,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    })

</script>
@endsection
