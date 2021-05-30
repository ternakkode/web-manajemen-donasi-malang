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
                        <img src="http://localhost:8000/storage/images/solia/pak-bowo.jpg" alt="" style="height:400px;width:400px">
                    </div>
                    <div class="causes-dtls-text pb-15 mb-25" data-aos="fade-up" data-aos-delay="100">
                        <h2>Pak Bowo Penjual Tahu Petis</h2>
                    </div>
                    <p>Rorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.Rorem
                            ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.Rorem
                            ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                    <div class="text mt-40" data-aos="fade-up" data-aos-delay="100">
                        <h4>Lokasi</h4>
                        <p>Pak Bowo sering berjualan disekitar Jln Soekarno Hatta. Bantu meringankan beban pak bowo dengan membeli dangangan pak bowo</p>
                    </div>
                    <div class="text" data-aos="fade-up" data-aos-delay="100">
                        <h4>Bantu Pak Bowo Melalui Ketimbang Ngemis Malang</h4>
                        <p>Apabila kamu belum bisa menemui Pak Bowo namun ingin berdonasi kepada Pak Bowo Kami dari Ketimbang Ngemis Malang akan membantu mendonasikan dana kamu kepada pak bowo, silahkan isi form donas dengan mengklik tautan dibawah :</p>
                    </div>
                    <a href="{{ url('donation') }}" type="button" class="btn btn-primary">Donasi</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- news end -->
@endsection
