<!doctype html>
<html class="no-js" lang="zxx">

<style>
    /* CSS untuk Rating Bintang */
.rating-box {
    margin-top: 20px;
    padding: 15px 20px;
    border: 1px solid #e6e6e6;
    border-radius: 10px;
    text-align: center;
    background: #fff;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.rating-stars {
    display: flex;
    justify-content: center;
    gap: 8px;
    font-size: 28px;
    color: #ccc; /* Warna bintang default (kosong) */
    cursor: pointer;
    margin: 10px 0;
}

.star {
    transition: color 0.15s, transform 0.1s;
}

/* Warna bintang terisi */
.star.filled,
.rating-stars:hover .star {
    color: #f8b500;
}

/* Efek hover (mengisi hingga posisi kursor) */
.rating-stars:hover .star:hover,
.rating-stars:hover .star:hover ~ .star {
    color: #ccc;
}
.rating-stars:hover .star:hover {
    color: #f8b500;
}
.star.filled ~ .star {
    color: #ccc; /* Pastikan bintang setelah yang terisi menjadi kosong */
}

/* Efek hover saat bintang diisi (berdasarkan data-hover) */
.rating-stars[data-hover="1"] .star:nth-child(-n+1),
.rating-stars[data-hover="2"] .star:nth-child(-n+2),
.rating-stars[data-hover="3"] .star:nth-child(-n+3),
.rating-stars[data-hover="4"] .star:nth-child(-n+4),
.rating-stars[data-hover="5"] .star:nth-child(-n+5) {
    color: #f8b500;
}

/* Efek Klik */
.star.clicked {
    animation: click-anim 0.5s ease-out;
}
@keyframes click-anim {
    0% { transform: scale(1); }
    50% { transform: scale(1.3); color: #f8b500; }
    100% { transform: scale(1); }
}

#rating-text {
    font-weight: 600;
    color: #555;
    font-size: 1rem;
    min-height: 1.5em; /* Jaga tinggi agar tidak bergeser */
}
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
        background-image: url('img/banner/banner_baru_1.png');
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

    .recipe-title {
    text-align: center;
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 25px;
}

.recipe-cookpad-container {
    display: flex;
    justify-content: center;
    gap: 40px;
    margin-top: 20px;
    align-items: flex-start;
    flex-wrap: wrap;
}

.recipe-image {
    width: 480px;
    max-width: 100%;
    border-radius: 20px;
    display: block;
    margin: 0 auto;
    box-shadow:0 8px 22px rgba(0,0,0,0.15);
}

.recipe-action-panel {
    display: flex;
    flex-direction: column;
    gap: 16px;
    margin-top: 20px;
}

.comment-box-side {
    width: 280px;
    padding: 0;
}

.comment-box-side .form-control{
    font-size: 14px;
}

.recipe-section p,
.recipe-section li,
.step-list p,
.step-list li {
    margin-left: 0 !important;
    padding-left: 0 !important;
    text-align: left;
}

/* List langkah memasak */
.step-list {
    list-style: decimal;
    padding-left: 25px !important;
    margin: 0 auto;
    max-width: 480px;
}

/* Judul section hijau tengah */
.section-title {
    text-align: right;
    font-size: 20px;
    font-weight: 700;
    margin: 40px 0 15px;
    color: #28a745;
}

/* CUSTOM STYLE UNTUK LAYOUT BARU */
.recipe-layout-container {
    display: flex; /* Mengaktifkan Flexbox untuk layout berdampingan */
    flex-wrap: wrap;
    gap: 30px;
    margin-top: 30px;
    justify-content: center;
}

.recipe-main-content {
    flex-basis: 480px;
    flex-grow: 0;
    max-width: 100%;
}

.recipe-side-panel {
    flex-basis: 350px;
    flex-grow: 1;
    max-width: 100%;
}

.detail-resep-card {
    background: #ffffff;
    border: 1px solid #e6e6e6;
    border-radius: 14px;
    padding: 30px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.06);
}

.detail-resep-card h2,
.detail-resep-card h3 {
    color: #28a745;
    font-weight: 700;
    text-align: center;

}


