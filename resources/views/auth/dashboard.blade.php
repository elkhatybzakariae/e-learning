@extends('master.layout')
@section('title', 'dashboard')
@section('content')
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('index') }}">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('storage/images/logo.png') }}" alt="">
                </div>
                <div class="sidebar-brand-text mx-2">E-Learning</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home2') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            @if (auth()->user()->roles->contains('role_name', 'superadmin'))
                <!-- Heading -->
                <div class="sidebar-heading">
                    e-learning management
                </div>

                <!-- Nav Item  -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsecomptes"
                        aria-expanded="true" aria-controls="collapsecomptes">
                        <i class="fa-solid fa-user"></i>
                        <span>Gestion des comptes</span>
                    </a>
                    <div id="collapsecomptes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('gestiondescomptes') }}">Table Des Comptes</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseroles"
                        aria-expanded="true" aria-controls="collapseroles">
                        <i class="fa-regular fa-address-book"></i>
                        <span>Gestion des Roles</span>
                    </a>
                    <div id="collapseroles" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('roleindex') }}">Table Des Roles</a>
                        </div>
                    </div>
                </li>
            @elseif (auth()->user()->roles->contains('role_name', 'moderateur'))
                <!-- Heading -->
                <div class="sidebar-heading">
                    e-learning management
                </div>

                <!-- Nav Item  -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fa-solid fa-layer-group"></i>
                        <span>Categories</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            {{-- <a class="collapse-item" href="{{ route('categorie.create') }}">Ajouter Categorie</a> --}}
                            <a class="collapse-item" href="{{ route('categorie.index') }}">Table Categories</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fa-solid fa-bars"></i>
                        <span>souscategories</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            {{-- <a class="collapse-item" href="{{ route('souscategorie.create') }}">Ajouter souscategorie</a> --}}
                            <a class="collapse-item" href="{{ route('souscategorie.index') }}">Table souscategorie</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsesujets"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fa-solid fa-file"></i>
                        <span>sujets</span>
                    </a>
                    <div id="collapsesujets" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            {{-- <a class="collapse-item" href="{{ route('sujet.create') }}">Ajouter sujet</a> --}}
                            <a class="collapse-item" href="{{ route('sujet.index') }}">Table sujets</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsecours"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fa-solid fa-paste"></i>
                        <span>cours</span>
                    </a>
                    <div id="collapsecours" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('cour.index') }}">Table cours</a>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsecertificats"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fa-solid fa-certificate"></i>
                        <span>certificats</span>
                    </a>
                    <div id="collapsecertificats" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('certificate.index') }}">Table certificats</a>
                        </div>
                    </div>
                </li>
                {{--
                <!-- Heading -->
                <div class="sidebar-heading">
                    Addons
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Pages</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Login Screens:</h6>
                            <a class="collapse-item" href="login.html">Login</a>
                            <a class="collapse-item" href="register.html">Register</a>
                            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                            <div class="collapse-divider"></div>
                            <h6 class="collapse-header">Other Pages:</h6>
                            <a class="collapse-item" href="404.html">404 Page</a>
                            <a class="collapse-item" href="blank.html">Blank Page</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link" href="charts.html">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Charts</span></a>
                </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="tables.html">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Tables</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

                <!-- Sidebar Message -->
                <div class="sidebar-card d-none d-lg-flex">
                    <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                    <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components,
                        and more!</p>
                    <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to
                        Pro!</a>
                </div> --}}
            @elseif (auth()->user()->roles->contains('role_name', 'formateur'))
                <!-- Heading -->
                <div class="sidebar-heading">
                    gestion des cours
                </div>

                <!-- Nav Item  -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsecours"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fa-solid fa-paste"></i>
                        <span>cours</span>
                    </a>
                    <div id="collapsecours" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">

                            {{-- <a class="collapse-item" href="{{ route('cour.create') }}">Ajouter cour</a> --}}
                            <a class="collapse-item" href="{{ route('cour.index') }}">Table cours</a>
                            <a class="collapse-item" href="{{ route('cour.coursvalider') }}">
                                Table cours valider<i class="fa-solid fa-check ml-1"></i>
                            </a>
                            <a class="collapse-item" href="{{ route('cour.coursnonvalider') }}">
                                Table cours non valider<i class="fa-solid fa-xmark ml-1"></i>
                            </a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsesections"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fa-solid fa-list"></i>
                        <span>sections</span>
                    </a>
                    <div id="collapsesections" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">

                            {{-- <a class="collapse-item" href="{{ route('section.create') }}">Ajouter section</a> --}}
                            <a class="collapse-item" href="{{ route('section.index') }}">Table
                                sections</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsesessions"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fa-solid fa-bars"></i>
                        <span>sessions</span>
                    </a>
                    <div id="collapsesessions" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('session.index') }}">Table
                                sessions</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsevideos"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fa-solid fa-video"></i>
                        <span>videos</span>
                    </a>
                    <div id="collapsevideos" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('video.index') }}">Table
                                videos</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsemedia"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fa-regular fa-file-zipper"></i>
                        <span>media</span>
                    </a>
                    <div id="collapsemedia" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('media.index') }}">Table media</a>
                        </div>
                    </div>
                </li>
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Test
                </div>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsecert"
                        aria-expanded="true" aria-controls="collapsecert">
                        <i class="fa-solid fa-certificate"></i>
                        <span>Certificates</span>
                    </a>
                    <div id="collapsecert" class="collapse" aria-labelledby="headingTwo"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('certificate.index') }}">Table Certificates</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQuiz"
                        aria-expanded="true" aria-controls="collapseQuiz">
                        <i class="fa-solid fa-question"></i>
                        <span>Quiz</span>
                    </a>
                    <div id="collapseQuiz" class="collapse" aria-labelledby="headingTwo"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('quiz.index') }}">Table Quiz</a>
                        </div>
                    </div>
                </li>
            @elseif (auth()->user()->roles->contains('role_name', 'client'))
                <!-- Heading -->
                {{-- <div class="sidebar-heading">
                    gestion des cours
                </div> --}}

                <!-- Nav Item  -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsecours"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fa-solid fa-paste"></i>
                        <span>cours</span>
                    </a>
                    <div id="collapsecours" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">

                            <a class="collapse-item" href="{{ route('cour.index') }}">Mes cours</a>
                            {{-- <a class="collapse-item" href="{{ route('cour.coursvalider') }}">
                                Table cours valider<i class="fa-solid fa-check ml-1"></i>
                            </a>
                            <a class="collapse-item" href="{{ route('cour.coursnonvalider') }}">
                                Table cours non valider<i class="fa-solid fa-xmark ml-1"></i>
                            </a> --}}
                        </div>
                    </div>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsesections"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fa-solid fa-list"></i>
                        <span>sections</span>
                    </a>
                    <div id="collapsesections" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">

                            <a class="collapse-item" href="{{ route('section.index') }}">Table
                                sections</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsesessions"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fa-solid fa-bars"></i>
                        <span>sessions</span>
                    </a>
                    <div id="collapsesessions" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('session.index') }}">Table
                                sessions</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsevideos"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fa-solid fa-video"></i>
                        <span>videos</span>
                    </a>
                    <div id="collapsevideos" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('video.index') }}">Table
                                videos</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsemedia"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fa-regular fa-file-zipper"></i>
                        <span>media</span>
                    </a>
                    <div id="collapsemedia" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('media.index') }}">Table media</a>
                        </div>
                    </div>
                </li> --}}
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Test
                </div>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsecert"
                        aria-expanded="true" aria-controls="collapsecert">
                        <i class="fa-solid fa-certificate"></i>
                        <span>Certificates</span>
                    </a>
                    <div id="collapsecert" class="collapse" aria-labelledby="headingTwo"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('certificate.index') }}">Mes Certificates</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQuiz"
                        aria-expanded="true" aria-controls="collapseQuiz">
                        <i class="fa-solid fa-question"></i>
                        <span>Quiz</span>
                    </a>
                    <div id="collapseQuiz" class="collapse" aria-labelledby="headingTwo"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('quiz.index') }}">Mes Quiz</a>
                        </div>
                    </div>
                </li>
            @endif
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
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
                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
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
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->FirstName }}</span>
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                @if (auth()->user()->roles->contains('role_name', 'formateur'))
                                    <a class="dropdown-item" href="{{ route('index') }}">
                                        <i class="fa-solid fa-laptop"></i>
                                        Participant
                                    </a>
                                    {{-- @elseif (auth()->user()->roles->contains('role_name', 'client'))
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Settings
                                    </a> --}}
                                @endif
                                <a class="dropdown-item" href="#">
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
                    </ul>
                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('container-fluid')
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            @include('master.footer')
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
@endsection
