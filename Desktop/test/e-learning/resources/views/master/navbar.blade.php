<style>
    /* Style for the icon container */
    .icon-container {
        position: relative;
        display: inline-block;
    }

    /* Style for the number inside the icon */
    .icon-number {
        /* position: absolute;
    top: 15px;
    right: 0px;
    background-color: gray;
    color: white;
    border-radius: 50%;
    padding: 2px 5px;
    font-size: smaller;
    width: 10px;
    height: 10px; */
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
</style>


<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
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
                {{-- <i class="fa-solid fa-basket-shopping"></i> --}}
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
                {{-- <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->FirstName }}</span> --}}
                <div class="rounded-circle d-flex justify-content-center align-items-center"
                    style="width: 40px; height: 40px; background-color: black; color: white;">
                    {{ strtoupper(substr(auth()->user()->FirstName, 0, 1) . substr(auth()->user()->LastName, 0, 1)) }}
                </div>

                {{-- <img class="img-profile rounded-circle" src="img/undraw_profile.svg"> --}}
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
                {{-- <a class="dropdown-item" href="#">
            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
            Activity Log
        </a> --}}
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
