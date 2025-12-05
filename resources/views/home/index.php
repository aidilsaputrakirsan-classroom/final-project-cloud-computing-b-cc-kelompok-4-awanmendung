<!doctype html>
<html class="no-js" lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Beranda - resepin.id</title>
    <meta name="description" content="Kumpulan resep masakan rumahan dan nusantara terbaik dari resepin.id">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

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
            background-image: url('img/banner/banner_baru.png');
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
        a.boxed-btn3:hover { background-color: #; }
        .btn-logout-red {

            background-color: #ff4444 !important;
            border-color: #ff4444 !important;
            color: #fff !important;
            padding: 10px 24px;
            border-radius: 6px;
            font-weight: 600;
            transition: .3s;
        }

        .btn-logout-red:hover {
            background-color: #cc0000 !important;
            border-color: #cc0000 !important;
        }

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

.galeri_card {
    display:block;
    background:#fff;
    border-radius:18px;
    padding:18px;
    text-align:center;
    text-decoration:none;
    box-shadow:0 10px 28px rgba(0,0,0,.08);
    transition:.25s ease;
}

.galeri_card:hover {
    transform:translateY(-6px);
    box-shadow:0 16px 36px rgba(0,0,0,.15);
}

.galeri_image img {
    width:100%;
    height:200px;
    object-fit:cover;
    border-radius:14px;
}

.galeri_title {
    font-size:1.25rem;
    font-weight:600;
    margin-top:12px;
    color:#222;
}


    </style>
</head>

<body>
    <header>
        <div class="header-area">
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="/">
                                    <img src="img/resepinid_logofix.png" alt="Logo resepin.id">
                                </a>
                            </div>

                        </div>
                        <div class="col-xl-6 col-lg-7">
    <div class="main-menu white_text d-none d-lg-block">
        <nav>
            <ul id="navigation">
                <li>
                    <a href="/"
                       style="color:#00FF00 !important; font-weight:700; border-bottom:2px solid #00FF00; padding-bottom:4px;">
                        Beranda
                    </a>
                </li>
                <li><a href="/about">Tentang</a></li>
                <li><a href="/recipes">Resep</a></li>
                <li><a href="/bookmarks">Bookmarks</a></li>
                <li><a href="/contact">Kontak</a></li>
            </ul>
        </nav>
    </div>
</div>

<div class="col-xl-3 col-lg-3 d-none d-lg-block">
    <div class="login_btn text-right">
        <?php if (session()->has('supabase_token')): ?>
            <!-- KETIKA SUDAH LOGIN: kotak merah KELUAR -->
            <a href="#"
               class="btn-logout-red"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Keluar
            </a>
        <?php else: ?>
            <!-- KETIKA BELUM LOGIN: tombol MASUK hijau -->
            <a href="/login" class="boxed-btn3">
                Masuk
            </a>
        <?php endif; ?>
    </div>
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

<form id="logout-form" action="<?php echo route('logout'); ?>" method="POST" style="display:none;">
    <?php echo csrf_field(); ?>
</form>

    <div class="slider_area">
        <div class="single_slider d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-8 text-center slider_text">
                        <h1 class="hero_title">resepin.id</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="recepie_area">
        <div class="container">
            <div class="row" id="home_resep">
            </div>
            <div id="resep_lainnya_btn"></div>

       </div>
<div class="dish_area" id="galeri_makanan">
    <div class="container">

        <div class="section_title text-center mb-5">
            <h3>Galeri Makanan Daerah</h3>
            <p>Inilah makanan dari berbagai pulau di Indonesia.</p>
        </div>

        <div class="row justify-content-center">

            <div class="col-md-4 mb-4">
                <a href="/galeri?region=jawa" class="galeri_card">
                    <div class="galeri_image">
                        <img src="img/galeri/jawa.jpg" alt="Makanan Khas Jawa">
                    </div>
                    <h4 class="galeri_title">Makanan Khas Jawa</h4>
                </a>
            </div>

            <div class="col-md-4 mb-4">
                <a href="/galeri?region=kalimantan" class="galeri_card">
                    <div class="galeri_image">
                        <img src="img/galeri/kalimantan.jpg" alt="Makanan Khas Kalimantan">
                    </div>
                    <h4 class="galeri_title">Makanan Khas Kalimantan</h4>
                </a>
            </div>

            <div class="col-md-4 mb-4">
                <a href="/galeri?region=sumatera" class="galeri_card">
                    <div class="galeri_image">
                        <img src="img/galeri/sumatera.jpg" alt="Makanan Khas Sumatera">
                    </div>
                    <h4 class="galeri_title">Makanan Khas Sumatera</h4>
                </a>
            </div>

            <div class="col-md-4 mb-4">
                <a href="/galeri?region=sulawesi" class="galeri_card">
                    <div class="galeri_image">
                        <img src="img/galeri/sulawesi.jpg" alt="Makanan Khas Sulawesi">
                    </div>
                    <h4 class="galeri_title">Makanan Khas Sulawesi</h4>
                </a>
            </div>

            <div class="col-md-4 mb-4">
                <a href="/galeri?region=papua" class="galeri_card">
                    <div class="galeri_image">
                        <img src="img/galeri/papua.jpg" alt="Makanan Khas Papua">
                    </div>
                    <h4 class="galeri_title">Makanan Khas Papua</h4>
                </a>
            </div>

            <div class="col-md-4 mb-4">
                <a href="/galeri?region=maluku" class="galeri_card">
                    <div class="galeri_image">
                        <img src="img/galeri/maluku.jpg" alt="Makanan Khas Maluku">
                    </div>
                    <h4 class="galeri_title">Makanan Khas Maluku</h4>
                </a>
            </div>

            <div class="col-md-4 mb-4">
                <a href="/galeri?region=nusatenggara" class="galeri_card">
                    <div class="galeri_image">
                        <img src="img/galeri/nusatenggara.jpg" alt="Makanan Khas Nusa Tenggara">
                    </div>
                    <h4 class="galeri_title">Makanan Khas Nusa Tenggara</h4>
                </a>
            </div>

        </div>
    </div>
</div>

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

    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>
    <script type="module" src="../js/home.js"></script>


    <?php include 'includes/feedback-widget.php'; ?>


</body>
</html>
