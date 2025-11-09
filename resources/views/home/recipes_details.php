<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tasty Recipes</title>
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
      .comment-wrap{border:1px solid #eee;border-radius:10px;padding:14px;margin:8px 0 20px;background:#fff}
      .comment-wrap .comment-list{list-style:none;margin:12px 0 0;padding:0}
      .comment-wrap .comment-list li{border-top:1px dashed #ddd;padding:10px 2px}
      .comment-wrap .comment-author{font-weight:600}
      .comment-wrap .comment-date{opacity:.6;font-size:12px;margin-left:6px}
      .recepies_text h4{margin-top:18px}
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
                                <a href="index">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu white_text  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="index.php">home</a></li>
                                        <li><a href="about">about</a></li>
                                        <li><a href="recipes">Recipes</a></li>
                                        <li><a href="bookmarks">Bookmarks <Bookmarks></a></li>
                                        </li>
                                        <li><a href="#">pages <i class="ti-angle-down"></i></a>
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

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Recipe Details</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="recepie_details_area">
        <div class="container">
            <div class="row align-items-center">
                <!-- Kolom kiri: Gambar + Like, Comment & Save -->
                <div class="col-xl-6 col-md-6">
                    <div class="recepies_thumb">
                        <img src="img/recepie/recepie_details.png" alt="">
                    </div>

                    <!-- React bar -->
                    <div class="react-bar" data-item-id="dragon-tiger-phoenix">
                        <button class="btn-like" aria-label="Like">
                            <i class="fa fa-heart"></i>
                            <span class="like-count">0</span>
                        </button>
                        <button class="btn-comment-toggle" aria-label="Tampilkan kolom komentar">
                            <i class="fa fa-comment"></i>
                            <span class="comment-count">0</span>
                        </button>
                        <button class="btn-save" aria-label="Save">
                            <i class="fa fa-bookmark"></i>
                        </button>
                    </div>

                    <!-- Comment Wrap -->
                    <div class="comment-wrap" data-for="dragon-tiger-phoenix" hidden>
                        <form class="comment-form">
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Nama (opsional)" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea name="message" rows="3" class="form-control" placeholder="Tulis komentar..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <ul class="comment-list"></ul>
                    </div>
                </div>

                <!-- Kolom kanan: Info & deskripsi singkat -->
                <div class="col-xl-6 col-md-6">
                    <div class="recepies_info">
                        <h3>Dragon tiger phoenix</h3>
                        <p>
                          Dragon tiger phoenix adalah platter ayam berbumbu tiga gaya:
                          <em>dragon</em> (pedas-asam cabai & jeruk nipis),
                          <em>tiger</em> (gurih-rempah bawang putih & lada),
                          dan <em>phoenix</em> (manis-smoky madu & paprika).
                          Teksturnya renyah di luar, juicy di dalam — cocok sebagai hidangan utama
                          dengan kentang goreng atau nasi hangat.
                        </p>

                        <div class="resepies_details">
                            <ul>
                                <li><p><strong>Rating</strong> : <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p></li>
                                <li><p><strong>Time</strong> : 30 Mins </p></li>
                                <li><p><strong>Category</strong> : Main Dish </p></li>
                                <li><p><strong>Tags</strong> : Dinner, Main, Chicken, Dragon, Phoenix </p></li>
                            </ul>
                        </div>

                        <div class="links">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail resep lengkap -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="recepies_text">
                        <h4>Bahan</h4>
                        <ul>
                            <li>600 g fillet ayam, potong memanjang</li>
                            <li>1 sdt garam, 1/2 sdt lada, 1 sdt bawang putih bubuk</li>
                            <li>120 g tepung maizena + 2 butir telur (untuk pelapis)</li>
                            <li>Minyak secukupnya untuk menggoreng</li>
                            <li><strong>Saus Dragon (pedas-asam):</strong> 2 sdm cabai bubuk, 1 sdm gochujang/saus sambal, 2 sdm air jeruk nipis, 1 sdm gula</li>
                            <li><strong>Saus Tiger (gurih-rempah):</strong> 3 siung bawang putih cincang, 1 sdt lada hitam tumbuk, 1 sdm kecap asin, 1 sdm mentega</li>
                            <li><strong>Saus Phoenix (manis-smoky):</strong> 2 sdm madu, 1 sdm saus barbeque, 1 sdt paprika bubuk, 1 sdt cuka</li>
                            <li>Pelengkap: kentang goreng, sayur segar, irisan lemon</li>
                        </ul>

                        <h4>Langkah Memasak</h4>
                        <ol>
                            <li><strong>Marinasi:</strong> Lumuri ayam dengan garam, lada, dan bawang putih bubuk. Diamkan 10–15 menit.</li>
                            <li><strong>Pelapisan:</strong> Kocok telur. Balur ayam ke telur, lalu ke maizena hingga rata.</li>
                            <li><strong>Menggoreng:</strong> Panaskan minyak. Goreng ayam hingga keemasan (5–7 menit). Tiriskan.</li>
                            <li><strong>Saus Dragon:</strong> Aduk bahan saus di panci kecil hingga mengental. Sisihkan.</li>
                            <li><strong>Saus Tiger:</strong> Tumis bawang putih dengan mentega, masukkan lada & kecap asin. Aduk 1 menit.</li>
                            <li><strong>Saus Phoenix:</strong> Campur madu, saus barbeque, paprika, dan cuka. Panaskan 30–60 detik.</li>
                            <li><strong>Plating:</strong> Bagi ayam goreng menjadi tiga bagian. Lumuri masing-masing dengan saus Dragon, Tiger, dan Phoenix.</li>
                            <li><strong>Sajikan:</strong> Tata di piring dengan kentang goreng & sayur. Peras lemon di atas ayam untuk sensasi segar.</li>
                        </ol>

                        <h4>Tips</h4>
                        <ul>
                            <li>Ingin extra renyah? Goreng dua kali: pertama 3–4 menit, istirahatkan; goreng lagi 1–2 menit.</li>
                            <li>Sesuaikan level pedas dari jumlah cabai/gochujang pada saus Dragon.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer tetap sama -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <!-- isi footer atas -->
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row align-items-center">
                    <div class="col-xl-8 col-md-8">
                        <p class="copy_right">
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                            All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by
                            <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        </p>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <div class="socail_links">
                            <ul>
                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
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

    <!-- Script Like, Comment & Save -->
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

          // Render awal
          likeCount.textContent=item.likes;
          cCount.textContent=item.comments.length;
          if(item.liked) likeBtn.classList.add('liked');
          if(item.saved) saveBtn.classList.add('saved');

          // Event Like
          likeBtn.addEventListener('click',()=>{
            const d=store.get(); const it=d[id];
            it.liked=!it.liked;
            it.likes+=it.liked?1:-1;
            store.set(d);
            likeBtn.classList.toggle('liked',it.liked);
            likeCount.textContent=it.likes;
          });

          // Event Comment toggle
          cBtn.addEventListener('click',()=>{ wrap.hidden=!wrap.hidden; });

          // Event Save
          saveBtn.addEventListener('click',()=>{
            const d=store.get(); const it=d[id];
            it.saved=!it.saved;
            store.set(d);
            saveBtn.classList.toggle('saved', it.saved);
            alert(it.saved ? 'Recipe saved!' : 'Recipe removed from bookmarks.');
          });

          // Event submit komentar
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
</body>
</html>
