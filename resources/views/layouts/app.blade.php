<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Aspiraties">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- BASE CSS -->
    <link href="{{ asset('front') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('front') }}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('front') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('front') }}/css/vendors.css" rel="stylesheet">
    <link href="{{ asset('front') }}/css/icon_fonts/css/all_icons.min.css" rel="stylesheet">
    <?php $setting = \App\Model\Setting::first(); ?>
    <link rel="shortcut icon" href="{{ asset('admin/files/images/setting/')."/".$setting->favicon }}">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('front') }}/css/custom.css" rel="stylesheet">

    @yield('css')

</head>
<body>

<div id="page">

    <header class="header menu_2">
        <div id="preloader"><div data-loader="circle-side"></div></div><!-- /Preload -->
        <div id="logo">
            <a href="index.html"><img style="width: 160px;" src="{{ asset('admin/files/images/setting/')."/".$setting->logo }}" data-retina="true" alt=""></a>
        </div>
        <ul id="top_menu">
            @guest
            <li><a href="{{ url('login') }}" class="login" title="Log in">Log in</a></li>
            @endguest
            <li><a href="javascript:;" class="search-overlay-menu-btn" title="Zoeken">Zoeken</a></li>


            @if(auth()->check())
            <li class="hidden_tablet user-profile dropdown">
                <button class="dropbtn"><img class="img-user" src="{{ asset('admin/files/images/users/')."/".auth()->user()->image }}"> <span>{{ auth()->user()->first_name }}</span></button>
                <div class="dropdown-content">
                    <a href="{{ url('profile') }}"><i class="fa fa-user"></i> Profile</a>
                    <a href="#"><i class="fa fa-book"></i> My Classes</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
            @endif

        </ul>
        <!-- /top_menu -->
        <a href="#menu" class="btn_mobile">
            <div class="hamburger hamburger--spin" id="hamburger">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </div>
        </a>
        <nav id="menu" class="main-menu">
            <ul>
                <li><span><a href="{{ url('/') }}">Home</a></span></li>
                <li><span><a href="{{ url('about') }}">Over Ons</a></span></li>
                <li><span><a href="{{ url('courses') }}">Cursussen</a></span></li>
                <li><span><a href="{{ url('materials') }}">Materialen</a></span></li>
                <li><span><a href="{{ url('events') }}">Evenementen</a></span></li>
                <li><span><a href="{{ url('contact') }}">Contact Us</a></span></li>
            </ul>
        </nav>
        <!-- Search Menu -->
        <div class="search-overlay-menu">
            <span class="search-overlay-close"><span class="closebt"><i class="ti-close"></i></span></span>
            <form role="search" id="searchform" method="get">
                <input value="" name="q" type="search" placeholder="Zoeken..." />
                <button type="submit"><i class="icon_search"></i>
                </button>
            </form>
        </div><!-- End Search Menu -->
    </header>
    <!-- /header -->

    @yield('content')

    <footer>
        <div class="container margin_120_95">
            <div class="row">
                <div class="col-lg-5 col-md-12 p-r-5">
                    <p><img src="{{ asset('front') }}/img/logo.png" data-retina="true" alt=""></p>
                    <p>Mea nibh meis philosophia eu. Duis legimus efficiantur ea sea. Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu. Nihil facilisi indoctum an vix, ut delectus expetendis vis.</p>
                    <div class="follow_us">
                        <ul>
                            <li>Follow us</li>
                            <li><a href="#0"><i class="ti-facebook"></i></a></li>
                            <li><a href="#0"><i class="ti-twitter-alt"></i></a></li>
                            <li><a href="#0"><i class="ti-google"></i></a></li>
                            <li><a href="#0"><i class="ti-pinterest"></i></a></li>
                            <li><a href="#0"><i class="ti-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ml-lg-auto">
                    <h5>Useful links</h5>
                    <ul class="links">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('about') }}">Over Ons</a></li>
                        <li><a href="{{ url('courses') }}">Cursussen</a></li>
                        <li><a href="{{ url('materials') }}">Materialen</a></li>
                        <li><a href="{{ url('events') }}">Evenementen</a></li>
                        <li><a href="{{ url('contact') }}">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>Contact with Us</h5>
                    <ul class="contacts">
                        <li><a href="tel://61280932400"><i class="ti-mobile"></i> + 61 23 8093 3400</a></li>
                        <li><a href="/cdn-cgi/l/email-protection#30595e565f704554555d511e535f5d"><i class="ti-email"></i> <span class="__cf_email__" data-cfemail="422b2c242d023726272f236c212d2f">[email&#160;protected]</span></a></li>
                    </ul>
                </div>
            </div>
            <!--/row-->
            <hr>
            <div class="row">
                <div class="col-md-8">
                    <ul id="additional_links">
                        <li><a href="#0">Terms and conditions</a></li>
                        <li><a href="#0">Privacy</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div id="copy">© 2018 <a style="color:rgba(255, 255, 255, .7); font-size: 14px;" href="http://cs-aspiraties.nl/">Aspiraties</a> </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/footer-->
</div>
<!-- page -->

<!-- COMMON SCRIPTS -->
<script src="{{ asset('front') }}/js/jquery-2.2.4.min.js"></script>
<script src="{{ asset('front') }}/js/common_scripts.js"></script>
<script src="{{ asset('front') }}/js/main.js"></script>
<script src="{{ asset('front') }}/assets/validate.js"></script>
<script src="{{ asset('front') }}/js/work.js"></script>
@yield('js')

</body>
</html>