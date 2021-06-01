@extends('frontend_layout')
@section('title', 'Pertanyaan Umum')
@section('content')
<section class="page-title-area bg-overly slider-area slider-2" data-overlay="5"
    data-background="https://xpressrow.com/html/foundy/img/bg/slider-bg-01.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title text-center" data-aos="fade-up" data-aos-delay="100">
                    <h1>Pertanyaan Umum</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item">
                                <a href="{{ ('') }}">Beranda</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Pertanyaan Umum</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider area start -->
<section class="faq-area pt-120 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="faq-left mb-20" data-aos="fade-up" data-aos-delay="100">
                    <div class="faq-wrapper">
                        @for($i = 0; $i < floor(count($faqs)) / 2; $i++)
                        <div class="accordion" id="accordionExampleOne">
                            <div class="card">
                                <div class="card-header" id="headingOnee">
                                    <h5 class="mb-0">
                                        <a href="#" class="btn-link" data-toggle="collapse" data-target="#collapse-{{ $i }}"
                                            aria-expanded="true" aria-controls="collapseOnee">
                                            {{ $faqs[$i]->question }}
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse-{{ $i }}" class="collapse" aria-labelledby="headingOnee"
                                    data-parent="#accordionExampleTwo" style="">
                                    <div class="card-body">
                                        {{ $faqs[$i]->answer }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="faq-right mb-20" data-aos="fade-up" data-aos-delay="300">
                    <div class="faq-wrapper">
                    @for($i = floor(count($faqs) / 2); $i < count($faqs); $i++)
                        <div class="accordion" id="accordionExampleOne">
                            <div class="card">
                                <div class="card-header" id="headingOnee">
                                    <h5 class="mb-0">
                                        <a href="#" class="btn-link" data-toggle="collapse" data-target="#collapse-{{ $i }}"
                                            aria-expanded="true" aria-controls="collapseOnee">
                                            {{ $faqs[$i]->question }}
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse-{{ $i }}" class="collapse" aria-labelledby="headingOnee"
                                    data-parent="#accordionExampleTwo" style="">
                                    <div class="card-body">
                                        {{ $faqs[$i]->answer }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- news end -->
@endsection
