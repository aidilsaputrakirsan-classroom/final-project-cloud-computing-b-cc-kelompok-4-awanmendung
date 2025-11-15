<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tasty Recipe</title>
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
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        /* 🎨 Floating Button Style */
        .suggest-recipe-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #ff6b6b, #ee5a6f);
            border-radius: 50%;
            box-shadow: 0 4px 20px rgba(255, 107, 107, 0.4);
            border: none;
            cursor: pointer;
            z-index: 999;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: pulse 2s infinite;
        }

        .suggest-recipe-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 25px rgba(255, 107, 107, 0.6);
        }

        .suggest-recipe-btn i {
            color: white;
            font-size: 24px;
        }

        @keyframes pulse {
            0%, 100% {
                box-shadow: 0 4px 20px rgba(255, 107, 107, 0.4);
            }
            50% {
                box-shadow: 0 4px 30px rgba(255, 107, 107, 0.7);
            }
        }

        /* 📝 Modal Overlay */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1000;
            animation: fadeIn 0.3s ease;
        }

        .modal-overlay.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* 📋 Modal Content */
        .suggest-modal {
            background: white;
            border-radius: 20px;
            padding: 0;
            max-width: 600px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 10px 50px rgba(0, 0, 0, 0.3);
            animation: slideUp 0.3s ease;
            position: relative;
        }

        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Modal Header */
        .modal-header-custom {
            background: linear-gradient(135deg, #ff6b6b, #ee5a6f);
            color: white;
            padding: 25px 30px;
            border-radius: 20px 20px 0 0;
            position: relative;
        }

        .modal-header-custom h3 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .modal-header-custom p {
            margin: 5px 0 0 0;
            opacity: 0.9;
            font-size: 14px;
        }

        .modal-close-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .modal-close-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: rotate(90deg);
        }

        .modal-close-btn i {
            color: white;
            font-size: 20px;
        }

        /* Modal Body */
        .modal-body-custom {
            padding: 30px;
        }

        .form-group-custom {
            margin-bottom: 20px;
        }

        .form-group-custom label {
            display: block;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-group-custom label .required {
            color: #ff6b6b;
            margin-left: 3px;
        }

        .form-control-custom {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .form-control-custom:focus {
            outline: none;
            border-color: #ff6b6b;
            box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.1);
        }

        .form-control-custom::placeholder {
            color: #999;
        }

        textarea.form-control-custom {
            resize: vertical;
            min-height: 100px;
        }

        /* Character Counter */
        .char-counter {
            text-align: right;
            font-size: 12px;
            color: #999;
            margin-top: 5px;
        }

        /* Submit Button */
        .submit-btn-custom {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #ff6b6b, #ee5a6f);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .submit-btn-custom:hover {
            background: linear-gradient(135deg, #ee5a6f, #d94f61);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
        }

        .submit-btn-custom:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
        }

        /* Success Message */
        .success-message {
            display: none;
            text-align: center;
            padding: 40px 30px;
        }

        .success-message.active {
            display: block;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #4ecdc4, #44a6a0);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            animation: scaleIn 0.5s ease;
        }

        @keyframes scaleIn {
            from {
                transform: scale(0);
            }
            to {
                transform: scale(1);
            }
        }

        .success-icon i {
            color: white;
            font-size: 40px;
        }

        .success-message h4 {
            color: #333;
            margin-bottom: 10px;
            font-size: 24px;
        }

        .success-message p {
            color: #666;
            margin-bottom: 20px;
        }

        /* Info Box */
        .info-box {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            border-left: 4px solid #4ecdc4;
        }

        .info-box p {
            margin: 0;
            font-size: 13px;
            color: #666;
            line-height: 1.6;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .suggest-recipe-btn {
                width: 55px;
                height: 55px;
                bottom: 20px;
                right: 20px;
            }

            .suggest-recipe-btn i {
                font-size: 22px;
            }

            .suggest-modal {
                width: 95%;
                max-height: 95vh;
            }

            .modal-header-custom {
                padding: 20px;
            }

            .modal-header-custom h3 {
                font-size: 20px;
            }

            .modal-body-custom {
                padding: 20px;
            }
        }

        /* Tooltip */
        .suggest-recipe-btn::after {
            content: 'Suggest Recipe';
            position: absolute;
            right: 70px;
            background: #333;
            color: white;
            padding: 8px 15px;
            border-radius: 8px;
            font-size: 14px;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .suggest-recipe-btn:hover::after {
            opacity: 1;
        }
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
                                        <li><a href="bookmarks">Bookmarks</a></li>
                                        <li><a href="recipes_details">Recipes Details</a></li>
                                        <li><a href="contact">Contact</a></li>
                                    </ul>
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
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Chicken Recipes</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /bradcam_area  -->

    <!-- recepie_area_start  -->
    <div class="recepie_area plus_padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single_recepie text-center">
                        <div class="recepie_thumb">
                            <img src="img/recepie/recpie_1.png" alt="">
                        </div>
                        <h3>Egg Manchurian</h3>
                        <span>Appetizer</span>
                        <p>Time Needs: 30 Mins</p>
                        <a href="recipes_details" class="line_btn">View Full Recipe</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single_recepie text-center">
                        <div class="recepie_thumb">
                            <img src="img/recepie/recpie_2.png" alt="">
                        </div>
                        <h3>Pure Vegetable Bowl</h3>
                        <span>Appetizer</span>
                        <p>Time Needs: 30 Mins</p>
                        <a href="recipes_details" class="line_btn">View Full Recipe</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single_recepie text-center">
                        <div class="recepie_thumb">
                            <img src="img/recepie/recpie_3.png" alt="">
                        </div>
                        <h3>Egg Masala Ramen</h3>
                        <span>Appetizer</span>
                        <p>Time Needs: 30 Mins</p>
                        <a href="recipes_details" class="line_btn">View Full Recipe</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single_recepie text-center">
                        <div class="recepie_thumb">
                            <img src="img/recepie/recpie_1.png" alt="">
                        </div>
                        <h3>Egg Manchurian</h3>
                        <span>Appetizer</span>
                        <p>Time Needs: 30 Mins</p>
                        <a href="recipes_details" class="line_btn">View Full Recipe</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single_recepie text-center">
                        <div class="recepie_thumb">
                            <img src="img/recepie/recpie_2.png" alt="">
                        </div>
                        <h3>Pure Vegetable Bowl</h3>
                        <span>Appetizer</span>
                        <p>Time Needs: 30 Mins</p>
                        <a href="recipes_details" class="line_btn">View Full Recipe</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single_recepie text-center">
                        <div class="recepie_thumb">
                            <img src="img/recepie/recpie_3.png" alt="">
                        </div>
                        <h3>Egg Masala Ramen</h3>
                        <span>Appetizer</span>
                        <p>Time Needs: 30 Mins</p>
                        <a href="recipes_details" class="line_btn">View Full Recipe</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single_recepie text-center">
                        <div class="recepie_thumb">
                            <img src="img/recepie/recpie_1.png" alt="">
                        </div>
                        <h3>Egg Manchurian</h3>
                        <span>Appetizer</span>
                        <p>Time Needs: 30 Mins</p>
                        <a href="recipes_details" class="line_btn">View Full Recipe</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single_recepie text-center">
                        <div class="recepie_thumb">
                            <img src="img/recepie/recpie_2.png" alt="">
                        </div>
                        <h3>Pure Vegetable Bowl</h3>
                        <span>Appetizer</span>
                        <p>Time Needs: 30 Mins</p>
                        <a href="recipes_details" class="line_btn">View Full Recipe</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single_recepie text-center">
                        <div class="recepie_thumb">
                            <img src="img/recepie/recpie_3.png" alt="">
                        </div>
                        <h3>Egg Masala Ramen</h3>
                        <span>Appetizer</span>
                        <p>Time Needs: 30 Mins</p>
                        <a href="recipes_details" class="line_btn">View Full Recipe</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /recepie_area_start  -->

    <!-- latest_trand     -->
    <div class="latest_trand_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="trand_info text-center">
                        <p>Thousands of recipes are waiting to be watched</p>
                        <h3>Discover latest trending recipes</h3>
                        <a href="recipes" class="boxed-btn3">View all Recipes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ latest_trand     -->

    <!-- download_app_area -->
    <div class="download_app_area plus_padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-md-6">
                    <div class="download_thumb">
                        <div class="big_img">
                            <img src="img/video/big_1.png" alt="">
                        </div>
                        <div class="small_01">
                            <img src="img/video/small_sm1.png" alt="">
                        </div>
                        <div class="small_02">
                            <img src="img/video/sm2.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="download_text">
                        <h3>Download app to
                            get recipes from
                            Everywhere</h3>
                        <div class="download_android_apple">
                            <a class="active" href="#">
                                <div class="download_link d-flex">
                                    <i class="fa fa-apple"></i>
                                    <div class="store">
                                        <h5>Available</h5>
                                        <p>on App Store</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="download_link d-flex">
                                    <i class="fa fa-android"></i>
                                    <div class="store">
                                        <h5>Download</h5>
                                        <p>from Play Store</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ download_app_area -->

    <!-- 🎯 Floating Suggest Recipe Button -->
    <button class="suggest-recipe-btn" id="suggestBtn">
        <i class="fa fa-lightbulb-o"></i>
    </button>

    <!-- 📝 Suggest Recipe Modal -->
    <div class="modal-overlay" id="suggestModal">
        <div class="suggest-modal">
            <!-- Modal Header -->
            <div class="modal-header-custom">
                <h3>
                    <i class="fa fa-lightbulb-o"></i>
                    Suggest a Recipe
                </h3>
                <p>Share your recipe idea with us!</p>
                <button class="modal-close-btn" id="closeModalBtn">
                    <i class="fa fa-times"></i>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body-custom" id="formContainer">
                <div class="info-box">
                    <p><i class="fa fa-info-circle"></i> Have a recipe idea? Tell us about it and we'll consider creating a detailed recipe guide for our community!</p>
                </div>

                <form id="suggestForm">
                    <div class="form-group-custom">
                        <label for="recipeName">
                            Recipe Name <span class="required">*</span>
                        </label>
                        <input 
                            type="text" 
                            class="form-control-custom" 
                            id="recipeName" 
                            placeholder="e.g., Spicy Chicken Curry"
                            required
                            maxlength="100"
                        >
                        <div class="char-counter">
                            <span id="recipeNameCount">0</span>/100
                        </div>
                    </div>

                    <div class="form-group-custom">
                        <label for="mainIngredients">
                            Main Ingredients <span class="required">*</span>
                        </label>
                        <textarea 
                            class="form-control-custom" 
                            id="mainIngredients" 
                            placeholder="List the key ingredients (e.g., chicken breast, curry powder, coconut milk)"
                            required
                            maxlength="300"
                        ></textarea>
                        <div class="char-counter">
                            <span id="ingredientsCount">0</span>/300
                        </div>
                    </div>

                    <div class="form-group-custom">
                        <label for="cookingSteps">
                            Cooking Steps <span class="required">*</span>
                        </label>
                        <textarea 
                            class="form-control-custom" 
                            id="cookingSteps" 
                            placeholder="Briefly describe the cooking process..."
                            required
                            maxlength="500"
                            style="min-height: 120px;"
                        ></textarea>
                        <div class="char-counter">
                            <span id="stepsCount">0</span>/500
                        </div>
                    </div>

                    <div class="form-group-custom">
                        <label for="contactNumber">
                            Contact Number <span class="required">*</span>
                        </label>
                        <input 
                            type="tel" 
                            class="form-control-custom" 
                            id="contactNumber" 
                            placeholder="e.g., +62 812-3456-7890"
                            required
                            pattern="[0-9+\-\s()]+"
                        >
                    </div>

                    <button type="submit" class="submit-btn-custom" id="submitBtn">
                        <i class="fa fa-paper-plane"></i>
                        Submit Recipe Suggestion
                    </button>
                </form>
            </div>

            <!-- Success Message -->
            <div class="success-message" id="successMessage">
                <div class="success-icon">
                    <i class="fa fa-check"></i>
                </div>
                <h4>Thank You!</h4>
                <p>Your recipe suggestion has been submitted successfully. We'll review it and get back to you soon!</p>
                <button class="submit-btn-custom" onclick="closeModal()">
                    Close
                </button>
            </div>
        </div>
    </div>

    <!-- footer  -->
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
                    <div class="col-xl-8 col-md-8">
                        <p class="copy_right">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/main.js"></script>

    <!-- 🎯 Suggest Recipe Script -->
    <script>
        // Get elements
        const suggestBtn = document.getElementById('suggestBtn');
        const modal = document.getElementById('suggestModal');
        const closeBtn = document.getElementById('closeModalBtn');
        const form = document.getElementById('suggestForm');
        const formContainer = document.getElementById('formContainer');
        const successMessage = document.getElementById('successMessage');
        const submitBtn = document.getElementById('submitBtn');

        // Character counters
        const recipeNameInput = document.getElementById('recipeName');
        const ingredientsInput = document.getElementById('mainIngredients');
        const stepsInput = document.getElementById('cookingSteps');
        
        const recipeNameCount = document.getElementById('recipeNameCount');
        const ingredientsCount = document.getElementById('ingredientsCount');
        const stepsCount = document.getElementById('stepsCount');

        // Open modal
        suggestBtn.addEventListener('click', function() {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        });

        // Close modal function
        function closeModal() {
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
            
            // Reset form after closing
            setTimeout(() => {
                formContainer.style.display = 'block';
                successMessage.classList.remove('active');
                form.reset();
                updateCounters();
            }, 300);
        }

        // Close modal on close button
        closeBtn.addEventListener('click', closeModal);

        // Close modal when clicking outside
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModal();
            }
        });

        // Close modal on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modal.classList.contains('active')) {
                closeModal();
            }
        });

        // Update character counters
        function updateCounters() {
            recipeNameCount.textContent = recipeNameInput.value.length;
            ingredientsCount.textContent = ingredientsInput.value.length;
            stepsCount.textContent = stepsInput.value.length;
        }

        recipeNameInput.addEventListener('input', updateCounters);
        ingredientsInput.addEventListener('input', updateCounters);
        stepsInput.addEventListener('input', updateCounters);

        // Form submission
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Disable submit button
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Submitting...';

            // Get form data
            const formData = {
                recipeName: recipeNameInput.value,
                mainIngredients: ingredientsInput.value,
                cookingSteps: stepsInput.value,
                contactNumber: document.getElementById('contactNumber').value
            };

            // Simulate API call (replace with actual API call)
            setTimeout(() => {
                console.log('Recipe Suggestion Submitted:', formData);
                
                // Show success message
                formContainer.style.display = 'none';
                successMessage.classList.add('active');
                
                // Reset button
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fa fa-paper-plane"></i> Submit Recipe Suggestion';

                // You can add actual API call here:
                // fetch('/api/suggest-recipe', {
                //     method: 'POST',
                //     headers: { 'Content-Type': 'application/json' },
                //     body: JSON.stringify(formData)
                // })
                // .then(response => response.json())
                // .then(data => {
                //     // Handle success
                // })
                // .catch(error => {
                //     // Handle error
                // });

            }, 1500);
        });

        // Phone number formatting
        const phoneInput = document.getElementById('contactNumber');
        phoneInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/[^\d+\-\s()]/g, '');
            e.target.value = value;
        });
    </script>