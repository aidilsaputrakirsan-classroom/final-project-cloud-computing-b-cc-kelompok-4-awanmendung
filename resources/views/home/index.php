<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>resepin.id</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS vendor -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- Fonts: Instrument Sans (balik ke font awal) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom override -->
    <style>
        :root {
            --font-sans: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
        }

        html { font-size: 17px; }

        body, button, input, select, textarea {
            font-family: var(--font-sans) !important;
            font-weight: 400; color: #2e2e2e; line-height: 1.8;
            -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-sans) !important;
            font-weight: 600; color: #1a1a1a; line-height: 1.4;
        }

        p { font-size: 1.05rem; color: #3a3a3a; line-height: 1.9; }

        /* Header / Navbar */
        .logo { display: flex; align-items: center; }
        .logo img { max-height: 120px; width: auto; object-fit: contain; }

        #navigation > li > a {
            font-family: var(--font-sans); font-weight: 500; font-size: 1rem; color: #fff !important;
        }

        /* Slider (pakai gambar banner sebagai background) */
        .slider_bg_1 {
            background-image: url('img/banner/banner.png'); /* pastikan path benar */
            background-size: cover; background-position: center center;
            position: relative; min-height: 70vh;
        }
        @media (min-width: 1200px) { .slider_bg_1 { min-height: 88vh; } }

        .slider_bg_1::after {
            content: ""; position: absolute; inset: 0;
            background: rgba(0,0,0,.35);
        }

        .slider_text { position: relative; z-index: 2; }
        .slider_text h3 {
            font-size: clamp(2.2rem, 4vw + 1rem, 3.5rem);
            font-weight: 700; color: #fff ; letter-spacing: 0.03em;
        }

        /* Buttons */
        a.boxed-btn3 {
            background-color: #28a745; border-color: #28a745; color: #fff;
            padding: 10px 24px; border-radius: 6px; transition: .3s;
        }
        a.boxed-btn3:hover { background-color: #218838; }

        /* Recipe cards */
        .single_recepie h3 { font-size: 1.3rem; font-weight: 600; margin-top: 15px; }
        .line_btn { font-family: var(--font-sans); font-weight: 500; letter-spacing: .02em; }

        /* Section titles */
        .section_title h3, .trand_info h3 { font-size: 2rem; font-weight: 700; }

        /* Footer */
        .footer_widget h3 { font-weight: 700; color: #111; font-size: 1.2rem; }
        .footer_widget ul li a { color: #666; transition: color .3s; }
        .footer_widget ul li a:hover { color: #28a745; }
        .newsletter_text { color: #555; }
        .copy_right { font-size: .9rem; color: #777; }

        /* Spacing antar section */
        .recepie_area, .recepie_videoes_area, .dish_area, .latest_trand_area, .customer_feedback_area, .download_app_area { margin-top: 60px; }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="header-area">
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="img/resepinid_logofix.png" alt="Resepin.id Logo">
                                </a>
                            </div>
                        </div>
                        <!-- Menu -->
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu white_text  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="index.php">home</a></li>
                                        <li><a href="about">about</a></li>
                                        <li><a href="recipes">Recipes</a></li>
                                        <li><a href="bookmarks">Bookmarks </a></li>
                                        <li><a href="pages">pages</a>
                                            <ul class="submenu">
                                                <li><a href="recipes_details">Recipes Details</a></li>
                                                <li><a href="elements">elements</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="header_right d-flex justify-content-end align-items-center">
                                <div class="search_icon mr-3">
                                    <a href="#"><i class="ti-search"></i></a>
                                </div>
                                <div class="login_btn">
                                    <a href="/login" class="boxed-btn3">Login</a>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div><!-- row -->
                </div><!-- container -->
            </div><!-- main-header-area -->
        </div><!-- header-area -->
    </header>

    <!-- Slider -->
    <div class="slider_area">
        <div class="single_slider d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-8 text-center slider_text">
                        <h3>resepin.id</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recipe Area -->
    <div class="recepie_area">
        <div class="container">
            <div class="row">
                <!-- Card 1 -->
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single_recepie text-center">
                        <div class="recepie_thumb">
                            <img src="img/recepie/recpie_1.png" alt="">
                        </div>
                        <h3>Egg Manchurian</h3>
                        <span>Appetizer</span>
                        <p>Time Needs: 30 Mins</p>
                        <a href="recipes_details" class="line_btn">View Full Recipe</a>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single_recepie text-center">
                        <div class="recepie_thumb">
                            <img src="img/recepie/recpie_2.png" alt="">
                        </div>
                        <h3>Pure Vegetable Bowl</h3>
                        <span>Appetizer</span>
                        <p>Time Needs: 30 Mins</p>
                        <a href="recipes_details" class="line_btn">View Full Recipe</a>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single_recepie text-center">
                        <div class="recepie_thumb">
                            <img src="img/recepie/recpie_3.png" alt="">
                        </div>
                        <h3>Egg Masala Ramen</h3>
                        <span>Appetizer</span>
                        <p>Time Needs: 30 Mins</p>
                        <a href="recipes_details" class="line_btn">View Full Recipe</a>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- recepie_area -->

    <!-- Recipe Videos -->
    <div class="recepie_videoes_area">
        <div class="container">
            <div class="row">
                <!-- Left info -->
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="recepie_info">
                        <h3>Recipe videos that never miss any portion</h3>
                        <p>Inappropriate behavior is often laughed off as “boys will be boys,” but women face higher conduct standards especially in the workplace.</p>
                        <div class="video_watch d-flex align-items-center">
                            <a class="popup-video" href="https://www.youtube.com/watch?v=lr6AMBsjxrY"><i class="ti-control-play"></i></a>
                            <div class="watch_text">
                                <h4>Watch Video</h4>
                                <p>You will love our execution</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right thumbs -->
                <div class="col-lg-6 col-md-6">
                    <div class="videos_thumb">
                        <div class="big_img">
                            <img src="img/video/big.png" alt="">
                        </div>
                        <div class="small_thumb">
                            <img src="img/video/small_1.png" alt="">
                        </div>
                        <div class="small_thumb_2">
                            <img src="img/video/2.png" alt="">
                        </div>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- recepie_videoes_area -->

    <!-- Dish Area -->
    <div class="dish_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="dish_wrap d-flex">
                        <div class="single_dish text-center">
                            <div class="thumb">
                                <img src="img/recepie/recpie_4.png" alt="">
                            </div>
                            <h3>Birthday Catering</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt.</p>
                        </div>
                        <div class="single_dish text-center">
                            <div class="thumb">
                                <img src="img/recepie/recpie_5.png" alt="">
                            </div>
                            <h3>Wedding Catering</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt.</p>
                        </div>
                        <div class="single_dish text-center">
                            <div class="thumb">
                                <img src="img/recepie/recpie_6.png" alt="">
                            </div>
                            <h3>Corporate Events</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt.</p>
                        </div>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- dish_area -->

    <!-- Latest Trend -->
    <div class="latest_trand_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="trand_info text-center">
                        <p>Thousands of recipes are waiting to be watched</p>
                        <h3>Discover latest trending recipes</h3>
                        <a href="recipes" class="boxed-btn3">View all Recipes</a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- latest_trand_area -->

    <!-- Customer Feedback -->
    <div class="customer_feedback_area">
        <div class="container">
            <div class="row justify-content-center mb-50">
                <div class="col-xl-9">
                    <div class="section_title text-center">
                        <h3>Feedback From Customers</h3>
                        <p>Our customers share their delightful experiences with our unique dishes.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="customer_active owl-carousel">
                        <div class="single_customer d-flex">
                            <div class="thumb">
                                <img src="img/testmonial/1.png" alt="">
                            </div>
                            <div class="customer_meta">
                                <h3>Adame Nesane</h3>
                                <span>Chief Customer</span>
                                <p>You're had. Subdue grass Meat us winged years you'll doesn't. Fruit two also won one yielding creepeth third give may never lie alternet food.</p>
                            </div>
                        </div>
                        <div class="single_customer d-flex">
                            <div class="thumb">
                                <img src="img/testmonial/2.png" alt="">
                            </div>
                            <div class="customer_meta">
                                <h3>Mary Jane</h3>
                                <span>Food Blogger</span>
                                <p>You're had. Subdue grass Meat us winged years you'll doesn't. Fruit two also won one yielding creepeth third give may never lie alternet food.</p>
                            </div>
                        </div>
                        <div class="single_customer d-flex">
                            <div class="thumb">
                                <img src="img/testmonial/3.png" alt="">
                            </div>
                            <div class="customer_meta">
                                <h3>John Doe</h3>
                                <span>Home Chef</span>
                                <p>Great recipes and an amazing community! I always find new inspiration here.</p>
                            </div>
                        </div>
                    </div><!-- owl-carousel -->
                </div>
            </div>
        </div>
    </div><!-- customer_feedback_area -->

    <!-- Download App Area -->
    <div class="download_app_area">
        <div class="container">
            <div class="row align-items-center">
                <!-- Thumbs -->
                <div class="col-xl-6 col-md-6">
                    <div class="download_thumb">
                        <div class="big_img">
                            <img src="img/video/big_1.png" alt="">
                        </div>
                        <div class="small_01">
                            <img src="img/video/small_sm1.png" alt="">
                        </div>
                        <div class="small_02">
                            <img src="img/video/sm2.png" alt="">
                        </div>
                    </div>
                </div>
                <!-- Text -->
                <div class="col-xl-6 col-md-6">
                    <div class="download_text">
                        <h3>Download app to get recipes from everywhere</h3>
                        <div class="download_android_apple">
                            <a class="active" href="#">
                                <div class="download_link d-flex">
                                    <i class="fa fa-apple"></i>
                                    <div class="store">
                                        <h5>Available</h5>
                                        <p>on App Store</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="download_link d-flex">
                                    <i class="fa fa-android"></i>
                                    <div class="store">
                                        <h5>Download</h5>
                                        <p>from Play Store</p>
                                    </div>
                                </div>
                            </a>
                        </div><!-- download_android_apple -->
                    </div><!-- download_text -->
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- download_app_area -->

    <!-- Footer -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <!-- Top Products -->
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">Top Products</h3>
                            <ul>
                                <li><a href="#">Managed Website</a></li>
                                <li><a href="#">Manage Reputation</a></li>
                                <li><a href="#">Power Tools</a></li>
                                <li><a href="#">Marketing Service</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Quick Links -->
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">Quick Links</h3>
                            <ul>
                                <li><a href="#">Jobs</a></li>
                                <li><a href="#">Brand Assets</a></li>
                                <li><a href="#">Investor Relations</a></li>
                                <li><a href="#">Terms of Service</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Features -->
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">Features</h3>
                            <ul>
                                <li><a href="#">Jobs</a></li>
                                <li><a href="#">Brand Assets</a></li>
                                <li><a href="#">Investor Relations</a></li>
                                <li><a href="#">Terms of Service</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Resources -->
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">Resources</h3>
                            <ul>
                                <li><a href="#">Guides</a></li>
                                <li><a href="#">Research</a></li>
                                <li><a href="#">Experts</a></li>
                                <li><a href="#">Agencies</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Subscribe -->
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">Subscribe</h3>
                            <p class="newsletter_text">Stay updated with our latest recipes and trends.</p>
                            <form action="#" class="newsletter_form">
                                <input type="email" placeholder="Enter your email">
                                <button type="submit"><i class="ti-angle-right"></i></button>
                            </form>
                        </div>
                    </div>
                </div><!-- row -->
            </div><!-- container -->
        </div><!-- footer_top -->

        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            &copy; <script>document.write(new Date().getFullYear());</script> Resepin.id — All rights reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- JS vendor -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>
    <script src="js/slick.min.js"></script>

    <!-- Contact js -->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>

    <!-- Init sederhana untuk carousel testimoni -->
    <script>
      (function ($) {
        "use strict";
        $(document).ready(function () {
          if ($(".customer_active").length && typeof $.fn.owlCarousel === "function") {
            $(".customer_active").owlCarousel({
              loop: true,
              margin: 30,
              items: 1,
              autoplay: true,
              autoplayTimeout: 3500,
              smartSpeed: 600,
              dots: true,
              nav: false
            });
          }
        });
      })(jQuery);
    </script>
</body>
</html>
