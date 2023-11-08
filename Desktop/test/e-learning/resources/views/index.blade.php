@extends('master.layout')

@section('title', 'index')

@section('content')
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                        <div class="sidebar-brand-icon">
                            <img src="{{ asset('storage/images/logo.png') }}" alt="">
                        </div>
                        <div class="sidebar-brand-text mx-2">E-Learning</div>
                    </a>
                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
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

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
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

                        {{-- <!-- Nav Item - Messages -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
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
                            <a class="dropdown-item d-flex align-items-center" href="#">
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
                            <a class="dropdown-item d-flex align-items-center" href="#">
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
                            <a class="dropdown-item d-flex align-items-center" href="#">
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
                            <a class="dropdown-item d-flex align-items-center" href="#">
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
                            <a class="dropdown-item text-center small text-gray-500" href="#">Read More
                                Messages</a>
                        </div>
                    </li> --}}

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->FirstName }}</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="{{ route('teach') }}">
                                    <i class="fa-solid fa-book-open"></i>
                                    Formateur
                                </a>
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
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    {{-- @yield('container-fluid') --}}
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        @foreach ($coursList as $cour)
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card shadow h-100 py-2">
                                    <img class="card-img-top" src="{{ asset('storage/images/logo.png') }}"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <h6 class="card-title font-weight-bold text-dark text-uppercase mb-1">
                                                    {{ $cour->title }}</h5>
                                                    <p class="card-text">{{ $cour->user->FirstName }}
                                                        {{ $cour->user->LastName }}</p>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                        {{ $cour->price }}$</div>
                                                    <a href="#" name="panier" data-id="{{ $cour->id_C }}"
                                                        class="btn btn-primary"
                                                        data-route="{{ route('panier.store') }}">Ajouter
                                                        au panier</a>
                                                    <a href="#" name="wishlist" data-id="{{ $cour->id_C }}"
                                                        class="btn btn-white"
                                                        data-route="{{ route('wishlist.store') }}"><i
                                                            class="fa-regular fa-heart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; E-Learning {{ date('Y') }}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
@endsection
@section('script')
        $(document).ready(function() {
            $('a[name="panier"]').on('click', function(event) {
                event.preventDefault(); 
                var $panierLink = $(this);
                var id = $(this).data('id');
                var url = $(this).data('route');
                $.ajax({
                    method: 'POST',
                    url: url,
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $panierLink.text('Acceder au panier');
                        $panierLink.attr('href', '{{ route('panier.index') }}');
                        $panierLink.off('click');

                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
            $('a[name="wishlist"]').on('click', function(event) {
                event.preventDefault(); 
                var $wishlistLink = $(this);
                var id = $(this).data('id');
                var url = $(this).data('route');
                $.ajax({
                    method: 'POST',
                    url: url,
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $wishlistLink.html('<i class="fa-solid fa-heart"></i>');
                        $wishlistLink.attr('href', '{{ route('wishlist.index') }}');
                        $wishlistLink.off('click');

                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
@endsection
