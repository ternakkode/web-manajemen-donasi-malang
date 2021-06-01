<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <title>@yield('title') | Ketimbang Ngemis Malang</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}" >
        <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome-all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/meanmenu.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/default.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
        @yield('css')
    </head>
    <body>

        <!-- preloader start -->
        <div id="preloader">
            <div class="preloader">
                <span></span>
                <span></span>
            </div>
        </div>
        <!-- preloader end  -->
        
        <!-- header start -->
        <header class="main-header">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-4">
                            <div class="logo d-none d-lg-block">
                                <a href="#"><img src="{{ asset('img/logo.png') }}" alt="logo" style="height:70px"></a>
                            </div>
                            <div class="logo-mobile d-none">
                                <a href="#"><img src="{{ asset('img/logo.png') }}" alt="logo" style="height:70px"></a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-8">
                            <div class="header-top d-none d-lg-block">
                                <ul>
                                    <li>
                                        <span class="icon"><img src="https://xpressrow.com/html/foundy/img/icon/h01.png" alt="icon"></span>
                                        <div class="header-top-content">
                                            <p>Email</p>
                                            <h6>{{ $email }}</h6>
                                        </div>
                                    </li>
                                    <li class="pl-5">
                                        <span class="icon"><img src="https://xpressrow.com/html/foundy/img/icon/h02.png" alt="icon"></span>
                                        <div class="header-top-content header-top-content-2">
                                            <p>Whatsapp</p>
                                            <h6>{{ $whatsapp }}</h6>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="header-top-right f-right">
                                <div class="header-btn">
                                    <a href="{{ url('donation') }}" class="thm-btn thm-btn-2">Donasi</a>
                                </div>
                            </div>
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom-area">
                <div class="header-bottom-wrapper">
                     <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-xl-8 col-lg-8">
                                <div class="main-menu">
                                    <nav id="mobile-menu">
                                        <ul>
                                            <li><a href="{{ url('') }}">Beranda</a></li>
                                            <li><a href="{{ url('information') }}">Informasi</a></li>
                                            <li><a href="{{ url('faq') }}">Pertanyaan Umum</a></li>
                                            <li><a href="{{ url('solia') }}">Solia</a></li>
                                            <li><a href="{{ url('campaign') }}">Penggalangan Dana</a></li>
                                            <li><a href="{{ url('transparation') }}">Transparansi Dana</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- header search end -->
                </div>
            </div>
        </header>
        <!-- header end -->
        
        <main>
            @yield('content')
        </main>

        <!-- JS here -->
        <script src="{{ asset('frontend/js/modernizr-3.8.0.min.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery-1.12.4.min.js') }}"></script>
        <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
        <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
        <script src="{{ asset('frontend/js/waypoints.min.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('frontend/js/aos.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery.meanmenu.min.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('frontend/js/plugins.js') }}"></script>
        <script src="{{ asset('frontend/js/main.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        @yield('js')
    </body>
</html>