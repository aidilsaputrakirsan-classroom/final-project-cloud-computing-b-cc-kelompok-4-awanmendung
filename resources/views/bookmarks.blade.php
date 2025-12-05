<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bookmarks - resepin.id</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">

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

        /* GRID BOOKMARKS */
        .blog_left_sidebar {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;  /* rata tengah */
            gap: 30px;
            padding: 10px 0 30px;
        }

        .blog_item {
            flex: 0 1 calc(33.333% - 30px); /* 3 kolom di desktop */
            max-width: calc(33.333% - 30px);
            margin: 0;
        }

        /* gambar card full isi card */
        .blog_item_img img {
            width: 100%;
            height: auto;
            border-radius: 14px 14px 0 0;
            object-fit: cover;
            display: block;
        }

        /* responsive: di layar kecil jadi 2 / 1 kolom */
        @media (max-width: 991.98px) {
            .blog_item {
                flex: 0 1 calc(50% - 20px);
                max-width: calc(50% - 20px);
            }
        }

        @media (max-width: 575.98px) {
            .blog_item {
                flex: 0 1 100%;
                max-width: 100%;
            }
        }
    </style>
</head>

<script type="module">
import { createClient } from "https://esm.sh/@supabase/supabase-js@2";

const SUPABASE_URL = "https://mybfahpmnpasjmhutmcr.supabase.co";
const SUPABASE_ANON_KEY =
"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im15YmZhaHBtbnBhc2ptaHV0bWNyIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NjEzMjg1MDgsImV4cCI6MjA3NjkwNDUwOH0.E_VI8-raJ3jRPAQc079j6jAhluiC4lSCmtIN9gMND6g";

const supabase = createClient(SUPABASE_URL, SUPABASE_ANON_KEY);

// ambil email user dari session Laravel
const userEmail = @json(session('user_email'));
console.log("EMAIL SESSION →", userEmail);

// container card
const container = document.querySelector(".blog_left_sidebar");

// cek login
if (!userEmail) {
    container.innerHTML = `
        <p style="text-align:center;">
            Kamu belum login.<br>
            <a href="/login" style="color:blue;">Login dulu untuk melihat bookmark.</a>
        </p>
    `;
    throw new Error("User belum login");
}

// Load bookmarks
async function loadBookmarks() {
    container.innerHTML = `<p style="text-align:center;">Sedang memuat data...</p>`;

    const { data, error } = await supabase
        .from("bookmarks")
        .select("*")
        .eq("user_email", userEmail)
        .order("created_at", { ascending: false });

    if (error) {
        console.error("Error load bookmarks:", error);
        container.innerHTML = "<p style='color:red;'>Gagal memuat bookmarks.</p>";
        return;
    }

    if (!data.length) {
        container.innerHTML = "<p style='text-align:center;'>Tidak ada bookmark tersimpan.</p>";
        return;
    }

    container.innerHTML = ""; // kosongkan

    data.forEach(item => {
        container.innerHTML += `
        <article class="blog_item">
            <div class="blog_item_img">
                <img src="${item.recipe_image || '/img/noimage.jpg'}"
                    alt="${item.recipe_name}"
                    class="card-img rounded-0">
            </div>
            <div class="blog_details">
                <a class="d-inline-block"
                    href="/recipes_details?id=${item.recipe_slug}">
                    <h2>${item.recipe_name}</h2>
                </a>
                <p>${item.recipe_category || '-'}</p>
            </div>
        </article>
        `;
    });
}

loadBookmarks();
</script>


<body>
    <!-- header-start -->
    <header>
        <div class="header-area">
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="index.php">
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
                                        <li>
                                            <a href="bookmarks.php"
                                               style="color:#00FF00 !important; font-weight:700; border-bottom:2px solid #00FF00; padding-bottom:4px;">
                                                Bookmarks
                                            </a>
                                        </li>
                                        <li><a href="contact">Kontak</a></li>
                                    </ul>
                                </nav>
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

    <!-- bradcam_area -->
    <div class="bradcam_area breadcam_bg_4">
        <div class="single_slider d-flex align-items-center">
            <div class="container h-1000 d-flex justify-content-center align-items-center">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-8 text-center slider_text">
                        <div class="bradcam_text text-center">
                            <h1 class="hero_title">Mau masak berdasarkan resep yang kamu simpan?</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /bradcam_area -->

    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <!-- Ubah ke col-lg-12 supaya lebar penuh -->
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <!-- Resep akan muncul di sini oleh JS -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

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

    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/main.js"></script>




    <?php include 'includes/feedback-widget.php'; ?>

</body>
</html>
