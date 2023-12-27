<style>
    .icon-container {
        position: relative;
        display: inline-block;
    }

    .icon-number {
        position: absolute;
        font-size: 12px;
        color: white;
        line-height: 14px;
        background-color: #d1d3e2;
        ;
        border-radius: 16px;
        text-align: center;
        font-weight: 700;
        min-height: 14px;
        padding: 0 4px;
        top: 22px;
        right: 1px;
    }

    @media screen and (min-width: 773px) {
        .authM {
            display: none;
        }
        .authD {
            display: block;
        }
    }

    @media screen and (max-width: 772px) {
        .authM {
            display: block;
        }
        .authD {
            display: none;
        }
    }
</style>


{{-- <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <a class="sidebar-brand d-flex text-decoration-none align-items-center justify-content-center ms-1"
        href="{{ route('index') }}">
        <div class="sidebar-brand-icon ps-1">
            <img src="{{ asset('storage/images/logo.png') }}" alt="">
        </div>
        <div class="sidebar-brand-text mx-2">E-Learning</div>
    </a>
    <form id="courSearchForm" method="get" action="{{ route('cour.search') }}"
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        @csrf
        <div class="input-group">
            <input type="text" name="searchInput" class="form-control bg-light border-0 small" id="searchInput"
                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit" id="searchButton">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>


    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search"
                 id="courSearchForm" method="get" action="{{ route('cour.search') }}">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="searchInput" class="form-control bg-light border-0 small"
                            id="searchInput" placeholder="Search for..." aria-label="Search"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" id="searchButton">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <li class="nav-item no-arrow mx-1">
            <a class="nav-link" href="{{ route('panier.index') }}" role="button">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="icon-number">{{ $numberOfItems }}</span>
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
                    <a class="dropdown-item" href="{{ route('home2') }}">
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

    </ul>

</nav> --}}


<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="height: 75px;">
    <a class="sidebar-brand d-flex align-items-center justify-content-center mr-3"
        @guest href="{{ route('home') }}" @endguest @auth href="{{ route('index') }}" @endauth>
        <div class="sidebar-brand-icon">
            <img src="{{ asset('storage/images/logo.png') }}" alt="">
        </div>
        <div class="sidebar-brand-text mx-2">E-Learning</div>
    </a>
    @guest
        <div class="dropdown">
            <button class="btn btn-white" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                Categories
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="ulcatlist">

            </ul>
        </div>
    @endguest


    <form id="courSearchForm" method="get" action="{{ route('cour.search') }}"
        class="d-none d-sm-inline-block form-inline  navbar-search">
        @csrf
        <div class="p-1 bg-light rounded rounded-pill shadow-sm d-none d-sm-inline-block form-inline navbar-search">
            <div class="input-group">
                <input type="search" name="searchInput" id="searchInput" placeholder="Search for...?"
                    aria-describedby="button-addon1" class="form-control border-0 bg-light">
                <div class="input-group-append">
                    <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i
                            class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        {{-- <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-bars"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <li class="nav-item no-arrow mx-1">
                    <a class="nav-link" href="{{ route('panier.index') }}" role="button">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                </li>
                @guest
                <div class="mt-3">
                    <a href="{{ route('loginpage') }}" class="btn btn-outline-primary" style="border-radius: 20px;"
                        role="button">Login</a>
                    <a href="{{ route('registerpage') }}" class="btn btn-primary" style="border-radius: 20px;"
                        role="button">Register</a>
                </div>
            @endguest
            </div>
        </li> --}}

        




        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        {{-- <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search"
                 id="courSearchForm" method="get" action="{{ route('cour.search') }}">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="searchInput" class="form-control bg-light border-0 small"
                            id="searchInput" placeholder="Search for..." aria-label="Search"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" id="searchButton">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
                
            </div>
        </li> --}}
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-2 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form id="courSearchForm" method="get" action="{{ route('cour.search') }}"
                    class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    @csrf
                    <div
                        class="bg-light rounded rounded-pill shadow-sm d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 navbar-search">
                        <div class="input-group">
                            <input type="search" name="searchInput" id="searchInput" placeholder="Search for...?"
                                aria-describedby="button-addon1" class="form-control border-0 bg-light">
                            <div class="input-group-append">
                                <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        {{-- <li class="nav-item dropdown no-arrow d-sm-none">
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
        </li> --}}

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
        </li> --}}
        <li class="nav-item no-arrow mx-1">
            <a class="nav-link" href="{{ route('panier.index') }}" role="button">
                <i class="fa-solid fa-cart-shopping"></i>
            </a>
        </li>
        @auth
            <li class="nav-item no-arrow mx-1">
                <a class="nav-link" href="{{ route('wishlist.index') }}" role="button">
                    <i class="fa-regular fa-heart"></i>
                </a>
            </li>
        @endauth


        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item dropdown no-arrow" name="authM">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-bars"></i>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('panier.index') }}" role="button">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                </a>
                <div class="dropdown-divider"></div>
                @auth
                    <a href="{{ route('logout') }}" class="dropdown-item" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                @endauth
                @guest
                    <a href="{{ route('loginpage') }}" class="dropdown-item btn btn-outline-primary"
                        style="border-radius: 20px;" role="button">Login</a>
                    <a href="{{ route('registerpage') }}" class= " dropdown-item btn btn-primary"
                        style="border-radius: 20px;" role="button">Register</a>
                @endguest

            </div>
        </li>
        @auth
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        <a class="dropdown-item" href="{{ route('home2') }}">
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
        @endauth

        @guest
            <div class="mt-3" name="authD">
                <a href="{{ route('loginpage') }}" class="btn btn-outline-primary" style="border-radius: 20px;"
                    role="button">Login</a>
                <a href="{{ route('registerpage') }}" class="btn btn-primary" style="border-radius: 20px;"
                    role="button">Register</a>
            </div>
        @endguest
    </ul>
</nav>
