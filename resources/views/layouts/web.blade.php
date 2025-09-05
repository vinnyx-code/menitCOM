<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>V1Portal-news</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('layout/assets/demo/img/favicon.ico')}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('layout/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('layout/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('layout/assets/css/ticker-style.css')}}">
    <link rel="stylesheet" href="{{asset('layout/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('layout/assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('layout/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('layout/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('layout/assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('layout/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('layout/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('layout/assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('layout/assets/css/style.css')}}">
</head>

<body>

    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header ">
                <div class="header-top black-bg d-none d-md-block">
                    <div class="container">
                        <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left">
                                    <ul>
                                        <li><img src="layout/assets/img/icon/header_icon1.png" alt="">34ºc, Cerah </li>
                                        <li><img src="layout/assets/img/icon/header_icon1.png" alt="">{{Carbon\Carbon::now()->translatedFormat('l, d F Y')}}</li>
                                    </ul>
                                </div>
                                <div class="header-info-right">
                                    <ul class="header-social">
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li> <a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-mid d-none d-md-block">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-3 col-lg-3 col-md-3">
                                <div class="logo">
                                    <a href="index.html"><img src="{{asset('layout/assets/img/logo/logo.png')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-9">
                                <div class="header-banner f-right ">
                                    <img src="{{asset('layout/assets/img/hero/header_card.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom header-sticky">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                                <!-- sticky -->
                                <div class="sticky-logo">
                                    <a href="index.html"><img src="{{asset('layout/assets/img/logo/logo.png')}}" alt=""></a>
                                </div>
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-md-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="index.html">Home</a></li>
                                            <li><a href="{{ route('kategori.index') }}">Category</a></li>
                                            <li><a href="about.html">About</a></li>
                                            <li><a href="latest_news.html">Latest News</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="#">Pages</a>
                                                <ul class="submenu">
                                                    <li><a href="elements.html">Element</a></li>
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="single-blog.html">Blog Details</a></li>
                                                    <li><a href="details.html">Categori Details</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-4">
                                <div class="header-right-btn f-right d-none d-lg-block">
                                    <i class="fas fa-search special-tag"></i>
                                    <div class="search-box">
                                        <form action="#">
                                            <input type="text" placeholder="Search">

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-md-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>

    <main>
        <!-- Trending Area Start -->
        <div class="trending-area fix">
            <div class="container">
                <div class="trending-main">
                    <!-- Trending Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="trending-tittle">
                                <strong>Berita Terupdate</strong>
                                <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                                <div class="trending-animated">
                                    <ul id="js-news" class="js-hidden">
                                        <li class="news-item">Gabut?</li>
                                        <li class="news-item">Baca Berita!</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- JS here -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{asset('layout/./assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{asset('layout/./assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('layout/./assets/js/popper.min.js')}}"></script>
    <script src="{{asset('layout/./assets/js/bootstrap.min.js')}}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{asset('layout/./assets/js/jquery.slicknav.min.js')}}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{asset('layout/./assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('layout/./assets/js/slick.min.js')}}"></script>
    <!-- Date Picker -->
    <script src="{{asset('layout/./assets/js/gijgo.min.js')}}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{asset('layout/./assets/js/wow.min.js')}}"></script>
    <script src="{{asset('layout/./assets/js/animated.headline.js')}}"></script>
    <script src="{{asset('layout/./assets/js/jquery.magnific-popup.js')}}"></script>

    <!-- Breaking New Pluging -->
    <script src="{{asset('layout/./assets/js/jquery.ticker.js')}}"></script>
    <script src="{{asset('layout/./assets/js/site.js')}}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{asset('layout/./assets/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('layout/./assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('layout/./assets/js/jquery.sticky.js')}}"></script>

    <!-- contact js -->
    <script src="{{asset('layout/./assets/js/contact.js')}}"></script>
    <script src="{{asset('layout/./assets/js/jquery.form.js')}}"></script>
    <script src="{{asset('layout/./assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('layout/./assets/js/mail-script.js')}}"></script>
    <script src="{{asset('layout/./assets/js/jquery.ajaxchimp.min.js')}}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{asset('layout/./assets/js/plugins.js')}}"></script>
    <script src="{{asset('layout/./assets/js/main.js')}}"></script>

</body>

</html>