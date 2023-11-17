@extends('master.layout')

@section('title', 'cour')

@section('content')
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">



                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('index') }}">
                        <div class="sidebar-brand-icon">
                            <img src="{{ asset('storage/images/logo.png') }}" alt="">
                        </div>
                        <div class="sidebar-brand-text mx-2">E-Learning</div>
                    </a>
                    <form id="courSearchForm"
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" id="searchInput"
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



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{-- <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->FirstName }}</span> --}}
                                <div class="rounded-circle d-flex justify-content-center align-items-center"
                                    style="width: 40px; height: 40px; background-color: black; color: white;">
                                    {{ strtoupper(substr(auth()->user()->FirstName, 0, 1) . substr(auth()->user()->LastName, 0, 1)) }}
                                </div>

                                {{-- <img class="img-profile rounded-circle" src="img/undraw_profile.svg"> --}}
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

                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row">
                                <!-- Video Section (Left) -->
                                <div class="col-lg-8 mb-4" id="videocontent">
                                    <img class="card-img-top" style="width: 100%;"
                                        src="{{ asset('storage/images/' . $cour->sujet->souscategorie->categorie->CatName . '.jpg') }}">
                                    <h1>{{ $cour->title }}</h1>
                                </div>

                                <!-- List Section (Right) -->
                                <div class="col-lg-4 mb-4" id="courdetails">
                                    {{-- <ul>
                                         @foreach ($cour->section as $section)
                                            <li>
                                                {{ $section->Sec_Name }}
                                                <ul>
                                                    @foreach ($section->session as $session)
                                                        <li>
                                                            {{ $session->Sess_Name }}
                                                            <ul>
                                                                @foreach ($session->video as $video)
                                                                    <li>{{ $video->title }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                         @endforeach
                                    </ul> --}}
                                    {{-- <div id="accordion">
                                        @foreach ($cour->section as $section)
                                            <div class="card">
                                                <div class="card-header" id="heading{{ $section->id }}">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link" data-toggle="collapse"
                                                            data-target="#collapse{{ $section->id }}"
                                                            aria-expanded="true"
                                                            aria-controls="collapse{{ $section->id }}">
                                                            {{ $section->Sec_Name }}
                                                        </button>
                                                    </h5>
                                                </div>

                                                <div id="collapse{{ $section->id }}" class="collapse"
                                                    aria-labelledby="heading{{ $section->id }}"
                                                    data-parent="#accordion">
                                                    <div class="card-body">
                                                        <ul>
                                                            @foreach ($section->session as $session)
                                                                <li>
                                                                    <button class="btn btn-link" data-toggle="collapse"
                                                                        data-target="#session{{ $session->id }}"
                                                                        aria-expanded="true"
                                                                        aria-controls="session{{ $session->id }}">
                                                                        {{ $session->Sess_Name }}
                                                                    </button>
                                                                    <ul id="session{{ $session->id }}" class="collapse">
                                                                        @foreach ($session->video as $video)
                                                                            <li>{{ $video->title }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div> --}}

                                    <div id="accordion">
                                        @foreach ($cour->section as $section)
                                            <div class="card">
                                                <div class="card-header" id="heading{{ $section->id }}">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link" data-toggle="collapse"
                                                            data-target="#collapse{{ $section->id_Sec }}"
                                                            aria-expanded="true"
                                                            aria-controls="collapse{{ $section->id_Sec }}">
                                                            {{ $section->Sec_Name }}
                                                        </button>
                                                    </h5>
                                                </div>

                                                <div id="collapse{{ $section->id_Sec }}" class="collapse"
                                                    aria-labelledby="heading{{ $section->id_Sec }}"
                                                    data-parent="#accordion">
                                                    <div class="card-body">
                                                        <ul>
                                                            @foreach ($section->session as $session)
                                                                <li>
                                                                    <button class="btn btn-link" data-toggle="collapse"
                                                                        data-target="#session{{ $session->id_Sess }}"
                                                                        aria-expanded="true"
                                                                        aria-controls="session{{ $session->id_Sess }}">
                                                                        {{ $session->Sess_Name }}
                                                                    </button>
                                                                    <ul id="session{{ $session->id_Sess }}"
                                                                        class="collapse">
                                                                        @foreach ($session->video as $video)
                                                                            <li>
                                                                                <button class="btn btn-link"
                                                                                    name="video" data-toggle="video"
                                                                                    data-id="{{ $video->id_V }}"
                                                                                    data-lien="{{ $video->lien }}"
                                                                                    data-target="#video{{ $video->id_V }}">
                                                                                    {{ $video->title }}
                                                                                </button>
                                                                                <ul id="video{{ $video->id_V }}"
                                                                                    class="collapse">
                                                                                    @foreach ($video->media as $media)
                                                                                        <li>
                                                                                            <button class="btn btn-link"
                                                                                                data-toggle="modal"
                                                                                                data-target="#mediaModal{{ $media->id_M }}">
                                                                                                {{ $media->mediaName }}
                                                                                            </button>
                                                                                        </li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
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
    <script>
        $(document).ready(function() {
            $('[name="video"]').on('click', function(params) {
                console.log($(this).data('id'));

                $('#videocontent').html(`
    <iframe width="100%" height="315" 
    src="https://www.youtube.com/embed/${$(this).data('lien')}"
    frameborder="0" allowfullscreen></iframe>
`);

            })
        });
    </script>
@endsection
