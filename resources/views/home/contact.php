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
    </style>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>resepin.id</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY_ANDA_DI_SINI&callback=initMap">
</script>

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
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
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
                            <div class="main-menu white_text  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="index.php">Beranda</a></li>
                                        <li><a href="about">Tentang</a></li>
                                        <li><a href="recipes">Resep</a></li>
                                       <li><a href="bookmarks">Bookmarks <Bookmarks></a></li>
                                        <li><a href="recipes_details">Halaman</a></li>
                                        <li><a href="contact">Kontak</a></li>

                                </nav>   
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="search_icon">
                                <a href="#">
                                    <i class="ti-search"></i>
                                </a>
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
<div class="slider_area">
    <div class="single_slider d-flex align-items-center breadcam_bg_5"> 
        <div class="container">
            <div class="row align-items-center justify-content-center">
                
                <div class="col-xl-8 text-center slider_text"> 
                    
                    <h1 class="hero_title">Contact Us</h1> 
                    
                    </div>
            </div>
        </div>
    </div>
</div>
    <!-- /bradcam_area  -->
  <!-- ================ contact section start ================= -->
 <section class="contact-section section_padding">
    <div class="container">
        <div class="d-none d-sm-block mb-5 pb-4">
<section class="contact-section section_padding">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
        
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15956.059022807292!2d116.84415915541996!3d-1.149949499999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df149298f826ab5%3A0x8489d5309f45c0db!2sInstitut%20Teknologi%20Kalimantan!5e0!3m2!1sid!2sid!4v1763483845027!5m2!1sid!2sid" 
              width="1000" 
              height="450" 
              style="border:0;" 
              allowfullscreen="" 
              loading="lazy" 
              referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        </div>
    </div>
</section>

<script>
    function initMap() {
        // Objek lokasi marker (tidak digunakan di kode map saat ini, tapi bagus untuk referensi)
        var uluru = {lat: -25.363, lng: 131.044}; 
        
        // Gaya (Styles)
        var grayStyles = [
            // ... (Kode styling Anda)
            {
                featureType: "all",
                stylers: [
                    { saturation: -90 },
                    { lightness: 50 }
                ]
            },
            {elementType: 'labels.text.fill', stylers: [{color: '#ccdee9'}]}
        ];
        
        // Inisialisasi Peta
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -31.197, lng: 150.744}, // Titik tengah peta
            zoom: 9,
            styles: grayStyles,
            scrollwheel: false
        });
        
        // Jika Anda ingin menambahkan Marker (Opsional)
        // var marker = new google.maps.Marker({position: uluru, map: map});
    }
</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY_ANDA_DI_SINI&callback=initMap">
</script>


      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Get in Touch</h2>
        </div>
        <div class="col-lg-8">
          <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  
                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder = 'Enter Message'></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder = 'Enter your name'>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder = 'Enter email address'>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder = 'Enter Subject'>
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <button type="submit" class="button button-contactForm btn_4 boxed-btn">Send Message</button>
            </div>
          </form>
        </div>
        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>Institut Teknologi Kalimantan</h3>
              <p>Jalan Soekarno-Hatta Km. 15, Karang Joang, Kecamatan Balikpapan Utara, Kota Balikpapan, Kalimantan Timur</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3>+62 123675432</h3>
              <p>Mon to Fri 9am to 6pm</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3>supportresepin@gmail.com</h3>
              <p>Feel free to send us message!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->

     <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Top Products
                            </h3>
                            <ul>
                                <li><a href="#">Managed Website</a></li>
                                <li><a href="#"> Manage Reputation</a></li>
                                <li><a href="#">Power Tools</a></li>
                                <li><a href="#">Marketing Service</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Quick Links
                            </h3>
                            <ul>
                                <li><a href="#">Jobs</a></li>
                                <li><a href="#">Brand Assets</a></li>
                                <li><a href="#">Investor Relations</a></li>
                                <li><a href="#">Terms of Service</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Features
                            </h3>
                            <ul>
                                <li><a href="#">Jobs</a></li>
                                <li><a href="#">Brand Assets</a></li>
                                <li><a href="#">Investor Relations</a></li>
                                <li><a href="#">Terms of Service</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Resources
                            </h3>
                            <ul>
                                <li><a href="#">Guides</a></li>
                                <li><a href="#">Research</a></li>
                                <li><a href="#">Experts</a></li>
                                <li><a href="#">Agencies</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                            <div class="footer_widget">
                                    <h3 class="footer_title">
                                            Subscribe
                                    </h3>
                                    <p class="newsletter_text">You can trust us. we only send promo offers,</p>
                                    <form action="#" class="newsletter_form">
                                        <input type="text" placeholder="Enter your mail">
                                        <button type="submit"> <i class="ti-arrow-right"></i> </button>
                                    </form>
                                    
                                </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row align-items-center">
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
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="ti-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ti-twitter-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-dribbble"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-behance"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<!--/ footer  -->



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

  <!--contact js-->
  <script src="js/contact.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/jquery.form.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/mail-script.js"></script>

  <script src="js/main.js"></script>
</body>

</html>