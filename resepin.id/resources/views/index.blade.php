<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>RESEPIN.ID</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS bawaan -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Custom font style -->
    <style>
        /* Font RESEPIN.ID */
        .resep-font {
            font-family: 'Montserrat', sans-serif;
            font-size: 4rem;
            font-weight: normal;
            color: white;
            letter-spacing: 2px;
            text-shadow: 0px 4px 8px rgba(0, 0, 0, 0.4);
            text-transform: uppercase;
            margin: 0;
        }


        .slider_area {
            position: relative;
            background-image: url('img/banner/banner.png'); 
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area ">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="index.php">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="about">About</a></li>
                                        <li><a href="Recipes">Recipes</a></li>
                                        <li><a href="#">Blog <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="blog">Blog</a></li>
                                                <li><a href="single-blog">Single Blog</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Pages <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="recipes_details">Recipes Details</a></li>
                                                <li><a href="elements">Elements</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="search_icon">
                                <a href="#"><i class="ti-search"></i></a>
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

    <!-- ===== slider_area_start ===== -->
    <div class="slider_area">
        <div class="container text-center">
            <h3 class="resep-font">RESEPIN.ID</h3>
        </div>
    </div>
    <!-- ===== slider_area_end ===== -->

    <!-- ===== MAKANAN BERAT ===== -->
    <div class="menu-section" style="min-height: 60vh;">
        <h2 style="text-align:center; margin-bottom:20px;">MAKANAN BERAT</h2>
        <div class="recepie_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single_recepie text-center">
                            <div class="recepie_thumb">
                                <img src="img/recepie/gado gado.jpg" alt="">
                            </div>
                            <h3>Gado - Gado</h3>
                            <span>Appetizer</span>
                            <p>Time Needs: 30 Mins</p>
                            <a href="#" class="line_btn">View Full Recipe</a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single_recepie text-center">
                            <div class="recepie_thumb">
                                <img src="img/recepie/pecel lele.jpg" alt="">
                            </div>
                            <h3>Pecel Lele</h3>
                            <span>Main Dish</span>
                            <p>Time Needs: 30 Mins</p>
                            <a href="#" class="line_btn">View Full Recipe</a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single_recepie text-center">
                            <div class="recepie_thumb">
                                <img src="img/recepie/bakso.jpg" alt="">
                            </div>
                            <h3>Bakso</h3>
                            <span>Main Dish</span>
                            <p>Time Needs: 25 Mins</p>
                            <a href="#" class="line_btn">View Full Recipe</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== MAKANAN RINGAN ===== -->
    <div class="menu-section" style="min-height: 60vh;">
        <h2 style="text-align:center;">MAKANAN RINGAN</h2>
        <div class="dish_area">
            <div class="container">
                <div class="dish_wrap d-flex justify-content-center">
                    <div class="single_dish text-center">
                        <div class="thumb">
                            <img src="img/recepie/sosis solo.jpg" alt="">
                        </div>
                        <h3>Sosis Solo</h3>
                    </div>
                    <div class="single_dish text-center">
                        <div class="thumb">
                            <img src="img/recepie/kentang-goreng.jpg" alt="">
                        </div>
                        <h3>Kentang Goreng</h3>
                    </div>
                    <div class="single_dish text-center">
                        <div class="thumb">
                            <img src="img/recepie/kue cubit.jpg" alt="">
                        </div>
                        <h3>Kue Cubit</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== RESEP POPULER ===== -->
    <div class="menu-section" style="min-height: 60vh;">
        <h2 style="text-align:center;">RESEP POPULER</h2>
        <div class="dish_area">
            <div class="container">
                <div class="dish_wrap d-flex justify-content-center">
                    <div class="single_dish text-center">
                        <div class="thumb">
                            <img src="img/recepie/soto.jpg" alt="">
                        </div>
                        <h3>Soto Ayam</h3>
                    </div>
                    <div class="single_dish text-center">
                        <div class="thumb">
                            <img src="img/recepie/nasigoreng.jpg" alt="">
                        </div>
                        <h3>Nasi Goreng</h3>
                    </div>
                    <div class="single_dish text-center">
                        <div class="thumb">
                            <img src="img/recepie/mie ayam.jpg" alt="">
                        </div>
                        <h3>Mie Ayam</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== FOOTER ===== -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
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
                    <div class="col-xl-2 col-md-6 col-lg-2">
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
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <h3 class="footer_title">Subscribe</h3>
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
            <div class="container text-center">
                <p style="margin:0; color:#777;">© 2025 Resepin.ID — All Rights Reserved</p>
            </div>
        </div>
    </footer>

</body>
</html>
