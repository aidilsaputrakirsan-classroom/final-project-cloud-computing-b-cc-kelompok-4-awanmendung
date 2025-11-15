<!doctype html>
<html class="no-js" lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>resepin.id</title>
    <meta name="description" content="Kumpulan resep masakan rumahan dan nusantara terbaik dari resepin.id">
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

    <!-- Fonts: Instrument Sans -->
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
            background-image: url('img/banner/banner.png');
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
            font-weight: 700; color: #fff; letter-spacing: 0.03em;
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
        .recepie_area, .dish_area, .latest_trand_area, .customer_feedback_area, .download_app_area { margin-top: 60px; }
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
                                    <img src="img/resepinid_logofix.png" alt="Logo resepin.id">
                                </a>
                            </div>
                        </div>
                        <!-- Menu -->
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu white_text d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="about">About</a></li>
                                        <li><a href="recipes">Recipes</a></li>
                                        <li><a href="bookmarks">Bookmarks</a></li>
                                        <li><a href="pages">Pages</a>
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
                        <!-- Right -->
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
                            <img src="img/recepie/recpie_1.png" alt="Nasi Goreng Kampung">
                        </div>
                        <h3>Nasi Goreng Kampung</h3>
                        <span>Menu Utama</span>
                        <p>Waktu: 30 menit</p>
                        <a href="recipes_details" class="line_btn">Lihat Resep Lengkap</a>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single_recepie text-center">
                        <div class="recepie_thumb">
                            <img src="img/recepie/recpie_2.png" alt="Soto Ayam Nusantara">
                        </div>
                        <h3>Soto Ayam Nusantara</h3>
                        <span>Sup &amp; Kuah</span>
                        <p>Waktu: 30 menit</p>
                        <a href="recipes_details" class="line_btn">Lihat Resep Lengkap</a>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single_recepie text-center">
                        <div class="recepie_thumb">
                            <img src="img/recepie/recpie_3.png" alt="Mie Goreng Jawa">
                        </div>
                        <h3>Mie Goreng Jawa</h3>
                        <span>Menu Utama</span>
                        <p>Waktu: 30 menit</p>
                        <a href="recipes_details" class="line_btn">Lihat Resep Lengkap</a>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- recepie_area -->

    <!-- Dish Area: Resep Paling Favorit -->
    <div class="dish_area">
        <div class="container">
            <div class="row mb-4">
                <div class="col-xl-12">
                    <div class="section_title text-center">
                        <h3>Resep Paling Favorit</h3>
                        <p>Koleksi menu yang paling sering dimasak dan disukai oleh pengguna resepin.id.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="dish_wrap d-flex">
                        <div class="single_dish text-center">
                            <div class="thumb">
                                <img src="img/recepie/recpie_4.png" alt="Ayam Bakar Madu">
                            </div>
                            <h3>Ayam Bakar Madu</h3>
                            <p>Ayam berbumbu manis gurih dengan sentuhan madu, cocok untuk makan malam keluarga atau acara spesial.</p>
                        </div>
                        <div class="single_dish text-center">
                            <div class="thumb">
                                <img src="img/recepie/recpie_5.png" alt="Rendang Daging Padang">
                            </div>
                            <h3>Rendang Daging Padang</h3>
                            <p>Dimasak pelan dengan santan dan rempah lengkap sampai meresap, jadi lauk andalan di meja makan.</p>
                        </div>
                        <div class="single_dish text-center">
                            <div class="thumb">
                                <img src="img/recepie/recpie_6.png" alt="Sate Ayam Bumbu Kacang">
                            </div>
                            <h3>Sate Ayam Bumbu Kacang</h3>
                            <p>Potongan ayam empuk dengan bumbu kacang kental dan taburan bawang goreng, favorit di setiap kesempatan.</p>
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
                        <p>Ribuan resep siap kamu coba di rumah</p>
                        <h3>Temukan resep nusantara yang sedang tren</h3>
                        <a href="recipes" class="boxed-btn3">Lihat Semua Resep</a>
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
                        <h3>Testimoni dari Pengguna</h3>
                        <p>Para pengguna resepin.id berbagi pengalaman mereka setelah mencoba berbagai resep pilihan.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="customer_active owl-carousel">
                        <div class="single_customer d-flex">
                            <div class="thumb">
                                <img src="img/testmonial/1.png" alt="Foto pengguna">
                            </div>
                            <div class="customer_meta">
                                <h3>Adame Nesane</h3>
                                <span>Pecinta Masakan Rumahan</span>
                                <p>Resepnya mudah diikuti dan rasanya enak sekali. Keluarga saya jadi lebih sering makan bersama di rumah.</p>
                            </div>
                        </div>
                        <div class="single_customer d-flex">
                            <div class="thumb">
                                <img src="img/testmonial/2.png" alt="Foto pengguna">
                            </div>
                            <div class="customer_meta">
                                <h3>Mary Jane</h3>
                                <span>Blogger Kuliner</span>
                                <p>Banyak inspirasi menu baru di sini. Cocok untuk konten dan juga masakan sehari-hari.</p>
                            </div>
                        </div>
                        <div class="single_customer d-flex">
                            <div class="thumb">
                                <img src="img/testmonial/3.png" alt="Foto pengguna">
                            </div>
                            <div class="customer_meta">
                                <h3>John Doe</h3>
                                <span>Koki Rumahan</span>
                                <p>Resep-resepnya praktis, bahan mudah didapat, dan rasanya pas di lidah keluarga Indonesia.</p>
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
                            <img src="img/video/big_1.png" alt="Ilustrasi aplikasi resep">
                        </div>
                        <div class="small_01">
                            <img src="img/video/small_sm1.png" alt="Ilustrasi aplikasi 1">
                        </div>
                        <div class="small_02">
                            <img src="img/video/sm2.png" alt="Ilustrasi aplikasi 2">
                        </div>
                    </div>
                </div>
                <!-- Text -->
                <div class="col-xl-6 col-md-6">
                    <div class="download_text">
                        <h3>Unduh aplikasi untuk dapatkan resep dari mana saja</h3>
                        <div class="download_android_apple">
                            <a class="active" href="#">
                                <div class="download_link d-flex">
                                    <i class="fa fa-apple"></i>
                                    <div class="store">
                                        <h5>Tersedia</h5>
                                        <p>di App Store</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="download_link d-flex">
                                    <i class="fa fa-android"></i>
                                    <div class="store">
                                        <h5>Unduh</h5>
                                        <p>dari Play Store</p>
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
                            <h3 class="footer_title">Layanan Utama</h3>
                            <ul>
                                <li><a href="#">Website Resep</a></li>
                                <li><a href="#">Pengaturan Koleksi Resep</a></li>
                                <li><a href="#">Alat Bantu Memasak</a></li>
                                <li><a href="#">Layanan Promosi</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Quick Links -->
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">Tautan Cepat</h3>
                            <ul>
                                <li><a href="#">Karier</a></li>
                                <li><a href="#">Aset Brand</a></li>
                                <li><a href="#">Hubungan Investor</a></li>
                                <li><a href="#">Syarat Layanan</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Features -->
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">Fitur</h3>
                            <ul>
                                <li><a href="#">Resep Tersimpan</a></li>
                                <li><a href="#">Mode Memasak</a></li>
                                <li><a href="#">Rating &amp; Ulasan</a></li>
                                <li><a href="#">Berbagi ke Teman</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Resources -->
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">Sumber Daya</h3>
                            <ul>
                                <li><a href="#">Panduan Memasak</a></li>
                                <li><a href="#">Artikel &amp; Riset</a></li>
                                <li><a href="#">Tips dari Ahli</a></li>
                                <li><a href="#">Komunitas &amp; Mitra</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Subscribe -->
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">Berlangganan</h3>
                            <p class="newsletter_text">Dapatkan info resep dan tren masakan terbaru langsung ke email kamu.</p>
                            <form action="#" class="newsletter_form">
                                <input type="email" placeholder="Masukkan email kamu">
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
                            &copy; <script>document.write(new Date().getFullYear());</script> Resepin.id — Hak cipta dilindungi.
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
