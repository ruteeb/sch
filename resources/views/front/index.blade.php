<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Aspiraties">
    <title>Oranje Ster</title>


    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/vendors.css" rel="stylesheet">
    <link href="css/icon_fonts/css/all_icons.min.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

</head>

<body>

<div id="page">

    <header class="header menu_2">
        <div id="preloader"><div data-loader="circle-side"></div></div><!-- /Preload -->
        <div id="logo">
            <a href="index.html"><img src="img/logo.png" data-retina="true" alt=""></a>
        </div>
        <ul id="top_menu">
            <li><a href="login.html" class="login" title="Log in">Log in</a></li>
            <li><a href="#" class="search-overlay-menu-btn" title="Zoeken">Zoeken</a></li>
            <li class="hidden_tablet"><a href="register.html" class="btn_1 rounded">Registreren</a></li>
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
                <li><span><a href="index.html">Home</a></span></li>
                <li><span><a href="about.html">Over Ons</a></span></li>
                <li><span><a href="courses-grid.html">Cursussen</a></span></li>
                <li><span><a href="contacts.html">Contact Us</a></span></li>
            </ul>
        </nav>
        <!-- Search Menu -->
        <div class="search-overlay-menu">
            <span class="search-overlay-close"><span class="closebt"><i class="ti-close"></i></span></span>
            <form role="search" action="{{ url('search') }}"  id="searchform" method="get">
                <input name="q" type="search" placeholder="Zoeken..." />
                <button type="submit"><i class="icon_search"></i>
                </button>
            </form>
        </div><!-- End Search Menu -->
    </header>
    <!-- /header -->

    <main>
        <section class="hero_single version_2">
            <div class="wrapper">
                <div class="container">
                    <h3>WAT ZOU JE LEREN?</h3>
                    <p>Vergroot uw expertise in zaken, technologie en persoonlijke ontwikkeling</p>
                    <form>
                        <div id="custom-search-input">
                            <div class="input-group">
                                <input type="text" class=" search-query" placeholder="Ex. Architectuur, specialisatie...">
                                <input type="submit" class="btn_search" value="Search">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- /hero_single -->

        <div class="features clearfix">
            <div class="container">
                <ul>
                    <li><i class="pe-7s-study"></i>
                        <h4>+200 Cursussen</h4><span>Verken verschillende verse onderwerpen</span>
                    </li>
                    <li><i class="pe-7s-cup"></i>
                        <h4>Deskundige Leraren</h4><span>Vind de juiste instructeur voor jou</span>
                    </li>
                    <li><i class="pe-7s-target"></i>
                        <h4>Focus op doelwit</h4><span>Vergroot uw persoonlijke expertise</span>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /features -->

        <div class="container-fluid margin_120_0 courses_home">
            <div class="main_title_2">
                <span><em></em></span>
                <h2>Oranje Populaire Cursussen</h2>
                <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
            </div>
            <div id="reccomended" class="owl-carousel owl-theme">
                <div class="item">
                    <div class="box_grid">
                        <figure>
                            <a href="#" class="wish_bt"></a>
                            <a href="course-detail.html">
                                <div class="preview"><span>Preview course</span></div>
                                <img src="img/course/1.png" class="img-fluid" alt=""></a>
                            <div class="price">$39</div>

                        </figure>
                        <div class="wrapper">
                            <small>Categorie</small>
                            <h3>Persius delenit has cu</h3>
                            <p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
                            <div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></div>
                        </div>
                        <ul>
                            <li><i class="icon_clock_alt"></i> 1h 30min</li>
                            <li><i class="icon_like"></i> 890</li>
                            <li><a href="course-detail.html">Enroll now</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /item -->
                <div class="item">
                    <div class="box_grid">
                        <figure>
                            <a href="#0" class="wish_bt"></a>
                            <a href="course-detail.html"><img src="img/course/2.png" class="img-fluid" alt=""></a>
                            <div class="price">$45</div>
                            <div class="preview"><span>Preview course</span></div>
                        </figure>
                        <div class="wrapper">
                            <small>Categorie</small>
                            <h3>Persius delenit has cu</h3>
                            <p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
                            <div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></div>
                        </div>
                        <ul>
                            <li><i class="icon_clock_alt"></i> 1h 30min</li>
                            <li><i class="icon_like"></i> 890</li>
                            <li><a href="course-detail.html">Enroll now</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /item -->
                <div class="item">
                    <div class="box_grid">
                        <figure>
                            <a href="#0" class="wish_bt"></a>
                            <a href="course-detail.html"><img src="img/course/3.png" class="img-fluid" alt=""></a>
                            <div class="price">$54</div>
                            <div class="preview"><span>Preview course</span></div>
                        </figure>
                        <div class="wrapper">
                            <small>Categorie</small>
                            <h3>Persius delenit has cu</h3>
                            <p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
                            <div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></div>
                        </div>
                        <ul>
                            <li><i class="icon_clock_alt"></i> 1h 30min</li>
                            <li><i class="icon_like"></i> 890</li>
                            <li><a href="course-detail.html">Enroll now</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /item -->
                <div class="item">
                    <div class="box_grid">
                        <figure>
                            <a href="#0" class="wish_bt"></a>
                            <a href="course-detail.html"><img src="img/course/4.png" class="img-fluid" alt=""></a>
                            <div class="price">$27</div>
                            <div class="preview"><span>Preview course</span></div>
                        </figure>
                        <div class="wrapper">
                            <small>Categorie</small>
                            <h3>Persius delenit has cu</h3>
                            <p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
                            <div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></div>
                        </div>
                        <ul>
                            <li><i class="icon_clock_alt"></i> 1h 30min</li>
                            <li><i class="icon_like"></i> 890</li>
                            <li><a href="course-detail.html">Enroll now</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /item -->
                <div class="item">
                    <div class="box_grid">
                        <figure>
                            <a href="#0" class="wish_bt"></a>
                            <a href="course-detail.html"><img src="img/course/5.png" class="img-fluid" alt=""></a>
                            <div class="price">$35</div>
                            <div class="preview"><span>Preview course</span></div>
                        </figure>
                        <div class="wrapper">
                            <small>Categorie</small>
                            <h3>Persius delenit has cu</h3>
                            <p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
                            <div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></div>
                        </div>
                        <ul>
                            <li><i class="icon_clock_alt"></i> 1h 30min</li>
                            <li><i class="icon_like"></i> 890</li>
                            <li><a href="course-detail.html">Enroll now</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /item -->
                <div class="item">
                    <div class="box_grid">
                        <figure>
                            <a href="#0" class="wish_bt"></a>
                            <a href="course-detail.html"><img src="img/course/6.png" class="img-fluid" alt=""></a>
                            <div class="price">$54</div>
                            <div class="preview"><span>Preview course</span></div>
                        </figure>
                        <div class="wrapper">
                            <small>Categorie</small>
                            <h3>Persius delenit has cu</h3>
                            <p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
                            <div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></div>
                        </div>
                        <ul>
                            <li><i class="icon_clock_alt"></i> 1h 30min</li>
                            <li><i class="icon_like"></i> 890</li>
                            <li><a href="course-detail.html">Enroll now</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /item -->
            </div>
            <!-- /carousel -->
            <div class="container">
                <p class="btn_home_align"><a href="courses-grid.html" class="btn_1 rounded">Bekijk alle cursussen</a></p>
            </div>
            <!-- /container -->
            <hr>
        </div>
        <!-- /container -->

        <div class="container margin_30_95 courses_home">
            <div class="main_title_2">
                <span><em></em></span>
                <h2>Oranje Categorieën Cursussen</h2>
                <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
                    <a href="#0" class="grid_item">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            <img src="img/course/1.png" class="img-fluid" alt="">
                            <div class="info">
                                <small><i class="ti-layers"></i>15 Programmes</small>
                                <h3>Arts and Humanities</h3>
                            </div>
                        </figure>
                    </a>
                </div>
                <!-- /grid_item -->
                <div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
                    <a href="#0" class="grid_item">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            <img src="img/course/2.png" class="img-fluid" alt="">
                            <div class="info">
                                <small><i class="ti-layers"></i>23 Programmes</small>
                                <h3>Engineering</h3>
                            </div>
                        </figure>
                    </a>
                </div>
                <!-- /grid_item -->
                <div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
                    <a href="#0" class="grid_item">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            <img src="img/course/3.png" class="img-fluid" alt="">
                            <div class="info">
                                <small><i class="ti-layers"></i>23 Programmes</small>
                                <h3>Architecture</h3>
                            </div>
                        </figure>
                    </a>
                </div>
                <!-- /grid_item -->
                <div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
                    <a href="#0" class="grid_item">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            <img src="img/course/4.png" class="img-fluid" alt="">
                            <div class="info">
                                <small><i class="ti-layers"></i>23 Programmes</small>
                                <h3>Science and Biology</h3>
                            </div>
                        </figure>
                    </a>
                </div>
                <!-- /grid_item -->
                <div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
                    <a href="#0" class="grid_item">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            <img src="img/course/5.png" class="img-fluid" alt="">
                            <div class="info">
                                <small><i class="ti-layers"></i>23 Programmes</small>
                                <h3>Law and Criminology</h3>
                            </div>
                        </figure>
                    </a>
                </div>
                <!-- /grid_item -->
                <div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
                    <a href="#0" class="grid_item">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            <img src="img/course/6.png" class="img-fluid" alt="">
                            <div class="info">
                                <small><i class="ti-layers"></i>23 Programmes</small>
                                <h3>Medical</h3>
                            </div>
                        </figure>
                    </a>
                </div>
                <!-- /grid_item -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->

        <div class="call_section">
            <div class="container clearfix">
                <div class="col-lg-5 col-md-6 float-right wow" data-wow-offset="250">
                    <div class="block-reveal">
                        <div class="block-vertical"></div>
                        <div class="box_1">
                            <h3>Enjoy a great students community</h3>
                            <p>Ius cu tamquam persequeris, eu veniam apeirian platonem qui, id aliquip voluptatibus pri. Ei mea primis ornatus disputationi. Menandri erroribus cu per, duo solet congue ut. </p>
                            <a href="#0" class="btn_1 rounded">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/call_section-->
    </main>
    <!-- /main -->

    <footer>
        <div class="container margin_120_95">
            <div class="row">
                <div class="col-lg-5 col-md-12 p-r-5">
                    <p><img src="img/logo.png" data-retina="true" alt=""></p>
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
                        <li><a href="#0">Home</a></li>
                        <li><a href="#0">Over Ons</a></li>
                        <li><a href="#0">Cursussen</a></li>
                        <li><a href="#0">Log in</a></li>
                        <li><a href="#0">Registreren</a></li>
                        <li><a href="#0">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>Contact with Us</h5>
                    <ul class="contacts">
                        <li><a href="tel://61280932400"><i class="ti-mobile"></i> + 61 23 8093 3400</a></li>
                        <li><a href="/cdn-cgi/l/email-protection#30595e565f704554555d511e535f5d"><i class="ti-email"></i> <span class="__cf_email__" data-cfemail="422b2c242d023726272f236c212d2f">[email&#160;protected]</span></a></li>
                    </ul>
                    <div id="newsletter">
                        <h6>Newsletter</h6>
                        <div id="message-newsletter"></div>
                        <form method="post" action="assets/newsletter.php" name="newsletter_form" id="newsletter_form">
                            <div class="form-group">
                                <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
                                <input type="submit" value="Submit" id="submit-newsletter">
                            </div>
                        </form>
                    </div>
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
<script data-cfasync="false" src="/cdn-cgi/scripts/f2bf09f8/cloudflare-static/email-decode.min.js"></script><script src="js/jquery-2.2.4.min.js"></script>
<script src="js/common_scripts.js"></script>
<script src="js/main.js"></script>
<script src="assets/validate.js"></script>

</body>
</html>
