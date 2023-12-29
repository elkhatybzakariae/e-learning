@extends('master.layout')
@section('title', 'e-learning')
@section('style')
    <style>
        .mega-menu {
            display: none;
            position: absolute;
            left: 0;
            top: 100%;
            background-color: #fff;
            border: 1px solid #ccc;
            margin-top: 34px;
        }


        .navbar .ddiv:hover .mega-menu {
            display: block;
        }


        .form-control:focus {
            box-shadow: none;
        }

        .form-control-underlined {
            border-width: 0;
            border-bottom-width: 1px;
            border-radius: 0;
            padding-left: 0;
        }

        .form-control::placeholder {
            font-size: 0.95rem;
            color: #aaa;
            font-style: italic;
        }

        /* .owl-carousel .owl-nav button {
                                                                                                                                                    width: 25px;
                                                                                                                                                    text-align: center;
                                                                                                                                                    border: 1px solid #0b0606 !important;
                                                                                                                                                } */
        .owl-nav {
            position: relative;
            top: -50%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .owl-prev {
            width: 50px;
            height: 50px;
            right: -15px;
            text-align: center;
            border: none;
            border-radius: 50%;
            box-shadow: 4px 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #cf8d29;
            color: #FFFBF5;
            cursor: pointer;
            outline: none;
            z-index: 1;
        }

        .owl-next {
            width: 50px;
            height: 50px;
            text-align: center;
            border: none;
            border-radius: 50%;
            box-shadow: 4px 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #FFFBF5;
            color: #FFFBF5;
            font-size: 16px;
            cursor: pointer;
            outline: none;
            z-index: 1;
        }

        @media (max-width: 430.98px) {
            div[name='carouseltext']>h1 {
                font-size: x-small;
            }

            div[name='carouseltext']>p {
                font-size: xx-small;
                margin-bottom: 0px;
            }

            div[name='carouseltext'] {
                left: 10%;
                top: 5%;
                width: 38%;
                background-color: #fff;
                border-radius: 2%;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                padding: 10px;
            }
        }

        @media (min-width: 431px) {
            div[name='carouseltext']>h1 {
                font-size: x-small;
            }

            div[name='carouseltext']>p {
                font-size: xx-small;
                margin-bottom: 0px;
            }

            div[name='carouseltext'] {
                left: 10%;
                top: 15%;
                width: 38%;
                background-color: #fff;
                border-radius: 2%;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                padding: 10px;
            }
        }

        @media (min-width: 576px) {
            div[name='carouseltext']>h1 {
                font-size: 16px;
            }

            div[name='carouseltext']>p {
                font-size: 10px;
            }

            div[name='carouseltext'] {
                font-size: 14px;
                left: 10%;
                top: 20%;
                width: 35%;
                background-color: #fff;
                border-radius: 2%;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                padding: 24px;
            }
        }

        @media (min-width: 768px) {
            div[name='carouseltext']>h1 {
                font-size: 18px;
            }

            div[name='carouseltext']>p {
                font-size: 12px;
            }

            div[name='carouseltext'] {
                font-size: 14px;
                left: 10%;
                top: 20%;
                width: 35%;
                background-color: #fff;
                border-radius: 2%;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                padding: 24px;
            }
        }

        @media (min-width: 992px) {
            div[name='carouseltext']>h1 {
                font-size: 20px;
            }

            div[name='carouseltext']>p {
                font-size: 14px;
            }

            div[name='carouseltext'] {
                font-size: 14px;
                left: 10%;
                top: 20%;
                width: 35%;
                background-color: #fff;
                border-radius: 2%;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                padding: 24px;
            }
        }

        @media (min-width: 1200px) {
            div[name='carouseltext']>h1 {
                font-size: 24px;
            }

            div[name='carouseltext']>p {
                font-size: 18px;
            }

            div[name='carouseltext'] {
                left: 10%;
                top: 20%;
                width: 35%;
                background-color: #fff;
                border-radius: 2%;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                padding: 24px;
            }
        }

        /* @media screen and (min-width: 773px) {
                        
                    }
                    @media screen and (max-width: 772px) {
                         .carousel-item {
                                position: relative;
                                color: black;
                                height: auto;
                            }

                            .carousel-item img {
                                width: 100%;
                                height: auto;
                            }

                            .carousel-item .position-absolute {
                                left: 5%;
                                top: 10%;
                                width: 90%;
                                border-radius: 5%;
                                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                            }
                    } */
    </style>

    <style>
        .footer_area {
            position: relative;
            /* z-index: 1; */
            overflow: hidden;
            webkit-box-shadow: 0 8px 48px 8px rgba(47, 91, 234, 0.175);
            box-shadow: 0 8px 48px 8px rgba(47, 91, 234, 0.175);
            padding: 60px;
        }

        .footer_area .row {
            margin-left: -25px;
            margin-right: -25px;
        }

        .footer_area .row .col,
        .footer_area .row .col-1,
        .footer_area .row .col-10,
        .footer_area .row .col-11,
        .footer_area .row .col-12,
        .footer_area .row .col-2,
        .footer_area .row .col-3,
        .footer_area .row .col-4,
        .footer_area .row .col-5,
        .footer_area .row .col-6,
        .footer_area .row .col-7,
        .footer_area .row .col-8,
        .footer_area .row .col-9,
        .footer_area .row .col-auto,
        .footer_area .row .col-lg,
        .footer_area .row .col-lg-1,
        .footer_area .row .col-lg-10,
        .footer_area .row .col-lg-11,
        .footer_area .row .col-lg-12,
        .footer_area .row .col-lg-2,
        .footer_area .row .col-lg-3,
        .footer_area .row .col-lg-4,
        .footer_area .row .col-lg-5,
        .footer_area .row .col-lg-6,
        .footer_area .row .col-lg-7,
        .footer_area .row .col-lg-8,
        .footer_area .row .col-lg-9,
        .footer_area .row .col-lg-auto,
        .footer_area .row .col-md,
        .footer_area .row .col-md-1,
        .footer_area .row .col-md-10,
        .footer_area .row .col-md-11,
        .footer_area .row .col-md-12,
        .footer_area .row .col-md-2,
        .footer_area .row .col-md-3,
        .footer_area .row .col-md-4,
        .footer_area .row .col-md-5,
        .footer_area .row .col-md-6,
        .footer_area .row .col-md-7,
        .footer_area .row .col-md-8,
        .footer_area .row .col-md-9,
        .footer_area .row .col-md-auto,
        .footer_area .row .col-sm,
        .footer_area .row .col-sm-1,
        .footer_area .row .col-sm-10,
        .footer_area .row .col-sm-11,
        .footer_area .row .col-sm-12,
        .footer_area .row .col-sm-2,
        .footer_area .row .col-sm-3,
        .footer_area .row .col-sm-4,
        .footer_area .row .col-sm-5,
        .footer_area .row .col-sm-6,
        .footer_area .row .col-sm-7,
        .footer_area .row .col-sm-8,
        .footer_area .row .col-sm-9,
        .footer_area .row .col-sm-auto,
        .footer_area .row .col-xl,
        .footer_area .row .col-xl-1,
        .footer_area .row .col-xl-10,
        .footer_area .row .col-xl-11,
        .footer_area .row .col-xl-12,
        .footer_area .row .col-xl-2,
        .footer_area .row .col-xl-3,
        .footer_area .row .col-xl-4,
        .footer_area .row .col-xl-5,
        .footer_area .row .col-xl-6,
        .footer_area .row .col-xl-7,
        .footer_area .row .col-xl-8,
        .footer_area .row .col-xl-9,
        .footer_area .row .col-xl-auto {
            padding-right: 25px;
            padding-left: 25px;
        }

        .single-footer-widget {
            position: relative;
            z-index: 1;
        }

        .single-footer-widget .copywrite-text a {
            color: #747794;
            font-size: 1rem;
        }

        .single-footer-widget .copywrite-text a:hover,
        .single-footer-widget .copywrite-text a:focus {
            color: #3f43fd;
        }

        .single-footer-widget .widget-title {
            margin-bottom: 1.5rem;
        }

        .single-footer-widget .footer_menu li a {
            color: #747794;
            margin-bottom: 1rem;
            display: block;
            font-size: 1rem;
        }

        .single-footer-widget .footer_menu li a:hover,
        .single-footer-widget .footer_menu li a:focus {
            color: #3f43fd;
        }

        .single-footer-widget .footer_menu li:last-child a {
            margin-bottom: 0;
        }

        .footer_social_area {
            position: relative;
            z-index: 1;
        }

        .footer_social_area a {
            border-radius: 50%;
            height: 40px;
            text-align: center;
            width: 40px;
            display: inline-block;
            background-color: #f5f5ff;
            line-height: 40px;
            -webkit-box-shadow: none;
            box-shadow: none;
            margin-right: 10px;
        }

        .footer_social_area a i {
            line-height: 36px;
        }

        .footer_social_area a:hover,
        .footer_social_area a:focus {
            color: #ffffff;
        }

        @-webkit-keyframes bi-cycle {
            0% {
                left: 0;
            }

            100% {
                left: 100%;
            }
        }

        @keyframes bi-cycle {
            0% {
                left: 0;
            }

            100% {
                left: 100%;
            }
        }

        ol li,
        ul li {
            list-style: none;
        }

        ol,
        ul {
            margin: 0;
            padding: 0;
        }
    </style>
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">
    <script src="jquery-1.9.1.min.js"></script>
    <script src="assets/owl-carousel/owl.carousel.js"></script>
    <style>
        #hiddenList {
            display: none;
            position: absolute;
            background-color: #fff;
            border: 1px solid #100d0d;
            padding: 10px;
        }

        #hiddenList li {
            list-style: none;
        }

        #hiddenList li a {
            text-decoration: none;
            color: #333;
            display: block;
            padding: 5px 0;
        }

        #hiddenList li a:hover {
            background-color: #0a0707;
        }

        #hoverBtn:hover+#hiddenList {
            display: block;
        }
    </style>

    <style type="text/css">
        .navbar .megamenu {
            padding: 1rem;
        }

        /* ============ desktop view ============ */
        @media all and (min-width: 992px) {

            .navbar .has-megamenu {
                position: static !important;
            }

            .navbar .megamenu {
                /* left: 0; */
                /* right: 0; */
                /* width: 100%; */
                margin-top: 0;
            }

            .menuA:hover+menu {
                display: block;
            }
        }

        /* ============ desktop view .end// ============ */
        /* ============ mobile view ============ */
        @media(max-width: 991px) {

            .navbar.fixed-top .navbar-collapse,
            .navbar.sticky-top .navbar-collapse {
                overflow-y: auto;
                max-height: 90vh;
                margin-top: 10px;
            }
        }

        /* ============ mobile view .end// ============ */
    </style>
    <style>
        .row {
            margin-right: 0px;
            margin-left: 0px;
        }
    </style>
    {{-- <script>
        // Get the dropdown menu
        const dropdownMenu = document.querySelector('.dropdown');

        // Prevent the dropdown menu from closing on mouseleave
        dropdownMenu.addEventListener('mouseleave', function(event) {
            event.stopPropagation();
        });
    </script> --}}
    <style>
        .image-container {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
    </style>
    {{-- <style>
        .dropdown:hover>.dropdown-menu {
            display: block;
        }

        .dropdown-menu li {
            position: relative;
        }

        .dropdown-menu .dropdown-submenu {
            display: none;
            position: absolute;
            left: 100%;
            top: -11px;
        }

        .dropdown-menu .dropdown-submenu-left {
            right: 100%;
            left: auto;
        }

        .dropdown-menu>li:hover>.dropdown-submenu {
            display: block;
        }

        .dropdown-hover:hover>.dropdown-menu {
            display: inline-block;
        }

        .dropdown-hover>.dropdown-toggle:active {
            /*Without this, clicking will make it sticky*/
            pointer-events: none;
        }
    </style> --}}
@endsection
@section('content')
    <div id="">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                {{-- <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="height: 75px;">
                    <a class="sidebar-brand d-flex align-items-center justify-content-center mr-3"
                        href="{{ route('home') }}">
                        <div class="sidebar-brand-icon">
                            <img src="{{ asset('storage/images/logo.png') }}" alt="">
                        </div>
                        <div class="sidebar-brand-text mx-2">E-Learning</div>
                    </a>
                    <div class="dropdown">
                        <button class="btn btn-white" id="dropdownMenuButton" data-mdb-toggle="dropdown"
                            aria-expanded="false">
                            Categories
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="ulcatlist">

                        </ul>
                    </div>


                    <form action="">
                        <div
                            class="p-1 bg-light rounded rounded-pill shadow-sm mb-4 d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="search" placeholder="Search for...?" aria-describedby="button-addon1"
                                    class="form-control border-0 bg-light">
                                <div class="input-group-append">
                                    <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i
                                            class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        {{-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle"  id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" >
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to
                                            download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" >
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" >
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" >Show All
                                    Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle"  id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" >
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" >
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" >
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy
                                            with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" >
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" >Read More
                                    Messages</a>
                            </div>
                        </li> --}
                        <li class="nav-item no-arrow mx-1">
                            <a class="nav-link" href="{{ route('panier.index') }}" role="button">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </li>
                        <li class="nav-item no-arrow mx-1">
                            <a class="nav-link" href="{{ route('wishlist.index') }}" role="button">
                                <i class="fa-regular fa-heart"></i>
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        @auth
                            <li class="nav-item dropdown no-arrow">
                                {{-- @guest
                                <a href="{{ route('loginpage') }}">
                                    <button type="button" class="btn btn-link px-3 me-2">
                                        Login
                                    </button>
                                </a>
                                <a href="{{ route('registerpage') }}">
                                    <button type="button" class="btn btn-primary px-3 me-3">
                                        Sign up for free
                                    </button></a>
                                <a class="btn btn-primary px-3" href="{{ route('google') }}" role="button">
                                    <i class="fa fa-google"></i>
                                </a>
                                <a class="btn btn-dark px-3" href="{{ route('github') }}" role="button">
                                    <i class="fa-brands fa-github"></i>
                                </a>
                          @endguest --}
                                <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                    <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Settings
                                    </a>
                                    <a class="dropdown-item">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Activity Log
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="{{ route('logout') }}" class="dropdown-item" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        @endauth

                        @guest
                            <div class="mt-3">
                                <a href="{{ route('loginpage') }}" class="btn btn-outline-primary" style="border-radius: 20px;"
                                    role="button">Login</a>
                                <a href="{{ route('registerpage') }}" class="btn btn-primary" style="border-radius: 20px;"
                                    role="button">Register</a>
                            </div>
                        @endguest
                    </ul>
                </nav> --}}
                <div class="alert alert-warning alert-dismissible fade show" role="alert" id="msg">
                    <strong>Compléter Ton Profile</strong>
                    <span class="badge bg-primary rounded-pill">
                        Fin dans <span id="timerCountdown">5 h 59 min 13 s</span>.
                    </span>
                    <button type="button" class="btn"><a href="{{route('profile')}}">Cliquez pour Compléter</a></button>
                    <button type="button" id="msgbtn" class="btn-close" aria-label="Close"></button>
                </div>
                @include('master.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid row d-flex justify-content-center align-item-center"
                    style="padding-right: 0px;margin-left: 0px;padding-left: 0px;margin-right: 0px;">
                    <div id="carouselExample" class="carousel slide col-12">
                        <div class="carousel-inner">
                            <div class="carousel-item active position-relative" style="color: black">
                                <img src="https://img-b.udemycdn.com/notices/web_carousel_slide/image/4eab1b33-68a6-4419-ab03-14a255b62f42.jpg"
                                    class="d-block w-100" alt="...">
                                <div class="position-absolute" name='carouseltext'>
                                    <h1 style="font-family: Georgia, serif;">Des compétences pour votre
                                        avenir.</h1>
                                    <p>
                                        Développez votre potentiel avec un cours à partir de 11,99&nbsp;$US seulement. La
                                        promotion se termine aujourd'hui.
                                    </p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="https://img-b.udemycdn.com/notices/web_carousel_slide/image/a312e355-0a20-4a46-a0b8-65c71539af30.jpg"
                                    class="d-block w-100" alt="...">
                                <div class="position-absolute" name='carouseltext'>
                                    <h1 style="font-family: Georgia, serif;">Des connaissances pour votre futur moi.</h1>
                                    <p>
                                        Apprenez des compétences auprès de formateurs confirmés du monde entier. Les cours
                                        sont à partir de 12,99 $US jusqu'au 21 décembre.
                                    </p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="https://img-b.udemycdn.com/notices/web_carousel_slide/image/e6cc1a30-2dec-4dc5-b0f2-c5b656909d5b.jpg"
                                    class="d-block w-100" alt="...">
                                <div class="position-absolute" name='carouseltext'>
                                    <h1 style="font-family: Georgia, serif;">Un apprentissage qui vous ressemble.</h1>
                                    <p>
                                        Des compétences pour aujourd'hui (et demain). Nous vous accompagnons dans vos
                                        premiers pas.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    <div class="outer-div  mt-5"
                        style="background-color: #f4f7f6;
                            height: 200px; display: flex; align-items: center; justify-content: center;">
                        <div class="inner-div ms-3 me-3 text-center"
                            style="font-size: smaller; font-family: Georgia, serif; width:100%;">
                            <h2 class="text-center mb-3" style="font-size: small;font-family: Georgia, serif;">
                                Plus de 15 000&nbsp;entreprises et des millions de participants nous font confiance dans
                                le monde entier
                            </h2>
                            <ul class="list-unstyled d-flex justify-content-between align-items-center ms-3 me-3 flex-wrap">
                                <li class="partner-logos-module--item--1KtIF">
                                    <img src="https://s.udemycdn.com/partner-logos/ou-v1/volkswagen.svg"
                                        alt="Volkswagen logo" width="48" height="48" loading="lazy">
                                </li>
                                <li class="partner-logos-module--item--1KtIF"><img
                                        src="https://s.udemycdn.com/partner-logos/ou-v1/samsung.svg" alt="Samsung logo"
                                        width="101" height="34" loading="lazy">
                                </li>
                                <li class="partner-logos-module--item--1KtIF"><img
                                        src="https://s.udemycdn.com/partner-logos/ou-v1/cisco.svg" alt="Cisco logo"
                                        width="87" height="40" loading="lazy"></li>
                                <li class="partner-logos-module--item--1KtIF"><img
                                        src="https://s.udemycdn.com/partner-logos/ou-v1/att.svg" alt="ATT&amp;T logo"
                                        width="97" height="40" loading="lazy">
                                </li>
                                <li class="partner-logos-module--item--1KtIF"><img
                                        src="https://s.udemycdn.com/partner-logos/ou-v1/procter_gamble.svg"
                                        alt="Procter &amp; Gamble logo" width="48" height="48" loading="lazy">
                                </li>
                                <li class="partner-logos-module--item--1KtIF"><img
                                        src="https://s.udemycdn.com/partner-logos/ou-v1/hewlett_packard_enterprise.svg"
                                        alt="Hewlett Packard Enterprise logo" width="94" height="40"
                                        loading="lazy">
                                </li>
                                <li class="partner-logos-module--item--1KtIF"><img
                                        src="https://s.udemycdn.com/partner-logos/ou-v1/citi.svg" alt="Citi logo"
                                        width="62" height="40" loading="lazy">
                                </li>
                                <li class="partner-logos-module--item--1KtIF"><img
                                        src="https://s.udemycdn.com/partner-logos/ou-v1/ericsson.svg" alt="Ericsson logo"
                                        width="55" height="48" loading="lazy">
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="category-carousel row mt-3" {{-- style="background-color: #f4f7f6;" --}}>
                        <h5 style="color: black ;font-family: Georgia, serif;" class="col-10 pt-3">Les participants
                            regardent</h5>
                        <div class="owl-carousel">
                            @foreach ($lastC as $cour)
                                <div style="margin-top: 24px;margin-bottom: 10px;" class="item card product_item">
                                    {{-- <div class="body">
                                        <div class="cp_img">
                                            <a href="{{ route('cour.show', $cour->id_C) }}">
                                                <img 
                                                    src="{{ asset('storage/' . $cour['photo']) }}" alt="Product"
                                                    class="img-fluid">
                                            </a>
                                            <div class="hover">

                                                @if ($cour->panier()->where('id_C', $cour->id_C)->exists())
                                                    <a href="{{ route('panier.index') }}" class="btn btn-primary btn-sm">
                                                        <i class="zmdi zmdi-shopping-cart"></i>
                                                    </a>
                                                @else
                                                    <a href="#" name="panier" data-id="{{ $cour->id_C }}"
                                                        class="btn btn-primary btn-sm"
                                                        data-route="{{ route('panier.store') }}">
                                                        <i class="zmdi zmdi-shopping-cart"></i>
                                                    </a>
                                                @endif
                                                @if ($cour->wishlist()->where('id_C', $cour->id_C)->exists())
                                                    <a href="{{ route('wishlist.index') }}" class="btn btn-white">
                                                        <i class="fa-solid fa-heart"></i>
                                                    </a>
                                                @else
                                                    <a href="#" name="wishlist" data-id="{{ $cour->id_C }}"
                                                        class="btn btn-white" data-route="{{ route('wishlist.store') }}">
                                                        <i class="fa-regular fa-heart"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product_details" style="width: 174px;">
                                            <h5 class="title ">
                                                <a class="" href="#">{{ $cour->title }}</a>
                                            </h5>
                                            <ul class="product_price list-unstyled">
                                                <li class="new_price">
                                                    @if ($cour->price === 0.0)
                                                        Free
                                                    @else
                                                        ${{ $cour->price }}
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div> --}}
                                    <div class="body text-center">
                                        <div class="cp_img">
                                            <a href="{{ route('cour.show', $cour->id_C) }}">
                                                <img src="{{ asset('storage/' . $cour['photo']) }}" alt="Product"
                                                    class="img-fluid">
                                            </a>
                                            <div class="hover">
                                                @if ($cour->panier()->where('id_C', $cour->id_C)->exists())
                                                    <a href="{{ route('panier.index') }}" class="btn btn-primary btn-sm">
                                                        <i class="zmdi zmdi-shopping-cart"></i>
                                                    </a>
                                                @else
                                                    <a href="#" name="panier" data-id="{{ $cour->id_C }}"
                                                        class="btn btn-primary btn-sm"
                                                        data-route="{{ route('panier.store') }}">
                                                        <i class="zmdi zmdi-shopping-cart"></i>
                                                    </a>
                                                @endif
                                                @if ($cour->wishlist()->where('id_C', $cour->id_C)->exists())
                                                    <a href="{{ route('wishlist.index') }}" class="btn btn-white">
                                                        <i class="fa-solid fa-heart"></i>
                                                    </a>
                                                @else
                                                    <a href="#" name="wishlist" data-id="{{ $cour->id_C }}"
                                                        class="btn btn-white" data-route="{{ route('wishlist.store') }}">
                                                        <i class="fa-regular fa-heart"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product_details">
                                            <h5 class="title ">
                                                <a class="" href="#">{{ $cour->title }}</a>
                                            </h5>
                                            <ul class="product_price list-unstyled">
                                                {{-- <li class="old_price">$16.00</li> --}}
                                                <li class="new_price">
                                                    @if ($cour->price === 0.0)
                                                        Free
                                                    @else
                                                        ${{ $cour->price }}
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- <button id="prev">prev</button>
                        <button id="next">next</button> --}}
                    </div>

                    <div>
                        <h5 style="color: black ;font-family: Georgia, serif;">Meilleures catégories</h5>
                        <div class="row text-center" id="divcat">
                        </div>
                    </div>

                    <div class="inner-div ms-3 me-3 mt-5">
                        <div class="row ms-5 me-5 d-flex justify-content-center align-item-center">
                            <div class="col-sm-12 col-md-4 col-lg-4" {{-- style="background-color: #f4f7f6;" --}}>
                                <h3 class="pt-4" style="font-family: Georgia, serif; color:#4463d1;">E-Learning</h3>
                                <h4 style="font-family: Georgia, serif;" class="mt-2 pt-2">Développez tes compétences avec
                                    E-Learning
                                </h4>
                                <h6 style="font-family: Georgia, serif;" class="mt-2 pt-2">
                                    Accès illimité à plus de 25 000+ des meilleurs cours E-Learning, partout et à tout
                                    moment
                                </h6>
                                <a href="#" class="btn btn-dark mt-5">En savoir plus</a>
                            </div>
                            {{-- <div class="col-sm-12 col-md-4 col-lg-4"></div> --}}
                            <div class="image-container col-sm-12 col-md-4 col-lg-4" {{-- style="background-color: #f4f7f6;" --}}>
                                <img class="img-fluid" src="{{ asset('storage/images/AccImg/img1.webp') }}" />
                            </div>
                        </div>
                    </div>
                    <div class="inner-div ms-3 me-3 mt-5">
                        <div class="row ms-5 me-5 d-flex justify-content-center align-item-center">
                            <div class="image-container col-sm-12 col-md-4 col-lg-4 ">
                                <img class="img-fluid" src="{{ asset('storage/images/AccImg/img2.jpg') }}" />
                            </div>
                            {{-- <div class="col-sm-12 col-md-4 col-lg-4"></div> --}}
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <h3 class="pt-4" style="font-family: Georgia, serif;">Devenir formateur</h3>
                                <h4 style="font-family: Georgia, serif;">
                                    Nos formateurs du monde entier donnent des cours à des millions de participants sur
                                    E-Learning. Nous vous offrons les outils et les compétences nécessaires pour enseigner
                                    ce que vous aimez.
                                </h4>
                                <a href="#" class="btn btn-dark">Commencez à enseigner dès aujourd'hui</a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            {{-- @include('master.footer') --}}
            <footer class="footer_area section_padding_130_0 mt-5">
                <div class="container">
                    <div class="row">
                        <!-- Single Widget-->
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="single-footer-widget section_padding_0_130">
                                <!-- Footer Logo-->
                                <div class="footer-logo mb-3"></div>
                                <p>this page is completely creative, lightweight, clean app landing page.</p>
                                <!-- Copywrite Text-->
                                <div class="copywrite-text mb-5">
                                    <p class="mb-0">Made with <i class="lni-heart mr-1"></i>by<a class="ml-1"
                                            href="#">E-Learning</a></p>
                                </div>
                                <!-- Footer Social Area-->
                                <div class="footer_social_area"><a href="#" data-toggle="tooltip"
                                        data-placement="top" title="" data-original-title="Facebook"><i
                                            class="fa-brands fa-facebook"></i></a><a href="#" data-toggle="tooltip"
                                        data-placement="top" title="" data-original-title="Pinterest"><i
                                            class="fa-brands fa-pinterest"></i></a><a href="#"
                                        data-toggle="tooltip" data-placement="top" title=""
                                        data-original-title="Skype"><i class="fa-brands fa-skype"></i></a><a
                                        href="#" data-toggle="tooltip" data-placement="top" title=""
                                        data-original-title="Twitter"><i class="fa-brands fa-twitter"></i></a></div>
                            </div>
                        </div>
                        <!-- Single Widget-->
                        <div class="col-12 col-sm-6 col-lg">
                            <div class="single-footer-widget section_padding_0_130">
                                <!-- Widget Title-->
                                <h5 class="widget-title">About</h5>
                                <!-- Footer Menu-->
                                <div class="footer_menu">
                                    <ul>
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Corporate Sale</a></li>
                                        <li><a href="#">Terms &amp; Policy</a></li>
                                        <li><a href="#">Community</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Widget-->
                        <div class="col-12 col-sm-6 col-lg">
                            <div class="single-footer-widget section_padding_0_130">
                                <!-- Widget Title-->
                                <h5 class="widget-title">Support</h5>
                                <!-- Footer Menu-->
                                <div class="footer_menu">
                                    <ul>
                                        <li><a href="#">Help</a></li>
                                        <li><a href="#">Support</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Term &amp; Conditions</a></li>
                                        <li><a href="#">Help &amp; Support</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Widget-->
                        <div class="col-12 col-sm-6 col-lg">
                            <div class="single-footer-widget section_padding_0_130">
                                <!-- Widget Title-->
                                <h5 class="widget-title">Contact</h5>
                                <!-- Footer Menu-->
                                <div class="footer_menu">
                                    <ul>
                                        <li><a href="#">Call Centre</a></li>
                                        <li><a href="#">Email Us</a></li>
                                        <li><a href="#">Term &amp; Conditions</a></li>
                                        <li><a href="#">Help Center</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-lg-12 mt-5 ">
                            <div class="copyright text-center">
                                <span>Copyright &copy; E-Learning {{ date('Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var cat = document.getElementById('cat');
            var catlistdiv = document.getElementById('catlistdiv');
            var catlist = document.getElementById('catlist');
            var scatlist = document.getElementById('scatlist');
            var divcat = document.getElementById('divcat');
            var ulcatlist = document.getElementById('ulcatlist');


            // <li><a class="dropdown-item" href="#"></a></li>
            // for (let index = 0; index < categories.length; index++) {
            //     const lichild = `

        //     <li>
        //                 <a class="dropdown-item" href="#">
        //                     ${categories[index].CatName} &raquo;
        //                 </a>
        //                 <ul class="dropdown-menu dropdown-submenu">`
            //     for (let j = 0; j < souscategories.length; j++) {
            //         console.log(souscategories[j].SCatName);
            //         `
        //                   <li>
        //                     <a class="dropdown-item" href="#">${souscategories[j].SCatName} &raquo; </a>
        //                     <ul class="dropdown-menu dropdown-submenu">
        //                         `
            //         for (let k = 0; k < sujets.length; k++) {
            //             `
        //                       <li>
        //                         <a class="dropdown-item" href="#">${sujets[k].SjName}</a>
        //                       </li>
        //                       `
            //         }
            //         `
        //                     </ul>
        //                   </li>
        //                   `
            //     }
            //     `
        //                 </ul>
        //               </li>
        //         `;
            //     ulcatlist.insertAdjacentHTML('beforeend', lichild);
            // }
            for (let index = 0; index < categories.length; index++) {
                const lichild = `
                    <li>
                        <a class="dropdown-item d-flex justify-content-between" href="#">
                            <div>${categories[index].CatName}</div>
                            <div>&raquo;</div>                             
                        </a>
                        <ul class="dropdown-menu dropdown-submenu" style='width: 350px;'>
                            ${generateSubcategoriesList(categories[index].id_Cat)}
                        </ul>
                    </li>
                `;
                ulcatlist.insertAdjacentHTML('beforeend', lichild);
            }

            function generateSubcategoriesList(categoryId) {
                let subcategoriesList = '';
                for (let j = 0; j < souscategories.length; j++) {
                    if (souscategories[j].id_Cat === categoryId) {
                        subcategoriesList += `
                                <li>
                                    <a class="dropdown-item d-flex justify-content-between" href="#">
                                        <div>${souscategories[j].SCatName}</div>
                                        <div>&raquo;</div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-submenu" style='width: 350px;'>
                                        ${generateSujetsList(souscategories[j].id_SCat)}
                                    </ul>
                                </li>
                            `;
                    }
                }
                return subcategoriesList;
            }

            function generateSujetsList(subcategoryId) {
                let sujetsList = '';
                for (let k = 0; k < sujets.length; k++) {
                    if (sujets[k].id_SCat === subcategoryId) {
                        sujetsList += `
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            ${sujets[k].SjName}
                                        </a>
                                    </li>
                                `;
                    }
                }
                return sujetsList;
            }


            // function categorie() {
            //     categories.forEach(categorie => {
            //         const catli = document.createElement('li');
            //         const cata = document.createElement('a');
            //         cata.textContent = categorie.CatName;
            //         catli.name = categorie.id_Cat;
            //         cata.id = categorie.id_Cat;
            //         cata.classList.add('dropdown-item');
            //         catli.appendChild(cata);
            //         catlist.appendChild(catli);

            //         cata.addEventListener('mouseenter', function() {
            //             souscategorie(cata);
            //             // scatlist.classList.toggle('show');
            //         });
            //         // cata.removeEventListener('mouseleave', souscategorie);

            //         cata.addEventListener('mouseleave', function() {
            //             cata.removeEventListener('mouseenter', souscategorie);
            //             const ulToRemove = cata.querySelectorAll('li');
            //             //     // const ulToRemove = cata.querySelector(`[name='${catli.name}']`);
            //             //     // const ulToRemove = cata.querySelectorAll('li');
            //             // console.log(ulToRemove);
            //             // if (ulToRemove) {
            //             //     cata.removeChild(ulToRemove);
            //             // }
            //             ulToRemove.forEach(li => {
            //                 cata.removeChild(li);
            //             });
            //         });
            //     });
            // }
            // function categorie() {
            //     // categories dropdown
            //     categories.forEach(function(categorie) {
            //         const catli = document.createElement('li');
            //         const catdiv = document.createElement('div');
            //         const cata = document.createElement('a');
            //         cata.textContent = categorie.CatName;
            //         // cata.setAttribute('href', '#');
            //         // catdiv.setAttribute('name', categorieid_Cat
            //         catdiv.name = categorieid_Cat          
            //         catdiv.classList.add('dropdown');
            //         catdiv.classList.add('nav-item');
            //         catdiv.classList.add('dropright');
            //         cata.classList.add('dropdown-item');
            //         console.log('vvv');
            //         catdiv.appendChild(cata);
            //         catli.appendChild(catdiv);
            //         catlist.appendChild(catli);
            //         //event listener for souscategorie
            //         // catdiv.addEventListener('mouseenter', function() {
            //         //     souscategorie(catdiv);
            //         // });

            //         // catdiv.addEventListener('mouseleave', function() {
            //         //     catdiv.removeEventListener('mouseenter', souscategorie);
            //         //     const ulToRemove = catdiv.querySelector('div > ul');
            //         //     if (ulToRemove) {
            //         //         catdiv.removeChild(ulToRemove);
            //         //     }

            //         // });
            //     });
            // }

            // function souscategorie(cata) {
            //     var scatlist = document.createElement('ul');
            //     scatlist.classList.add('dropdown-menu');

            //     const souscat = souscategories.filter(function(e) {
            //         return e.id_Cat === cata.id;
            //     });
            //     console.log(souscat);
            //     souscat.forEach(function(souscategorie) {
            //         const souscatLi = document.createElement('li');
            //         const souscata = document.createElement('a');
            //         souscata.textContent = souscategorie.SCatName;
            //         souscatLi.name = souscategorie.id_SCat;
            //         souscata.classList.add('dropdown-item');

            //         souscatLi.appendChild(souscata);
            //         // cata.appendChild(souscatLi);
            //         scatlist.appendChild(souscatLi);
            //         cata.appendChild(scatlist);
            //         // console.log(scatlist);
            //         // catdiv.appendChild(scatlist);


            //         // event listener for sujet
            //         // souscatdiv.addEventListener('mouseenter', function() {
            //         //     sujet(souscatdiv);

            //         // });
            //         // souscatdiv.addEventListener('mouseleave', function() {
            //         //     souscatdiv.removeEventListener('mouseenter', sujet);
            //         //     const ulToRemove = souscatdiv.querySelector('div > ul');
            //         //     if (ulToRemove) {
            //         //         souscatdiv.removeChild(ulToRemove);
            //         //     }
            //         // });

            //     });

            //     // souscatdiv.appendChild(souscata); 
            //     // souscatLi.appendChild(souscatdiv); 
            //     // scatlist.appendChild(souscatLi);

            // }

            // function sujet(souscatdiv) {
            //     var sujetList = document.createElement('ul');
            //     sujetList.classList.add('dropdown-menu');
            //     const sujet = sujets.filter(function(e) {
            //         return e.id_Sj == souscatdiv.name;
            //     })
            //     sujet.forEach(function(sj) {
            //         const sujetLi = document.createElement('li');
            //         const sujetdiv = document.createElement('div');
            //         const sujeta = document.createElement('a');
            //         sujeta.textContent = sj.SjName;

            //         sujetdiv.id = sujet.id_Sj;
            //         sujetdiv.classList.add('dropdown');
            //         sujetdiv.classList.add('nav-item');
            //         sujetdiv.classList.add('dropright');
            //         sujeta.classList.add('dropdown-item');
            //         sujetdiv.appendChild(sujeta);
            //         sujetLi.appendChild(sujetdiv);
            //         sujetList.appendChild(sujetLi);

            //         souscatdiv.appendChild(sujetList);
            //     });
            // }

            // cat.addEventListener('mouseenter', categorie);
            // cat.addEventListener('mouseleave', function() {
            //     cat.removeEventListener('mouseenter', categorie);
            // });


            // $('.owl-carousel').owlCarousel({
            //     loop: true,
            //     margin: 10,
            //     responsiveClass: true,
            //     responsive: {
            //         0: {
            //             items: 1,
            //             nav: true
            //         },
            //         600: {
            //             items: 3,
            //             nav: true
            //         },
            //         1000: {
            //             items: 5,
            //             nav: true,
            //             loop: true
            //         }
            //     }
            // });
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                //   lazyLoad: 'ondemand',
                // slidesToShow: 3,
                // slidesToScroll: 3
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 3,
                        nav: true
                    },
                    1000: {
                        items: 5,
                        nav: true,
                        loop: true
                    }
                }
            });


            for (let index = 0; index <= 3; index++) {
                const Dchild = `
                <a href='#' class='col-sm-6 col-md-6 col-lg-3' style='text-decoration: none;'>
                            <div><img style='height:183px ;width:275px; ' src="{{ asset('storage/images/CategoriesImg/${categories[index].CatName}.jpg') }}"/></div>
                            <div><h6 style='color: #2d2f31;
                                    padding: .8rem 0 1.6rem;' class='ms-1'>${categories[index].CatName}</h6></div>
                        </a>
                    `;
                divcat.insertAdjacentHTML('beforeend', Dchild);
            }




            $('#msgbtn').on('click', function() {
                $('#msg').hide();
            });

        });
    </script>
@endsection