/* Media Query untuk Responsif */
@media (max-width: 850px) {
    .recipe-layout-container {
        flex-direction: column; /* Tumpuk ke bawah di layar kecil */
        align-items: center;
    }
    .recipe-main-content,
    .recipe-side-panel {
        flex-basis: auto;
        max-width: 100%;
    }
}
</style>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Resep Detail - resepin.id</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    <!-- Style kecil untuk Like, Comment & Save -->
    <style>
      .react-bar{display:flex;gap:14px;align-items:center;margin:12px 0}
      .react-bar button{border:0;background:transparent;display:inline-flex;align-items:center;gap:6px;font-size:16px;cursor:pointer;padding:6px 10px;border-radius:10px;transition:background .2s}
      .react-bar button:hover{background:rgba(0,0,0,.05)}
      .react-bar .btn-like.liked .fa-heart{color:#e0245e;transform:scale(1.08)}
      .react-bar .btn-save.saved .fa-bookmark{color:#f0ad4e;transform:scale(1.1)}
      .comment-wrap{border:none !important;border-radius:10px;padding:0;margin:8px 0 20px;background:transparent}
      .comment-wrap .comment-list{list-style:none;margin:12px 0 0;padding:0}
      .comment-wrap .comment-list li{border-top:1px dashed #ddd;padding:10px 2px}
      .comment-wrap .comment-author{font-weight:600}
      .comment-wrap .comment-date{opacity:.6;font-size:12px;margin-left:6px}
    </style>
</head>

<body>

<script>
    window.isLoggedIn = @json(session()->has('supabase_token'));
    console.log("🔐 Blade Login Status:", window.isLoggedIn);
</script>

<!-- HEADER -->
<header>
    <div class="header-area">
        <div id="sticky-header" class="main-header-area">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-xl-3 col-lg-2">
                        <div class="logo">
                            <a href="/recipes_details">
                                <img src="/img/resepinid_logofix.png" alt="Logo resepin.id">
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-7">
                        <div class="main-menu white_text d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="/index">Beranda</a></li>
                                    <li><a href="/about">Tentang</a></li>
                                    <li><a href="/recipes">Resep</a></li>
                                    <li><a href="/bookmarks">Bookmarks</a></li>
                                    <li><a href="/contact">Kontak</a></li>
                                </ul>
                                    </nav>
                                </div>
                            <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>


    <!-- TITLE -->
<div class="bradcam_area breadcam_bg_4">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h1 class="hero_title">Resep Detail</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top:60px; margin-bottom:80px;">

    <!-- Nama Resep (Dynamic) -->
        <h2 id="nama_resep" class="recipe-title">Loading...</h2>

        <div class="recipe-layout-container">

            <div class="recipe-main-content">

                <!-- Gambar Resep (Dynamic) -->
                <img id="gambar_resep" class="recipe-image"
                    src="assets/img/no-image.jpg" alt="Gambar Resep">

                <div class="recipe-action-panel">

                    <!-- Rating Tetap -->
                       <div class="rating-box">
                            <div id="rating-stars" class="rating-stars" data-recipe-slug="">
                            <span class="star" data-value="1">★</span>
                            <span class="star" data-value="2">★</span>
                            <span class="star" data-value="3">★</span>
                            <span class="star" data-value="4">★</span>
                            <span class="star" data-value="5">★</span>
                        </div>
                        <p id="rating-text">Click to rate</p>
                    </div>

                    <!-- Like / Comment / Save Tetap -->
                    <div class="react-bar">
                        <button class="btn-like" type="button">
                            <i class="fa fa-heart"></i>
                            <span class="like-count">0</span> Suka
                        </button>
                        <button class="btn-comment-toggle" type="button">
                            <i class="fa fa-comment"></i>
                            <span class="comment-count">0</span> Komentar
                        </button>
                        <button class="btn-save" type="button">
                            <i class="fa fa-bookmark"></i>
                            Simpan
                        </button>
                    </div>
                </div>

                <!-- Komentar Tetap -->
                <div class="comment-wrap" data-recipe-slug="">
                    <form class="comment-form">
                        <input type="text" name="name" placeholder="Nama (opsional)" class="form-control mb-2">
                        <textarea name="message" placeholder="Tulis komentar..." class="form-control mb-2" required></textarea>
                        <button type="submit" class="btn btn-sm btn-primary">Kirim</button>
                    </form>
                    <ul class="comment-list"></ul>
                </div>
            </div>

            <div class="recipe-side-panel">
                <div class="detail-resep-card">
                    <h2 class="detail-title">Detail Resep</h2>

                    <h3>Kategori</h3>
                    <p id="kategori_resep">-</p>

                    <h3>Alat Memasak</h3>
                    <ol id="alat_resep">
                        <li>Loading...</li>
                    </ol>

                    <h3>Bahan</h3>
                    <ol id="bahan_resep">
                        <li>Loading...</li>
                    </ol>

                    <h3>Langkah Memasak</h3>
                    <ol id="langkah_resep">
                        <li>Loading...</li>
                    </ol>
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

    <!-- JS Libraries -->
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
    <script type="module" src="../js/recipes_details.js"></script>


<!-- 👇 Supabase + deviceId + recipeSlug dari URL -->
<script src="https://unpkg.com/@supabase/supabase-js@2"></script>
<script>
  const SUPABASE_URL = "https://mybfahpmnpasjmhutmcr.supabase.co";
  const SUPABASE_ANON_KEY =
    "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im15YmZhaHBtbnBhc2ptaHV0bWNyIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NjEzMjg1MDgsImV4cCI6MjA3NjkwNDUwOH0.E_VI8-raJ3jRPAQc079j6jAhluiC4lSCmtIN9gMND6g";

  const { createClient } = window.supabase;
  window.supabaseClient = createClient(SUPABASE_URL, SUPABASE_ANON_KEY);

  // DEVICE ID (1x per browser)
  let deviceId = localStorage.getItem("device-id");
  if (!deviceId) {
    deviceId = "dev_" + Date.now() + "_" + Math.random().toString(36).slice(2, 10);
    localStorage.setItem("device-id", deviceId);
  }
  window.deviceId = deviceId;

  // RECIPE SLUG dari URL (?slug=… atau fallback ?id=…)
  const params = new URLSearchParams(window.location.search);
  window.recipeSlug = params.get("id");

  console.log("🔎 recipeSlug:", window.recipeSlug);
</script>

<!-- Inject recipeSlug ke data-attribute (optional dekorasi) -->
<script>
  const ratingStarsEl = document.getElementById("rating-stars");
  const commentWrapEl = document.querySelector(".comment-wrap");

  if (ratingStarsEl && window.recipeSlug) {
    ratingStarsEl.dataset.recipeSlug = window.recipeSlug;
  }
  if (commentWrapEl && window.recipeSlug) {
    commentWrapEl.dataset.recipeSlug = window.recipeSlug;
  }
</script>

<script>
async function loadRecipe() {
  const supabase = window.supabaseClient;
  const id = window.recipeSlug;

  const { data, error } = await supabase
    .from("recipes")
    .select("*")
    .eq("id", id)
    .single();

  if (error) {
    console.error("❌ Gagal load resep:", error);
    document.getElementById("nama_resep").innerText = "Resep tidak ditemukan";
    alert("Resep tidak ditemukan.");
    return;
  }

  // simpan id ke global supaya bookmark bisa pakai
  window.currentRecipeId = data.id;

  document.getElementById("nama_resep").innerText   = data.nama_resep;
  document.getElementById("gambar_resep").src       = data.gambar || "/img/noimage.jpg";
  document.getElementById("kategori_resep").innerText = data.kategori || "-";

  // untuk sekarang kamu pakai deskripsi untuk bahan & langkah
  document.getElementById("bahan_resep").innerHTML = (data.deskripsi || "")
    .split("\n")
    .map(i => `<li>${i}</li>`)
    .join("");

  document.getElementById("langkah_resep").innerHTML = (data.deskripsi || "")
    .split("\n")
    .map(s => `<li>${s}</li>`)
    .join("");
}

loadRecipe();
</script>

<!-- ====================== LIKE & COMMENT (Supabase) ====================== -->
<script>
(function () {
  const supabase      = window.supabaseClient;
  const recipeSlug    = window.recipeSlug;
  const deviceId      = window.deviceId;
  const ratingBox     = document.getElementById("rating-stars");

  if (!supabase || !recipeSlug || !ratingBox) {
    console.warn("❌ Supabase / recipeSlug / ratingBox tidak siap, skip like/comment.");
    return;
  }

  console.log("🎯 Like & Comment aktif untuk slug:", recipeSlug);

  const likeBtn        = document.querySelector(".btn-like");
  const likeCountEl    = document.querySelector(".like-count");
  const commentToggle  = document.querySelector(".btn-comment-toggle");
  const commentCountEl = document.querySelector(".comment-count");
  const commentWrap    = document.querySelector(".comment-wrap");
  const commentForm    = commentWrap.querySelector(".comment-form");
  const commentList    = commentWrap.querySelector(".comment-list");
  const saveBtn        = document.querySelector(".btn-save");

  let userLiked = false;

// -------------------------- LIKES --------------------------
async function loadLikes() {
  try {
    // ambil juga created_at supaya bisa ditampilkan dengan timezone WITA
    const { data, error } = await supabase
      .from("recipe_likes")
      .select("device_id, created_at")
      .eq("recipe_slug", recipeSlug);

    if (error) throw error;

    // jumlah like
    likeCountEl.textContent = data.length;

    // cek apakah device ini sudah pernah like
    const myLikeRow = data.find(row => row.device_id === deviceId);
    userLiked = !!myLikeRow;
    likeBtn.classList.toggle("liked", userLiked);

    if (myLikeRow) {
      const waktuLike = new Date(myLikeRow.created_at).toLocaleString("id-ID", {
        dateStyle: "short",
        timeStyle: "short",
        timeZone: "Asia/Makassar"
      });
      likeBtn.title = `Kamu menyukai resep ini pada ${waktuLike}`;
    } else {
      likeBtn.title = ""; // belum like, tooltip kosong
    }

  } catch (err) {
    console.error("❌ gagal load likes:", err);
  }
}

async function toggleLike() {
  // 🔒 CEK LOGIN DULU
  if (!window.isLoggedIn) {
    alert("Silakan login untuk memberi like.");
    window.location.href = "/login";
    return;
  }

  // Jika sudah login lanjutkan proses like / unlike
  try {
    console.log("👍 toggle like untuk:", recipeSlug, "device:", deviceId);

    if (userLiked) {
      // hapus like milik device ini
      const { error } = await supabase
        .from("recipe_likes")
        .delete()
        .eq("recipe_slug", recipeSlug)
        .eq("device_id", deviceId);

      if (error) throw error;
    } else {
      // tambah like baru, created_at otomatis now() di Supabase (UTC)
      const { error } = await supabase
        .from("recipe_likes")
        .insert([{
          recipe_slug: recipeSlug,
          device_id: deviceId
        }]);

      if (error) throw error;
    }

    // reload data supaya count + tooltip update
    await loadLikes();

  } catch (err) {
    console.error("❌ gagal menyimpan like:", err);
    alert("Gagal menyimpan like, coba lagi.");
  }
}

  // -------------------------- COMMENTS --------------------------
  function renderComments(rows) {
    commentList.innerHTML = "";
    rows.forEach(row => {
      const tanggal = new Date(row.created_at).toLocaleString("id-ID", {
        dateStyle: "short",
        timeStyle: "short",
      });

      const li = document.createElement("li");
      li.innerHTML = `
        <div>
          <span class="comment-author">${row.name || "Anonim"}</span>
          <span class="comment-date">${tanggal}</span>
        </div>
        <div>${row.message}</div>
      `;
      commentList.appendChild(li);
    });
  }

  async function loadComments() {
    try {
      console.log("📥 load comments untuk:", recipeSlug);

      const { data, error } = await supabase
        .from("recipe_comments")
        .select("name, message, created_at")
        .eq("recipe_slug", recipeSlug)
        .order("created_at", { ascending: true });

      if (error) throw error;

      renderComments(data);
      commentCountEl.textContent = data.length;
    } catch (err) {
      console.error("❌ gagal load komentar:", err);
    }
  }

  async function submitComment(e) {
  e.preventDefault();

  if (!window.isLoggedIn) {
    alert("Silakan login untuk mengirim komentar.");
    window.location.href = "/login";
    return;
  }

  const nameInput = commentForm.name.value.trim();
  const msgInput  = commentForm.message.value.trim();
  if (!msgInput) return;

  try {
    await supabase.from("recipe_comments").insert([
      { recipe_slug: recipeSlug, name: nameInput || null, message: msgInput }
    ]);

    commentForm.reset();
    await loadComments();
  } catch (err) {
    console.error("❌ gagal submit komentar:", err);
    alert("Komentar gagal tersimpan, coba lagi.");
  }
}

  // -------------------------- SAVE / BOOKMARK --------------------------


  // -------------------------- EVENT BIND --------------------------
  likeBtn.onclick = toggleLike;                     // ⬅ cuma 1 handler
  commentToggle.onclick = () => {
    commentWrap.hidden = !commentWrap.hidden;
  };
  commentForm.addEventListener("submit", submitComment);

  // -------------------------- INIT --------------------------
  loadLikes();
  loadComments();
})();
</script>

<!-- ====================== SAVE / BOOKMARK (SUPABASE) ====================== -->
<script>
(function () {
  const supabase = window.supabaseClient;
  const saveBtn  = document.querySelector(".btn-save");

  if (!supabase || !saveBtn) {
    console.warn("Supabase atau tombol save belum siap");
    return;
  }

  saveBtn.addEventListener("click", async () => {
    // wajib login dulu
    if (!window.isLoggedIn) {
      alert("Silakan login untuk menyimpan resep.");
      window.location.href = "/login";
      return;
    }

    // pakai EMAIL dari session Laravel
    const userEmail = "{{ session('user_email') }}";
    const recipeId  = window.currentRecipeId || (window.recipeSlug ? parseInt(window.recipeSlug, 10) : null);

    console.log("🔖 Bookmark klik -> userEmail:", userEmail, "recipeId:", recipeId);

    if (!userEmail) {
      alert("Email user di session kosong. Pastikan session('user_email') di-set saat login.");
      return;
    }

    if (!recipeId) {
      alert("Resep belum termuat dengan benar.");
      return;
    }

    // cek apakah sudah pernah disimpan
    const { data: existing, error: existErr } = await supabase
      .from("bookmarks")
      .select("id")
      .eq("user_email", userEmail)
      .eq("recipe_id", recipeId)
      .maybeSingle();

    if (existErr) {
      console.error("❌ Error cek bookmark:", existErr);
      alert("Gagal mengecek bookmark: " + (existErr.message || JSON.stringify(existErr)));
      return;
    }

    if (existing) {
      alert("Resep sudah tersimpan di Bookmarks.");
      saveBtn.classList.add("saved");
      return;
    }

    // insert baru
    const { error: insertErr } = await supabase
      .from("bookmarks")
     .insert([{
        user_email: userEmail,
        recipe_slug: recipeSlug,
        recipe_name: data.nama_resep,
        recipe_image: data.gambar,
        recipe_category: data.kategori
    }]);


    if (insertErr) {
      console.error("❌ Gagal insert bookmark:", insertErr);
      alert("Gagal menyimpan: " + (insertErr.message || JSON.stringify(insertErr)));
      return;
    }

    saveBtn.classList.add("saved");
    alert("Berhasil ditambahkan ke Bookmarks!");
  });
})();
</script>


<!-- ====================== RATING (boleh tetap terpisah) ====================== -->
<script>
(function(){
  const SUPABASE_URL = "https://mybfahpmnpasjmhutmcr.supabase.co";
  const SUPABASE_ANON_KEY =
    "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmZzZSIsInJlZiI6Im15YmZhaHBtbnBhc2ptaHV0bWNyIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NjEzMjg1MDgsImV4cCI6MjA3NjkwNDUwOH0.E_VI8-raJ3jRPAQc079j6jAhluiC4lSCmtIN9gMND6g";

  const { createClient } = window.supabase;
  const supabase = createClient(SUPABASE_URL, SUPABASE_ANON_KEY);

  const ratingContainer = document.getElementById("rating-stars");
  const ratingText      = document.getElementById("rating-text");
  const stars           = ratingContainer.querySelectorAll(".star");
  const recipeId        = window.recipeSlug; // pakai slug/id yang sama

  const ratingMessages = {
    1: "Poor 😞",
    2: "Fair 😐",
    3: "Good 🙂",
    4: "Very Good 😊",
    5: "Excellent! 🤩",
  };

  let currentRating = 0;
  let userSessionId = localStorage.getItem("user-session-id");
  if (!userSessionId) {
    userSessionId = "user_" + Date.now() + "_" + Math.random().toString(36).substr(2, 9);
    localStorage.setItem("user-session-id", userSessionId);
  }

  async function loadRating() {
    try {
      const { data: userRating, error: userError } = await supabase
        .from("recipe_ratings")
        .select("rating")
        .eq("recipe_id", recipeId)
        .eq("user_session_id", userSessionId)
        .single();

      if (userError && userError.code !== "PGRST116") {
        console.error("Error loading user rating:", userError);
      }

      if (userRating) {
        currentRating = userRating.rating;
        updateStars(currentRating);
        ratingText.textContent = ratingMessages[currentRating];
      } else {
        const { data: avgData, error: avgError } = await supabase
          .from("recipe_ratings")
          .select("rating")
          .eq("recipe_id", recipeId);

        if (avgError) {
          console.error("Error loading average rating:", avgError);
          ratingText.textContent = "Click to rate";
          return;
        }

        if (avgData && avgData.length > 0) {
          const avg = avgData.reduce((sum, item) => sum + item.rating, 0) / avgData.length;
          ratingText.textContent = `Average: ${avg.toFixed(1)} ⭐ (${avgData.length} ratings)`;
        } else {
          ratingText.textContent = "Be the first to rate!";
        }
      }
    } catch (error) {
      console.error("Error:", error);
      ratingText.textContent = "Click to rate";
    }
  }

  function updateStars(rating) {
    stars.forEach((star, index) => {
      if (index < rating) star.classList.add("filled");
      else star.classList.remove("filled");
    });
  }

  async function setRating(rating) {
    try {
      const { data: existing, error: checkError } = await supabase
        .from("recipe_ratings")
        .select("id")
        .eq("recipe_id", recipeId)
        .eq("user_session_id", userSessionId)
        .single();

      if (checkError && checkError.code !== "PGRST116") throw checkError;

      if (existing) {
        const { error: updateError } = await supabase
          .from("recipe_ratings")
          .update({ rating })
          .eq("id", existing.id);
        if (updateError) throw updateError;
      } else {
        const { error: insertError } = await supabase
          .from("recipe_ratings")
          .insert([{ recipe_id: recipeId, user_session_id: userSessionId, rating }]);
        if (insertError) throw insertError;
      }

      currentRating = rating;
      updateStars(rating);
      ratingText.textContent = ratingMessages[rating];
    } catch (error) {
      console.error("Error saving rating:", error);
      alert("Failed to save rating. Please try again.");
    }
  }

  loadRating();

  stars.forEach(star => {
    star.addEventListener("mouseenter", function () {
      const hoverValue = this.dataset.value;
      ratingContainer.setAttribute("data-hover", hoverValue);
      ratingText.textContent = ratingMessages[hoverValue];
    });

    star.addEventListener("click", function () {
      const rating = parseInt(this.dataset.value);
      setRating(rating);
    });
  });

  ratingContainer.addEventListener("mouseleave", function () {
    this.removeAttribute("data-hover");
    if (currentRating > 0) ratingText.textContent = ratingMessages[currentRating];
    else loadRating();
  });
})();
</script>

</body>
</html>
