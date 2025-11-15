<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tasty Recipes</title>
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
        .react-bar {
            display: flex;
            gap: 14px;
            align-items: center;
            margin: 12px 0
        }

        .react-bar button {
            border: 0;
            background: transparent;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 16px;
            cursor: pointer;
            padding: 6px 10px;
            border-radius: 10px;
            transition: background .2s
        }

        .react-bar button:hover {
            background: rgba(0, 0, 0, .05)
        }

        .react-bar .btn-like.liked .fa-heart {
            color: #e0245e;
            transform: scale(1.08)
        }

        .react-bar .btn-save.saved .fa-bookmark {
            color: #f0ad4e;
            transform: scale(1.1)
        }

        .comment-wrap {
            border: 1px solid #eee;
            border-radius: 10px;
            padding: 14px;
            margin: 8px 0 20px;
            background: #fff
        }

        .comment-wrap .comment-list {
            list-style: none;
            margin: 12px 0 0;
            padding: 0
        }

        .comment-wrap .comment-list li {
            border-top: 1px dashed #ddd;
            padding: 10px 2px
        }

        .comment-wrap .comment-author {
            font-weight: 600
        }

        .comment-wrap .comment-date {
            opacity: .6;
            font-size: 12px;
            margin-left: 6px
        }
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
                                        <li><a href="index.php">home</a></li>
                                        <li><a href="about">about</a></li>
                                        <li><a href="recipes">Recipes</a></li>
                                        <li><a href="bookmarks">Bookmarks</a></li>
                                        <li><a href="recipes_details" class="active">Recipes Details</a></li>
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
                                <li>
                                    <p><strong>Rating</strong> : ★★★★★ </p>
                                </li>
                                <li>
                                    <p><strong>Time</strong> : 30 Mins </p>
                                </li>
                                <li>
                                    <p><strong>Category</strong> : Main Dish </p>
                                </li>
                                <li>
                                    <p><strong>Tags</strong> : Dinner, Main, Chicken, Dragon, Phoenix </p>
                                </li>
                            </ul>
                        </div>

                        <!-- ✅ Like / Comment / Save -->
                        <div class="react-bar" data-item-id="dragon-tiger-phoenix">
                            <button class="btn-like">
                                <i class="fa fa-heart"></i>
                                <span class="like-count">0</span>
                            </button>
                            <button class="btn-comment-toggle">
                                <i class="fa fa-comment"></i>
                                <span class="comment-count">0</span>
                            </button>
                            <button class="btn-save">
                                <i class="fa fa-bookmark"></i>
                            </button>
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

            <!-- Penutup container/area -->
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
                            Copyright &copy;
                            <script>document.write(new Date().getFullYear());</script>
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

    <!-- Supabase JS -->
    <script src="https://unpkg.com/@supabase/supabase-js@2"></script>
    <script>
        const SUPABASE_URL = 'https://mybfahpmnpasjmhutmcr.supabase.co';
        const SUPABASE_KEY = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im15YmZhaHBtbnBhc2ptaHV0bWNyIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NjEzMjg1MDgsImV4cCI6MjA3NjkwNDUwOH0.E_VI8-raJ3jRPAQc079j6jAhluiC4lSCmtIN9gMND6g'; // GANTI dengan anon public key, BUKAN service_role
        const sb = supabase.createClient(SUPABASE_URL, SUPABASE_KEY);

        const DEVICE_KEY = 'tasty-device-id';
        let deviceId = localStorage.getItem(DEVICE_KEY);
        if (!deviceId) {
            deviceId = (crypto.randomUUID ? crypto.randomUUID() : String(Date.now()));
            localStorage.setItem(DEVICE_KEY, deviceId);
        }
    </script>

    <!-- ✅ Script Like, Comment & Save (full Supabase, tanpa localStorage untuk data) -->
    <script>
        (function () {
            function fmtDateTime(isoString) {
                const d = isoString ? new Date(isoString) : new Date();
                const year = d.getFullYear();
                const month = String(d.getMonth() + 1).padStart(2, '0');
                const day = String(d.getDate()).padStart(2, '0');
                const hours = String(d.getHours()).padStart(2, '0');
                const minutes = String(d.getMinutes()).padStart(2, '0');
                return year + '-' + month + '-' + day + ' ' + hours + ':' + minutes;
            }

            function escapeHtml(str) {
                if (!str) return '';
                return str
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#039;');
            }

            function renderComments(wrap, comments) {
                const ul = wrap.querySelector('.comment-list');
                ul.innerHTML = comments.map(function (c) {
                    return (
                        '<li>' +
                        '<div>' +
                        '<span class="comment-author">' + escapeHtml(c.name) + '</span>' +
                        '<span class="comment-date">' + c.date + '</span>' +
                        '</div>' +
                        '<div>' + escapeHtml(c.message) + '</div>' +
                        '</li>'
                    );
                }).join('');
            }

            async function loadLikes(recipeId, likeBtn, likeCountEl) {
                try {
                    // cek apakah sudah like oleh device ini
                    const { data: likeRows, error: checkErr } = await sb
                        .from('recipe_likes')
                        .select('id')
                        .eq('recipe_slug', recipeId)
                        .eq('device_id', deviceId)
                        .limit(1);

                    if (checkErr) {
                        console.error('Error check like:', checkErr);
                    }

                    const existing = likeRows && likeRows.length > 0 ? likeRows[0] : null;
                    if (existing) {
                        likeBtn.classList.add('liked');
                    } else {
                        likeBtn.classList.remove('liked');
                    }

                    // hitung total like
                    const { count, error: cntErr } = await sb
                        .from('recipe_likes')
                        .select('*', { count: 'exact', head: true })
                        .eq('recipe_slug', recipeId);

                    if (cntErr) {
                        console.error('Error count likes:', cntErr);
                        likeCountEl.textContent = '0';
                    } else {
                        likeCountEl.textContent = (typeof count === 'number') ? count : '0';
                    }
                } catch (e) {
                    console.error('Exception loadLikes:', e);
                    likeCountEl.textContent = '0';
                }
            }

            async function loadComments(recipeId, wrap, cCountEl) {
                try {
                    const { data, error } = await sb
                        .from('recipe_comments')
                        .select('name, message, created_at')
                        .eq('recipe_slug', recipeId)
                        .order('created_at', { ascending: true });

                    if (error) {
                        console.error('Error load comments:', error);
                        return;
                    }

                    const comments = (data || []).map(function (c) {
                        return {
                            name: c.name || 'Anonim',
                            message: c.message,
                            date: fmtDateTime(c.created_at)
                        };
                    });

                    renderComments(wrap, comments);
                    cCountEl.textContent = comments.length;
                } catch (e) {
                    console.error('Exception loadComments:', e);
                }
            }

            async function loadBookmarkState(recipeId, saveBtn) {
                try {
                    const { data: rows, error } = await sb
                        .from('recipe_bookmarks')
                        .select('id')
                        .eq('recipe_slug', recipeId)
                        .eq('device_id', deviceId)
                        .limit(1);

                    if (error) {
                        console.error('Error check bookmark:', error);
                        return;
                    }

                    const existing = rows && rows.length > 0 ? rows[0] : null;
                    if (existing) {
                        saveBtn.classList.add('saved');
                    } else {
                        saveBtn.classList.remove('saved');
                    }
                } catch (e) {
                    console.error('Exception loadBookmarkState:', e);
                }
            }

            document.addEventListener('DOMContentLoaded', function () {
                const bars = document.querySelectorAll('.react-bar');

                bars.forEach(function (bar) {
                    const recipeId = bar.dataset.itemId;
                    const likeBtn = bar.querySelector('.btn-like');
                    const likeCountEl = bar.querySelector('.like-count');
                    const commentToggleBtn = bar.querySelector('.btn-comment-toggle');
                    const commentCountEl = bar.querySelector('.comment-count');
                    const saveBtn = bar.querySelector('.btn-save');
                    const wrap = document.querySelector('.comment-wrap[data-for="' + recipeId + '"]');
                    const form = wrap ? wrap.querySelector('.comment-form') : null;

                    // Inisialisasi awal dari Supabase
                    if (likeBtn && likeCountEl) {
                        loadLikes(recipeId, likeBtn, likeCountEl);
                    }
                    if (wrap && commentCountEl) {
                        loadComments(recipeId, wrap, commentCountEl);
                    }
                    if (saveBtn) {
                        loadBookmarkState(recipeId, saveBtn);
                    }

                    // Handler LIKE
                    if (likeBtn && likeCountEl) {
                        likeBtn.addEventListener('click', async function () {
                            try {
                                const { data: rows, error: checkErr } = await sb
                                    .from('recipe_likes')
                                    .select('id')
                                    .eq('recipe_slug', recipeId)
                                    .eq('device_id', deviceId)
                                    .limit(1);

                                if (checkErr) {
                                    console.error('Error check like:', checkErr);
                                    alert('Terjadi kesalahan saat memeriksa like.');
                                    return;
                                }

                                const existing = rows && rows.length > 0 ? rows[0] : null;

                                if (existing) {
                                    const { error: delErr } = await sb
                                        .from('recipe_likes')
                                        .delete()
                                        .eq('id', existing.id);

                                    if (delErr) {
                                        console.error('Error delete like:', delErr);
                                        alert('Gagal menghapus like.');
                                        return;
                                    }
                                } else {
                                    const { error: insErr } = await sb
                                        .from('recipe_likes')
                                        .insert({
                                            recipe_slug: recipeId,
                                            device_id: deviceId
                                        });

                                    if (insErr) {
                                        console.error('Error insert like:', insErr);
                                        alert('Gagal menambahkan like.');
                                        return;
                                    }
                                }

                                await loadLikes(recipeId, likeBtn, likeCountEl);
                            } catch (e) {
                                console.error('Exception click like:', e);
                                alert('Gagal memproses like.');
                            }
                        });
                    }

                    // Toggle KOMENTAR
                    if (commentToggleBtn && wrap) {
                        commentToggleBtn.addEventListener('click', function () {
                            wrap.hidden = !wrap.hidden;
                        });
                    }

                    // Handler BOOKMARK / SAVE
                    if (saveBtn) {
                        saveBtn.addEventListener('click', async function () {
                            try {
                                const { data: rows, error: checkErr } = await sb
                                    .from('recipe_bookmarks')
                                    .select('id')
                                    .eq('recipe_slug', recipeId)
                                    .eq('device_id', deviceId)
                                    .limit(1);

                                if (checkErr) {
                                    console.error('Error check bookmark:', checkErr);
                                    alert('Terjadi kesalahan saat memeriksa bookmark.');
                                    return;
                                }

                                const existing = rows && rows.length > 0 ? rows[0] : null;

                                if (existing) {
                                    const { error: delErr } = await sb
                                        .from('recipe_bookmarks')
                                        .delete()
                                        .eq('id', existing.id);

                                    if (delErr) {
                                        console.error('Error delete bookmark:', delErr);
                                        alert('Gagal menghapus bookmark.');
                                        return;
                                    }
                                    saveBtn.classList.remove('saved');
                                    alert('Recipe removed from bookmarks.');
                                } else {
                                    const { error: insErr } = await sb
                                        .from('recipe_bookmarks')
                                        .insert({
                                            recipe_slug: recipeId,
                                            device_id: deviceId
                                        });

                                    if (insErr) {
                                        console.error('Error insert bookmark:', insErr);
                                        alert('Gagal menyimpan bookmark.');
                                        return;
                                    }
                                    saveBtn.classList.add('saved');
                                    alert('Recipe saved!');
                                }
                            } catch (e) {
                                console.error('Exception bookmark:', e);
                                alert('Gagal memproses bookmark.');
                            }
                        });
                    }

                    // Handler SUBMIT KOMENTAR
                    if (form && wrap && commentCountEl) {
                        form.addEventListener('submit', async function (e) {
                            e.preventDefault();
                            const name = form.name.value || 'Anonim';
                            const message = form.message.value.trim();
                            if (!message) return;

                            try {
                                const { error: insErr } = await sb
                                    .from('recipe_comments')
                                    .insert({
                                        recipe_slug: recipeId,
                                        name: name,
                                        message: message
                                    });

                                if (insErr) {
                                    console.error('Error insert comment:', insErr);
                                    alert('Komentar gagal dikirim.');
                                    return;
                                }

                                form.reset();
                                await loadComments(recipeId, wrap, commentCountEl);
                            } catch (err) {
                                console.error('Exception submit comment:', err);
                                alert('Terjadi kesalahan saat mengirim komentar.');
                            }
                        });
                    }

                });
            });
        })();
    </script>
</body>
</html>
