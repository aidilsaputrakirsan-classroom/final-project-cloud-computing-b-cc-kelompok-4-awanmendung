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
    <!-- HEADER -->
    <header>
        <div class="header-area">
            <div id="sticky-header" class="main-header-area ">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="index">
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
                                        <li><a href="bookmarks">Bookmarks</a></li>
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
    <h2 class="recipe-title">Chicken Mushroom Sauce</h2>

    <div class="recipe-layout-container">
        <div class="recipe-main-content"> 
            <img src="img/recepie/recepie_details.png" class="recipe-image" alt="Chicken Mushroom Sauce">

            <div class="recipe-action-panel">
                <div class="rating-box">
    <div id="rating-stars" class="rating-stars" data-recipe-id="chicken-mushroom-sauce">
        <span class="star" data-value="1">★</span>
        <span class="star" data-value="2">★</span>
        <span class="star" data-value="3">★</span>
        <span class="star" data-value="4">★</span>
        <span class="star" data-value="5">★</span>
    </div>
    <p id="rating-text">Click to rate</p>
</div>
                <div class="react-bar" data-item-id="chicken-mushroom-sauce">
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
            
            <div class="comment-wrap" data-for="chicken-mushroom-sauce" hidden>
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
                <h2>Detail Resep</h2>
                <h3>Alat Memasak</h3>
                <ol>
                    <li>Wajan anti lengket</li>
                    <li>Spatula</li>
                    <li>Pisau &amp; Talenan</li>
                    <li>Mangkuk marinasi</li>
                </ol>

                <h3>Bahan</h3>
                <ol>
                    <li>200g dada ayam</li>
                    <li>1 siung bawang putih</li>
                    <li>½ bawang bombay</li>
                    <li>Jamur champignon</li>
                    <li>Garam, lada, dan bumbu marinasi</li>
                    <li>Kentang goreng (opsional)</li>
                </ol>

                <h3>Langkah Memasak</h3>
                <ol>
                    <li>Marinasi ayam selama 15 menit dengan bumbu.</li>
                    <li>Pan-fry ayam hingga kecokelatan, sisihkan.</li>
                    <li>Tumis bawang putih dan bawang bombay hingga harum.</li>
                    <li>Masukkan jamur champignon, tumis hingga layu.</li>
                    <li>Tambahkan sedikit air &amp; bumbu, masak hingga menjadi saus.</li>
                    <li>Sajikan ayam dan kentang dengan saus jamur.</li>
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

    <!-- ✅ Script Like, Comment & Save -->
    <script>
    (function(){
      const LS_KEY='tasty-recipe-reactions-v1';
      const store={
        get(){try{return JSON.parse(localStorage.getItem(LS_KEY))||{}}catch(e){return{}};},
        set(d){localStorage.setItem(LS_KEY,JSON.stringify(d));}
      };
      const fmt=()=>{const d=new Date();return`${d.getFullYear()}-${String(d.getMonth()+1).padStart(2,'0')}-${String(d.getDate()).padStart(2,'0')} ${d.getHours()}:${String(d.getMinutes()).padStart(2,'0')}`};
      const render=(wrap,cmts)=>{const ul=wrap.querySelector('.comment-list');ul.innerHTML=cmts.map(c=>`<li><div><span class="comment-author">${c.name}</span><span class="comment-date">${c.date}</span></div><div>${c.message}</div></li>`).join('');};

      function init(){
        document.querySelectorAll('.react-bar').forEach(bar=>{
          const id=bar.dataset.itemId;
          const db=store.get();
          if(!db[id]) db[id]={likes:0,liked:false,comments:[],saved:false};
          store.set(db);

          const item=db[id];
          const likeBtn=bar.querySelector('.btn-like');
          const likeCount=bar.querySelector('.like-count');
          const cBtn=bar.querySelector('.btn-comment-toggle');
          const cCount=bar.querySelector('.comment-count');
          const saveBtn=bar.querySelector('.btn-save');
          const wrap=document.querySelector(`.comment-wrap[data-for="${id}"]`);

          if(!wrap) return;

          likeCount.textContent=item.likes;
          cCount.textContent=item.comments.length;
          if(item.liked) likeBtn.classList.add('liked');
          if(item.saved) saveBtn.classList.add('saved');

          likeBtn.addEventListener('click',()=>{
            const d=store.get(); const it=d[id];
            it.liked=!it.liked;
            it.likes+=it.liked?1:-1;
            store.set(d);
            likeBtn.classList.toggle('liked',it.liked);
            likeCount.textContent=it.likes;
          });

          cBtn.addEventListener('click',()=>{ wrap.hidden=!wrap.hidden; });

          saveBtn.addEventListener('click',()=>{
            const d=store.get(); const it=d[id];
            it.saved=!it.saved;
            store.set(d);
            saveBtn.classList.toggle('saved', it.saved);
            alert(it.saved ? 'Recipe saved!' : 'Recipe removed from bookmarks.');
          });

          const form=wrap.querySelector('.comment-form');
          form.addEventListener('submit',e=>{
            e.preventDefault();
            const name=form.name.value||'Anonim';
            const msg=form.message.value.trim();
            if(!msg) return;
            const d=store.get(); const it=d[id];
            it.comments.push({name, message:msg, date:fmt()});
            store.set(d);
            form.reset();
            render(wrap,it.comments);
            cCount.textContent=it.comments.length;
          });

          render(wrap,item.comments);
        });
      }

      document.addEventListener('DOMContentLoaded',init);
    })();
    </script>

    
    <!-- ✅ Supabase SDK -->
    <script src="https://unpkg.com/@supabase/supabase-js@2"></script>

    <!-- ✅ Script Interactive Rating with Supabase -->
    <script>
    (function(){
      // Supabase Configuration
      const SUPABASE_URL = "https://mybfahpmnpasjmhutmcr.supabase.co";
      const SUPABASE_ANON_KEY = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im15YmZhaHBtbnBhc2ptaHV0bWNyIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NjEzMjg1MDgsImV4cCI6MjA3NjkwNDUwOH0.E_VI8-raJ3jRPAQc079j6jAhluiC4lSCmtIN9gMND6g";

      const { createClient } = window.supabase;
      const supabase = createClient(SUPABASE_URL, SUPABASE_ANON_KEY);

      const ratingContainer = document.getElementById('rating-stars');
      const ratingText = document.getElementById('rating-text');
      const stars = ratingContainer.querySelectorAll('.star');
      const recipeId = ratingContainer.dataset.recipeId;
      
      const ratingMessages = {
        1: 'Poor 😞',
        2: 'Fair 😐',
        3: 'Good 🙂',
        4: 'Very Good 😊',
        5: 'Excellent! 🤩'
      };
      
      let currentRating = 0;
      let userSessionId = localStorage.getItem('user-session-id');
      
      // Generate unique session ID if not exists
      if (!userSessionId) {
        userSessionId = 'user_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);
        localStorage.setItem('user-session-id', userSessionId);
      }
      
      // Load rating from Supabase
      async function loadRating() {
        try {
          // Get user's rating
          const { data: userRating, error: userError } = await supabase
            .from('recipe_ratings')
            .select('rating')
            .eq('recipe_id', recipeId)
            .eq('user_session_id', userSessionId)
            .single();
          
          if (userError && userError.code !== 'PGRST116') {
            console.error('Error loading user rating:', userError);
          }
          
          if (userRating) {
            currentRating = userRating.rating;
            updateStars(currentRating);
            ratingText.textContent = ratingMessages[currentRating];
          } else {
            // Get average rating
            const { data: avgData, error: avgError } = await supabase
              .from('recipe_ratings')
              .select('rating')
              .eq('recipe_id', recipeId);
            
            if (avgError) {
              console.error('Error loading average rating:', avgError);
              ratingText.textContent = 'Click to rate';
              return;
            }
            
            if (avgData && avgData.length > 0) {
              const avg = avgData.reduce((sum, item) => sum + item.rating, 0) / avgData.length;
              ratingText.textContent = `Average: ${avg.toFixed(1)} ⭐ (${avgData.length} ratings)`;
            } else {
              ratingText.textContent = 'Be the first to rate!';
            }
          }
        } catch (error) {
          console.error('Error:', error);
          ratingText.textContent = 'Click to rate';
        }
      }
      
      function updateStars(rating) {
        stars.forEach((star, index) => {
          if (index < rating) {
            star.classList.add('filled');
          } else {
            star.classList.remove('filled');
          }
        });
      }
      
      async function setRating(rating) {
        try {
          // Check if user already rated
          const { data: existing, error: checkError } = await supabase
            .from('recipe_ratings')
            .select('id')
            .eq('recipe_id', recipeId)
            .eq('user_session_id', userSessionId)
            .single();
          
          if (checkError && checkError.code !== 'PGRST116') {
            throw checkError;
          }
          
          if (existing) {
            // Update existing rating
            const { error: updateError } = await supabase
              .from('recipe_ratings')
              .update({ rating: rating })
              .eq('id', existing.id);
            
            if (updateError) throw updateError;
          } else {
            // Insert new rating
            const { error: insertError } = await supabase
              .from('recipe_ratings')
              .insert([{
                recipe_id: recipeId,
                user_session_id: userSessionId,
                rating: rating
              }]);
            
            if (insertError) throw insertError;
          }
          
          currentRating = rating;
          updateStars(rating);
          ratingText.textContent = ratingMessages[rating];
          
          // Add clicked animation
          stars.forEach((star, index) => {
            if (index < rating) {
              star.classList.add('clicked');
              setTimeout(() => star.classList.remove('clicked'), 500);
            }
          });
          
          // Show success message
          setTimeout(() => {
            ratingText.textContent = ratingMessages[rating] + ' - Thank you!';
          }, 500);
          
        } catch (error) {
          console.error('Error saving rating:', error);
          alert('Failed to save rating. Please try again.');
        }
      }
      
      // Initialize
      loadRating();
      
      // Hover effect
      stars.forEach(star => {
        star.addEventListener('mouseenter', function() {
          const hoverValue = this.dataset.value;
          ratingContainer.setAttribute('data-hover', hoverValue);
          ratingText.textContent = ratingMessages[hoverValue];
        });
        
        star.addEventListener('click', function() {
          const rating = parseInt(this.dataset.value);
          setRating(rating);
        });
      });
      
      ratingContainer.addEventListener('mouseleave', function() {
        this.removeAttribute('data-hover');
        if (currentRating > 0) {
          ratingText.textContent = ratingMessages[currentRating];
        } else {
          loadRating(); // Reload to show average
        }
      });
    })();
    </script>
</body>
</html>
