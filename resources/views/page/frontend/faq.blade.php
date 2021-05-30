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
                        <div class="accordion" id="accordionExampleOne">
                            <div class="card">
                                <div class="card-header" id="headingOnee">
                                    <h5 class="mb-0">
                                        <a href="#" class="btn-link" data-toggle="collapse" data-target="#collapseOnee"
                                            aria-expanded="true" aria-controls="collapseOnee">
                                            Consectetur adipisicing elit, sed do eiusmod tempor incididuny ?
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseOnee" class="collapse" aria-labelledby="headingOnee"
                                    data-parent="#accordionExampleTwo" style="">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis ipsam quae
                                        eligendi minus, maiores vitae quo animi. Neque sit voluptatibus recusandae
                                        dolorum laboriosam. Fugiat, voluptatum vel animi distinctio cupiditate magni
                                        quis amet natus eveniet incidunt quo ab soluta voluptas id dolor ducimus.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="faq-right mb-20" data-aos="fade-up" data-aos-delay="300">
                    <div class="faq-wrapper">
                        <div class="accordion" id="accordionExampleTwo">
                            <div class="card">
                                <div class="card-header" id="headingFour">
                                    <h5 class="mb-0">
                                        <a href="#" class="btn-link" data-toggle="collapse" data-target="#collapseFour"
                                            aria-expanded="true" aria-controls="collapseFour">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit ?
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                    data-parent="#accordionExampleTwo" style="">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis ipsam quae
                                        eligendi minus, maiores vitae quo animi. Neque sit voluptatibus recusandae
                                        dolorum laboriosam. Fugiat, voluptatum vel animi distinctio cupiditate magni
                                        quis amet natus eveniet incidunt quo ab soluta voluptas id dolor ducimus.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- news end -->
@endsection
