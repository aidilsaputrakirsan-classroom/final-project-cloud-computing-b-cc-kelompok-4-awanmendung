<?php
// Mendeteksi halaman aktif
$active = basename($_SERVER['PHP_SELF']);
?>

<header>
    <div class="header-area">
        <div id="sticky-header" class="main-header-area">
            <div class="container">
                <div class="row align-items-center">

                    <!-- Logo -->
                    <div class="col-xl-3 col-lg-2 col-md-3 col-6">
                        <div class="logo">
                            <a href="index.php">
                                <img src="img/resepinid_logofix.png" alt="Logo resepin.id">
                            </a>
                        </div>
                    </div>

                    <!-- Navbar -->
                    <div class="col-xl-6 col-lg-7 d-none d-lg-block">
                        <div class="main-menu white_text">
                            <nav>
                                <ul id="navigation">
                                    <li>
                                        <a href="index.php"
                                           class="<?= $active=='index.php'?'active':'' ?>">
                                            Beranda
                                        </a>
                                    </li>

                                    <li>
                                        <a href="about.php"
                                           class="<?= $active=='about.php'?'active':'' ?>">
                                            Tentang
                                        </a>
                                    </li>

                                    <li>
                                        <a href="recipes.php"
                                           class="<?= $active=='recipes.php'?'active':'' ?>">
                                            Resep
                                        </a>
                                    </li>

                                    <li>
                                        <a href="bookmarks.php"
                                           class="<?= $active=='bookmarks.php'?'active':'' ?>">
                                            Bookmarks
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#"
                                           class="<?= (
                                                $active=='pages.php' ||
                                                $active=='recipes_details.php' ||
                                                $active=='elements.php'
                                           ) ? 'active' : '' ?>">
                                            Halaman
                                        </a>

                                        <ul class="submenu">
                                            <li><a href="recipes_details.php">Detail Resep</a></li>
                                            <li><a href="elements.php">Elemen</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="contact.php"
                                           class="<?= $active=='contact.php'?'active':'' ?>">
                                            Kontak
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- Search + Login -->
                    <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                        <div class="header_right d-flex justify-content-end align-items-center">
                            <div class="search_icon mr-3">
                                <a href="#"><i class="ti-search"></i></a>
                            </div>
                            <div class="login_btn">
                                <a href="login.php" class="boxed-btn3">Masuk</a>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile Menu -->
                    <div class="col-12 d-block d-lg-none">
                        <div class="mobile_menu"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
