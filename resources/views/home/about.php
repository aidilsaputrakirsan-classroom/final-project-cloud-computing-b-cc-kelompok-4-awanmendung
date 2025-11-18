<!doctype html>
<html class="no-js" lang="zxx">

   <style>
        :root {
            --font-sans: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif,
            "Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
        }

        html { font-size: 17px; }

        body, button, input, select, textarea {
            font-family: var(--font-sans) !important;
            font-weight: 400;
            color: #2e2e2e;
            line-height: 1.8;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-sans) !important;
            font-weight: 600;
            color: #1a1a1a;
            line-height: 1.4;
        }

        p {
            font-size: 1.05rem;
            color: #3a3a3a;
            line-height: 1.9;
        }

        .logo { display: flex; align-items: center; }
        .logo img { max-height: 120px; width: auto; object-fit: contain; }

        #navigation > li > a {
            font-family: var(--font-sans);
            font-weight: 500;
            font-size: 1rem;
            color: #fff !important;
        }


        .slider_bg_1 {
            background-image: url('img/banner/banner.png');
            background-size: cover;
            background-position: center center;
            position: relative;
            min-height: 80vh;
        }

        @media (min-width: 1200px) {
            .slider_bg_1 { min-height: 88vh; }
        }

        .slider_bg_1::after {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,.35);
        }

        .slider_text {
            position: relative;
            z-index: 2;
        }

        .slider_text h1,
        .slider_text h3 {
            text-transform: none !important;
        }

        .hero_title {
            text-transform: none !important;
            font-size: clamp(2.6rem, 6vw + 1rem, 4.2rem);
            font-weight: 700;
            color: #fff;
            letter-spacing: -0.5px;
            margin: 0;
            padding: 0;
        }

        a.boxed-btn3 {
            background-color: #28a745;
            border-color: #28a745;
            color: #fff;
            padding: 10px 24px;
            border-radius: 6px;
            transition: .3s;
        }
        a.boxed-btn3:hover { background-color: #218838; }

        .single_recepie h3 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-top: 15px;
        }
        .line_btn {
            font-family: var(--font-sans);
            font-weight: 500;
            letter-spacing: .02em;
        }

        .section_title h3,
        .trand_info h3 {
            font-size: 2rem;
            font-weight: 700;
        }

        .footer_widget h3 {
            font-weight: 700;
            color: #111;
            font-size: 1.2rem;
        }
        .footer_widget ul li a {
            color: #666;
            transition: color .3s;
        }
        .footer_widget ul li a:hover { color: #28a745; }
        .newsletter_text { color: #555; }
        .copy_right { font-size: .9rem; color: #777; }

        .recepie_area,
        .dish_area,
        .latest_trand_area {
            margin-top: 60px;
        }
    </style>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tasty Recipes</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
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
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area">
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="img/resepinid_logofix.png" alt="Logo resepin.id">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu white_text d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="index.php">Beranda</a></li>
                                        <li><a href="about">Tentang</a></li>
                                        <li><a href="recipes">Resep</a></li>
                                       <li><a href="bookmarks">Bookmarks <Bookmarks></a></li>
                                        <li><a href="recipes_details">Halaman</a></li>
                                        <li><a href="contact">Kontak</a></li>

                                </nav>   
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="search_icon">
                                <a href="#">
                                    <i class="ti-search"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-8 text-center slider_text">
                    <div class="bradcam_text text-center">
                        <h3>About</h3>
                        <h3>resepin.id</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /bradcam_area  -->

    <!--/ recepie_header_area  -->

    <!-- recepie_videos   -->
    <div class="recepie_videoes_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="recepie_info">
                        <h3>Recipe videos 
                            that never misses 
                            any portion</h3>
                    <p>A collection of step-by-step recipe videos designed to guide you through every stage of cooking with perfect precision. No steps skipped, no portions missed—just clear, reliable instructions for delicious results every time.</p>
                    <div class="video_watch d-flex align-items-center">
                        <a class="popup-video" href="https://www.youtube.com/watch?v=lr6AMBsjxrY"> <i class="ti-control-play"></i> </a>
                        <div class="watch_text" >
                            <h4>Watch Video</h4>
                            <p>You will love our execution</p>
                        </div>
                    </div>
                    </div>
                </div>
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
            </div>
        </div>
    </div>
    <!--/ recepie_videos   -->

    <div class="latest_trand_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="trand_info text-center">
                        <p>Ribuan resep siap kamu coba di rumah</p>
                        <h3>Temukan resep nusantara yang sedang tren</h3>
                        <a href="recipes" class="boxed-btn3">Lihat Semua Resep</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- customer_feedback_area  -->
    <div class="customer_feedback_area padding_plus">
        <div class="container">
            <div class="row justify-content-center mb-50">
                <div class="col-xl-9">
                    <div class="section_title text-center">
                        <h3>Feedback From Customers</h3>
                        <p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially <br> in the workplace. That’s why it’s crucial that, as women.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="customer_active owl-carousel">
                        <div class="single_customer d-flex">
                            <div class="thumb">
                                <img src="img/testmonial/2.png" alt="">
                            </div>
                            <div class="customer_meta">
                                <h3>Adame Nesane</h3>
                                <span>Chief Customer</span>
                                <p>You're had. Subdue grass Meat us winged years you'll doesn't. fruit two also won one yielding creepeth third give may never lie alternet food.</p>
                            </div>
                        </div>
                        <div class="single_customer d-flex">
                            <div class="thumb">
                                <img src="img/testmonial/1.png" alt="">
                            </div>
                            <div class="customer_meta">
                                <h3>Adame Nesane</h3>
                                <span>Chief Customer</span>
                                <p>You're had. Subdue grass Meat us winged years you'll doesn't. fruit two also won one yielding creepeth third give may never lie alternet food.</p>
                            </div>
                        </div>
                        <div class="single_customer d-flex">
                            <div class="thumb">
                                <img src="img/testmonial/2.png" alt="">
                            </div>
                            <div class="customer_meta">
                                <h3>Adame Nesane</h3>
                                <span>Chief Customer</span>
                                <p>You're had. Subdue grass Meat us winged years you'll doesn't. fruit two also won one yielding creepeth third give may never lie alternet food.</p>
                            </div>
                        </div>
                        <div class="single_customer d-flex">
                            <div class="thumb">
                                <img src="img/testmonial/1.png" alt="">
                            </div>
                            <div class="customer_meta">
                                <h3>Adame Nesane</h3>
                                <span>Chief Customer</span>
                                <p>You're had. Subdue grass Meat us winged years you'll doesn't. fruit two also won one yielding creepeth third give may never lie alternet food.</p>
                            </div>
                        </div>
                        <div class="single_customer d-flex">
                            <div class="thumb">
                                <img src="img/testmonial/2.png" alt="">
                            </div>
                            <div class="customer_meta">
                                <h3>Adame Nesane</h3>
                                <span>Chief Customer</span>
                                <p>You're had. Subdue grass Meat us winged years you'll doesn't. fruit two also won one yielding creepeth third give may never lie alternet food.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / customer_feedback_area  -->



    <!-- footer  -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Top Products
                            </h3>
                            <ul>
                                <li><a href="#">Managed Website</a></li>
                                <li><a href="#"> Manage Reputation</a></li>
                                <li><a href="#">Power Tools</a></li>
                                <li><a href="#">Marketing Service</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Quick Links
                            </h3>
                            <ul>
                                <li><a href="#">Jobs</a></li>
                                <li><a href="#">Brand Assets</a></li>
                                <li><a href="#">Investor Relations</a></li>
                                <li><a href="#">Terms of Service</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Features
                            </h3>
                            <ul>
                                <li><a href="#">Jobs</a></li>
                                <li><a href="#">Brand Assets</a></li>
                                <li><a href="#">Investor Relations</a></li>
                                <li><a href="#">Terms of Service</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Resources
                            </h3>
                            <ul>
                                <li><a href="#">Guides</a></li>
                                <li><a href="#">Research</a></li>
                                <li><a href="#">Experts</a></li>
                                <li><a href="#">Agencies</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                            <div class="footer_widget">
                                    <h3 class="footer_title">
                                            Subscribe
                                    </h3>
                                    <p class="newsletter_text">You can trust us. we only send promo offers,</p>
                                    <form action="#" class="newsletter_form">
                                        <input type="text" placeholder="Enter your mail">
                                        <button type="submit"> <i class="ti-arrow-right"></i> </button>
                                    </form>
                                    
                                </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row align-items-center">
                    <div class="col-xl-8 col-md-8">
                        <p class="copy_right">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="ti-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ti-twitter-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-dribbble"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-behance"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<!--/ footer  -->

    <!-- JS here -->
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

    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>
</body>

</html>