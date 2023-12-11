<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>//</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/images/logo.png') }}">
    <link href="{{ asset('storage/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="{{ asset('storage/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="{{ asset('storage/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>



    <style>
        :root {
            --rotate-speed: 40;
            --count: 8;
            /* Default count, the DOM element should override this */
            --easeInOutSine: cubic-bezier(0.37, 0, 0.63, 1);
            --easing: cubic-bezier(0.000, 0.37, 1.000, 0.63);
        }

        body {
            margin: 0;
        }

        .void {
            width: 100%;
            max-width: 1024px;
            margin: auto;
            position: relative;
            aspect-ratio: 1 / 1;
        }

        ul:hover * {
            -webkit-animation-play-state: paused;
            animation-play-state: paused;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            position: relative;
            width: 100%;
            aspect-ratio: 1 / 1;
            outline: 2px dotted magenta;
            z-index: 1;
        }

        li {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            /* 	outline: 2px dashed cyan; */
            width: 100%;
            -webkit-animation: rotateCW calc(var(--rotate-speed) * 1s) var(--easing) infinite;
            animation: rotateCW calc(var(--rotate-speed) * 1s) var(--easing) infinite;
        }

        .card {
            width: 27%;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            padding: 16px 24px;
            gap: 8px;
            background: #FFFFFF;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1), 0px 16px 32px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            font-family: 'Inter', sans-serif;
            font-style: normal;
            font-weight: 400;
            font-size: 14px;
            line-height: 20px;
            color: #535062;
            -webkit-animation: rotateCCW calc(var(--rotate-speed) * 1s) var(--easing) infinite;
            animation: rotateCCW calc(var(--rotate-speed) * 1s) var(--easing) infinite;
        }

        a {
            text-decoration: none;
            color: unset;
        }

        .model-name {
            font-weight: 500;
            font-size: 18px;
            line-height: 150%;
            color: #3B2ED0;
            display: block;
        }

        svg {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 0;
        }

        li:nth-child(2),
        li:nth-child(2) .card {
            -webkit-animation-delay: calc((var(--rotate-speed)/var(--count)) * -1s);
            animation-delay: calc((var(--rotate-speed)/var(--count)) * -1s);
        }

        li:nth-child(3),
        li:nth-child(3) .card {
            -webkit-animation-delay: calc((var(--rotate-speed)/var(--count)) * -2s);
            animation-delay: calc((var(--rotate-speed)/var(--count)) * -2s);
        }

        li:nth-child(4),
        li:nth-child(4) .card {
            -webkit-animation-delay: calc((var(--rotate-speed)/var(--count)) * -3s);
            animation-delay: calc((var(--rotate-speed)/var(--count)) * -3s);
        }

        li:nth-child(5),
        li:nth-child(5) .card {
            -webkit-animation-delay: calc((var(--rotate-speed)/var(--count)) * -4s);
            animation-delay: calc((var(--rotate-speed)/var(--count)) * -4s);
        }

        li:nth-child(6),
        li:nth-child(6) .card {
            -webkit-animation-delay: calc((var(--rotate-speed)/var(--count)) * -5s);
            animation-delay: calc((var(--rotate-speed)/var(--count)) * -5s);
        }

        li:nth-child(7),
        li:nth-child(7) .card {
            -webkit-animation-delay: calc((var(--rotate-speed)/var(--count)) * -6s);
            animation-delay: calc((var(--rotate-speed)/var(--count)) * -6s);
        }

        li:nth-child(8),
        li:nth-child(8) .card {
            -webkit-animation-delay: calc((var(--rotate-speed)/var(--count)) * -7s);
            animation-delay: calc((var(--rotate-speed)/var(--count)) * -7s);
        }

        @-webkit-keyframes rotateCW {
            from {
                transform: translate3d(0px, -50%, -1px) rotate(-45deg);
            }

            to {
                transform: translate3d(0px, -50%, 0px) rotate(-315deg);
            }
        }

        @keyframes rotateCW {
            from {
                transform: translate3d(0px, -50%, -1px) rotate(-45deg);
            }

            to {
                transform: translate3d(0px, -50%, 0px) rotate(-315deg);
            }
        }

        @-webkit-keyframes rotateCCW {
            from {
                transform: rotate(45deg);
            }

            to {
                transform: rotate(315deg);
            }
        }

        @keyframes rotateCCW {
            from {
                transform: rotate(45deg);
            }

            to {
                transform: rotate(315deg);
            }
        }

        @-webkit-keyframes pulseGlow {
            from {
                background-size: 60%;
            }

            to {
                background-size: 100%;
            }
        }

        @keyframes pulseGlow {
            from {
                background-size: 60%;
            }

            to {
                background-size: 100%;
            }
        }

        .center-circle {
            position: absolute;
            width: 230px;
            aspect-ratio: 1 / 1;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background: #FFFFFF;
            box-shadow: 0px 18px 36px -18px rgba(12, 5, 46, 0.3), 0px 30px 60px -12px rgba(12, 5, 46, 0.25);
            border-radius: 50%;
        }

        .second-circle {
            position: absolute;
            width: 40%;
            aspect-ratio: 1 / 1;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background: #F5F4FE;
            opacity: 0.5;
            box-shadow: 0px 18px 36px -18px rgba(12, 5, 46, 0.3), 0px 30px 60px -12px rgba(12, 5, 46, 0.25);
            border-radius: 50%;
        }

        .last-circle {
            position: absolute;
            width: 66%;
            aspect-ratio: 1 / 1;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background: #F5F4FE;
            opacity: 0.25;
            box-shadow: 0px 18px 36px -18px rgba(12, 5, 46, 0.3), 0px 30px 60px -12px rgba(12, 5, 46, 0.25);
            border-radius: 50%;
        }

        .crop {
            -webkit-mask-image: linear-gradient(90deg, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 1) 50%, rgba(0, 0, 0, 1));
        }

        .mask {
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            width: 50%;
            -webkit-animation: pulseGlow 5s linear infinite alternate;
            animation: pulseGlow 5s linear infinite alternate;
            background-position: 100% 50%;
            background-repeat: no-repeat;
            background-image: radial-gradient(100% 50% at 100% 50%, rgba(60, 26, 229, 0.25) 0%, rgba(60, 26, 229, 0.247904) 11.79%, rgba(59, 26, 229, 0.241896) 21.38%, rgba(58, 26, 229, 0.2324) 29.12%, rgba(57, 26, 229, 0.219837) 35.34%, rgba(55, 26, 229, 0.20463) 40.37%, rgba(53, 26, 229, 0.1872) 44.56%, rgba(51, 26, 229, 0.16797) 48.24%, rgba(48, 26, 229, 0.147363) 51.76%, rgba(46, 26, 229, 0.1258) 55.44%, rgba(44, 26, 229, 0.103704) 59.63%, rgba(41, 26, 229, 0.0814963) 64.66%, rgba(39, 26, 229, 0.0596) 70.88%, rgba(36, 26, 229, 0.038437) 78.62%, rgba(34, 26, 229, 0.0184296) 88.21%, rgba(32, 26, 229, 0) 100%);
        }

        .mask:after {
            content: "";
            position: absolute;
            width: 1px;
            height: 100%;
            right: 0;
            display: block;
            background-image: linear-gradient(180deg, rgba(60, 26, 229, 0) 0%, #3C1AE5 50%, rgba(60, 26, 229, 0) 100%);
        }

        .mask span {
            font-family: Arial, sans-serif;
            font-style: italic;
            /* Specify the desired font family */
            font-size: 28px;
            /* Specify the desired font size */
            /* Add other span styles if needed */
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <a class="sidebar-brand d-flex text-decoration-none align-items-center justify-content-center ms-1" href="{{ route('index') }}">
            {{-- <div class="sidebar-brand-icon ps-1">
                <img src="{{ asset('storage/images/logo.png') }}" alt="">
            </div> --}}
            {{-- <div class="sidebar-brand-text mx-2">E-Learning</div> --}}
            <div class="sidebar-brand-text mx-2 fst-italic fw-bolder" style=" color: rgb(112, 112, 231);">E-Learning</div>

        </a>
         {{-- <form id="courSearchForm" method="get" action="{{ route('cour.search') }}"
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" name="searchInput" class="form-control bg-light border-0 small" id="searchInput"
                    placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" id="searchButton">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form> --}}
     
    
        {{-- <ul class="navbar-nav ml-auto">
    
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
    
            <li class="nav-item no-arrow mx-1">
                <a class="nav-link" href="{{ route('panier.index') }}" role="button">
                    <i class="fa-solid fa-basket-shopping"></i>
                </a>
            </li>
            <li class="nav-item no-arrow mx-1">
                <a class="nav-link" href="{{ route('wishlist.index') }}" role="button">
                    <i class="fa-regular fa-heart"></i>
                </a>
            </li>
    
    
    
            <div class="topbar-divider d-none d-sm-block"></div>
    
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <div class="rounded-circle d-flex justify-content-center align-items-center"
                        style="width: 40px; height: 40px; background-color: black; color: white;">
                        {{ strtoupper(substr(auth()->user()->FirstName, 0, 1) . substr(auth()->user()->LastName, 0, 1)) }}
                    </div>
                    </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{ route('profile') }}">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    @if (auth()->user()->roles->contains('role_name', 'moderateur'))
                    <a class="dropdown-item" href="{{ route('home2') }}">
                        <i class="fa-solid fa-gauge-high" style="color: #d1d3e2;"></i>
                        Dashboard
                    </a>
                    @elseif (auth()->user()->roles->contains('role_name', 'formateur'))
                    <a class="dropdown-item" href="{{ route('teach') }}">
                        <i class="fa-solid fa-book-open"></i>
                        Formateur
                    </a>
                    @elseif (auth()->user()->roles->contains('role_name', 'client'))
                    <a class="dropdown-item" href="{{route('home2')}}">
                        <i class="fa-solid fa-gauge-high" style="color: #d1d3e2;"></i>
                        Dashboard
                    </a>
                    @endif
                    
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>
    
        </ul> --}}
    
    </nav>
    
    <!-- partial:index.partial.html -->
    <div class="void" id="void">
        <div class="crop">
            <ul id="card-list" style="--count: 5;">
                {{-- <li>
                    <div class="card"><a href=""><span class="model-name">Gretel-ACTGAN</span><span>Model for
                                generating highly dimensional, mostly numeric, tabular data</span></a></div>
                </li>
                <li>
                    <div class="card"><a href=""><span class="model-name">Gretel-ACTGAN</span><span>Model for
                                generating highly dimensional, mostly numeric, tabular data</span></a></div>
                </li>
                <li>
                    <div class="card"><a href=""><span class="model-name">Gretel-ACTGAN</span><span>Model for
                                generating highly dimensional, mostly numeric, tabular data</span></a></div>
                </li>
                <li>
                    <div class="card"><a href=""><span class="model-name">Gretel-ACTGAN</span><span>Model for
                                generating highly dimensional, mostly numeric, tabular data</span></a></div>
                </li>
                <li>
                    <div class="card"><a href=""><span class="model-name">Gretel-ACTGAN</span><span>Model for
                                generating highly dimensional, mostly numeric, tabular data</span></a></div>
                </li>
                <li>
                    <div class="card"><a href=""><span class="model-name">Gretel-ACTGAN</span><span>Model for
                                generating highly dimensional, mostly numeric, tabular data</span></a></div>
                </li> --}}
            </ul>
            <div class="last-circle"></div>
            <div class="second-circle"></div>
        </div>
        <div class="mask"><span>our categories</span></div>
        <div class="center-circle"></div>
        <div>
            <!-- partial -->

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src=" {{ asset('storage/vendor/jquery/jquery.min.js') }}"></script>
<script src=" {{ asset('storage/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src=" {{ asset('storage/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src=" {{ asset('storage/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('storage/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('storage/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="{{ asset('storage/js/demo/datatables-demo.js') }}"></script>
<script>
    var categories = @json($categories);
    var contenu = '';
    categories.forEach(item => {
        contenu += `<li>
                  <div class="card"><a href="{{ route('index') }}"><span class="model-name">${item.CatName}</span><span>Model for
                  generating highly dimensional, mostly numeric, tabular data</span></a></div>
              </li>`;
    });
    $('#card-list').html(contenu);
</script>

</html>
