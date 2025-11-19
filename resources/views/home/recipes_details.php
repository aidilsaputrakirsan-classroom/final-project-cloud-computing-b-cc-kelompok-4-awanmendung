<!doctype html>
<html class="no-js" lang="zxx">

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
      .comment-wrap{border:1px solid #eee;border-radius:10px;padding:14px;margin:8px 0 20px;background:#fff}
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
                                    <img src="img/logo.png" alt="">
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
                                        <li><a href="pages">Halaman</a>
                                            <ul class="submenu">
                                                <li><a href="recipes_details">Detail Resep</a></li>
                                                <li><a href="elements">Elemen</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact">Kontak</a></li>
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

    <!-- TITLE -->
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

    <!-- RECIPE CONTENT -->
    <div class="recepie_details_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-md-6">
                    <div class="recepies_thumb">
                        <img src="img/recepie/recepie_details.png" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="recepies_info">
                        <h3>Chicken Mushroom Sauce</h3>
                        <p>1. Goreng kentang di minyak panas lalu sisihkan</p>
                        <p>2. Marinasi ayam 15 menit, lalu pan fried dengan sedikit minyak dan sisihkan</p>
                        <p>3. Tumis bawang putih dan bombay lalu masukkan jamur champignon iris tumis hingga wangi</p>
                        <p>4. Tambahkan bawang putih dan bombay lalu masukkan jamur champignon iris tumis hingga wangi</p>
                        <p>5. Tata ayam dan kentang di piring siram dengan saus jamur lalu sajikan</p>

                        <div class="resepies_details">
                            <ul>
                                <li><p><strong>Rating</strong> : ★★★★★ </p></li>
                                <li><p><strong>Time</strong> : 30 Mins </p></li>
                                <li><p><strong>Category</strong> : Main Dish </p></li>
                                <li><p><strong>Tags</strong> : Dinner, Main, Chicken, Dragon, Phoenix </p></li>
                            </ul>
                        </div>

                        <!-- ✅ Like / Comment / Save -->
                        <div class="react-bar" data-item-id="dragon-tiger-phoenix">
                            <button class="btn-like"><i class="fa fa-heart"></i> <span class="like-count">0</span></button>
                            <button class="btn-comment-toggle"><i class="fa fa-comment"></i> <span class="comment-count">0</span></button>
                            <button class="btn-save"><i class="fa fa-bookmark"></i></button>
                        </div>

                        <div class="comment-wrap" data-for="dragon-tiger-phoenix" hidden>
                            <form class="comment-form">
                                <input type="text" name="name" placeholder="Nama (opsional)" class="form-control mb-2">
                                <textarea name="message" placeholder="Tulis komentar..." class="form-control mb-2" required></textarea>
                                <button type="submit" class="btn btn-sm btn-primary">Kirim</button>
                            </form>
                            <ul class="comment-list"></ul>
                        </div>

                        <div class="links">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
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
                    <!-- isi footer tetap sama -->
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row align-items-center">
                    <div class="col-xl-8 col-md-8">
                        <p class="copy_right">
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                            All rights reserved | Template by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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
</body>
</html>
