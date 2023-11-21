@extends('master.layout')

@section('title', 'cour')
@section('style')
    <style>

    </style>

@endsection
@section('content')
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
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
                <div class="container-fluid justify-content-center align-items-center">
                    {{-- <div class="container ms-2 d-flex justify-content-center align-items-center"> --}}

                    <div class="text center bg-white p-5 pb-3  rounded">
                        <form action="" id="quiz">
                            @csrf
                            <div class="form-group row ps-5 pe-5 justify-content-center">
                                @php $counter = 1; @endphp
                                @foreach ($quiz as $quiz)
                                    @foreach ($quiz->questions as $Que)
                                        <div class="col-12">
                                            <div class="text-center mb-3">
                                                <span for="question" style="font-style: italic;">
                                                    Question {{ $counter }} : {{ $Que->question }} ?
                                                </span>
                                            </div>
                                            <div
                                                class="form-outline  mb-2 d-flex justify-content-center align-items-center flex-wrap">
                                                @foreach ($Que->reponse as $reponse)
                                                    <span class="d-inline-block text-center col-4">
                                                        <input type="radio" id="{{ $reponse->id_R }}"
                                                            name="responses{{ $Que->id_Que }}">
                                                        <label data-hidden-value="{{ $reponse->statusrep }}"
                                                            for="{{ $reponse->id_R }}"
                                                            name="responses{{ $Que->id_Que }}">
                                                            {{ $reponse->reponse }}
                                                        </label>
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>
                                        @php $counter++; @endphp
                                    @endforeach
                                @endforeach
                            </div>



                            <div class="form-group text-end mt-3">
                                <button type="submit" class="btn btn-outline-primary  gradient-custom-4 text-body"
                                    style="font-style: italic;">Valider</button>
                            </div>

                        </form>
                    </div>
                    {{-- </div> --}}
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
            $('#quiz').on('submit', function(event) {
                event.preventDefault();

                $('label').each(function() {
                    var hiddenValue = $(this).data('hidden-value');
                    
                    const iClass = hiddenValue ? $(this).css('color', 'green') : $(this).css('color', 'red');
                    const iconClass = hiddenValue ? 'fa-thin fa-check' : 'fa-thin fa-xmark';
                    $(this).removeClass().addClass('fas ' + iconClass);
                    // if (hiddenValue) {
                    //     $(this).css('color', 'green');
                    // }else {
                    //     $(this).css('color', 'red');;
                    // }
                });


                
            });
        });
    </script>
@endsection
