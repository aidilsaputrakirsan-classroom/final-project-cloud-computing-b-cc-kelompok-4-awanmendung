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

        .dish_area {
            margin-top: 80px;
            padding: 80px 0 90px;
            background: radial-gradient(circle at top, #fffefd 0%, #fafafa 45%, #f5f7fa 100%);
        }

        .dish_area .section_title h3 {
            margin-bottom: 8px;
        }

        .dish_area .section_title p {
            margin-bottom: 0;
            color: #666;
        }

        .dish_area .section_title span.small_hint {
            display: inline-block;
            margin-top: 6px;
            font-size: .9rem;
            color: #888;
        }

        .dish_area .dish_wrap {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 32px;
            margin-top: 52px;
        }

        .favorite_card {
            text-decoration: none !important;
            color: inherit !important;
            display: block;
        }

        .dish_area .single_dish {
            background: #ffffff;
            border-radius: 24px;
            padding: 32px 24px 30px;
            box-shadow: 0 12px 32px rgba(0,0,0,.06);
            max-width: 330px;
            transition: .25s ease;
            position: relative;
            overflow: hidden;
        }

        .favorite_card:hover .single_dish {
            transform: translateY(-8px);
            box-shadow: 0 18px 38px rgba(0,0,0,.12);
        }

        .favorite_badge {
            position: absolute;
            top: 16px;
            left: 18px;
            padding: 4px 11px;
            border-radius: 999px;
            font-size: .78rem;
            font-weight: 600;
            color: #fff;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            letter-spacing: .03em;
            text-transform: uppercase;
            box-shadow: 0 4px 12px rgba(0,0,0,.18);
        }

        .favorite_badge i {
            font-size: .9rem;
        }

        .favorite_card-1 .favorite_badge {
            background: linear-gradient(135deg, #f8b500, #ff7b00);
        }

        .favorite_card-2 .favorite_badge {
            background: linear-gradient(135deg, #ff6f91, #ff9671);
        }

        .favorite_card-3 .favorite_badge {
            background: linear-gradient(135deg, #4facfe, #00c9a7);
        }

        .dish_area .single_dish .thumb {
            position: static !important;
            top: auto !important;
            left: auto !important;
            transform: none !important;
            margin: 10px auto 18px auto !important;
            text-align: center;
        }

        .dish_area .single_dish .thumb img {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #fff;
            box-shadow: 0 6px 18px rgba(0,0,0,.14);
        }

        .dish_area .single_dish h3 {
            margin-top: 4px;
            font-size: 1.12rem;
        }

        .dish_area .single_dish p {
            font-size: .97rem;
            color: #555;
            margin-top: 8px;
        }

        .favorite_rank {
            display: inline-block;
            margin-top: 4px;
            padding: 2px 10px;
            font-size: .78rem;
            border-radius: 999px;
            background: #f3f4ff;
            color: #555;
        }

        @media (max-width: 767.98px) {
            .dish_area {
                padding: 60px 0 70px;
            }
            .dish_area .single_dish {
                max-width: 100%;
            }
        }
    </style>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tentang - resepin.id</title>
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
                                            <li>
                                            <a href="about.php"
                                            style="color:#00FF00 !important; font-weight:700; border-bottom:2px solid #00FF00; padding-bottom:4px;">
                                            Tentang
                                            </a>
                                        </li>
                                        <li><a href="recipes">Resep</a></li>
                                       <li><a href="bookmarks">Bookmarks <Bookmarks></a></li>
                                        <li><a href="contact">Kontak</a></li>

                                </nav>
                            </div>
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

<!-- bradcam_area -->
<div class="slider_area bradcam_bg_1">
            <div class="single_slider d-flex align-items-center bradcam_bg_1">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                         <div class="col-xl-8 text-center slider_text">
                            <div class="bradcam_text text-center">
                        <h1 class="hero_title">Tentang resepin.id</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /bradcam_area  -->

<!-- recepie_header_area -->
<div class="recepie_header_area" style="padding-top: 80px; padding-bottom: 80px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="recepie_text text-center">
                    <h3 style="font-size: 42px; font-weight: 700;">Apa itu resepin.id ???</h3>
                    <p style="max-width: 820px; margin: 0 auto; font-size: 16px; line-height: 26px; margin-top: 18px;">
                        resepin.id adalah platform yang menyediakan berbagai resep masakan rumahan, tradisional, hingga modern dengan penyajian yang mudah dipahami. Semua resep kami disajikan dengan langkah-langkah jelas, takaran tepat, dan visual yang menarik untuk membantu kamu memasak lebih percaya diri.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- latest_trand_area -->
<div class="latest_trand_area" style="padding-top: 40px; padding-bottom: 60px;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="trand_info text-center">
                    <p>Ribuan resep menunggu untuk kamu coba</p>
                    <h3 style="font-weight: 700;">Temukan Resep Terbaru yang Sedang Populer</h3>
                    <a href="recipes.php" class="boxed-btn3" style="margin-top: 20px;">Lihat Semua Resep</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FOOTER -->
   <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">

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
                </div>
            </div>
        </div>

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

<!-- JS -->
<script src="js/vendor/modernizr-3.5.0.min.js"></script>
<script src="js/vendor/jquery-1.12.4.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
script src="js/isotope.pkgd.min.js"></script>
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
<script src="js/contact.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/main.js"></script>

</body>
</html>
