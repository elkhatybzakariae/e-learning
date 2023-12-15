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
    </style>
@endsection
@section('content')
    <div id="">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->

            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="height: 75px;">
                    <a class="sidebar-brand d-flex align-items-center justify-content-center mr-3" href="{{ route('home') }}">
                        <div class="sidebar-brand-icon">
                            <img src="{{ asset('storage/images/logo.png') }}" alt="">
                        </div>
                        <div class="sidebar-brand-text mx-2">E-Learning</div>
                    </a>
                    <div class="dropdown row ddiv">
                        <ul class="list-unstyled">
                            <li class="nav-item dropdown mt-3"id="catlistdiv">
                                <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" id="cat">
                                    Categories
                                </a>


                                {{-- <div class="dropdown-menu col-6 shadow animated--grow-in" aria-labelledby="catlistDropdown"
                                    id="catlist">
                                </div> --}}
                                <div class="mega-menu" id="catlist">
                                    {{-- <div class="mega-menu-column"> --}}
                                    {{-- <h3>Category 1</h3>
                                        <ul>
                                            <li><a href="#">Product 1</a></li>
                                            <li><a href="#">Product 2</a></li>
                                            <!-- Add more product links -->
                                        </ul> --}}

                                    {{-- </div> --}}
                                    <!-- Add more mega menu columns -->
                                </div>
                                {{-- <div class="dropdown-menu col-6 shadow animated--grow-in" aria-labelledby="scatlistDropdown"
                                id="scatlist">
                                <h6 id="scatlistDropdown">Subcategories</h6>
                            </div> --}}

                            </li>
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
                        </li> --}}
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
                          @endguest --}}
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
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    {{-- <div class="bg-image d-flex justify-content-center align-items-center"
                        style="
                    background-image:  url('{{ asset('storage/images/background.jpg') }}');
                    height: 100vh;
                  ">
                        <h1 class="text-white">Page title</h1>
                    </div> --}}
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            {{-- <div class="carousel-item active">
                                <img src="https://img-b.udemycdn.com/notices/web_carousel_slide/image/4eab1b33-68a6-4419-ab03-14a255b62f42.jpg"
                                    class="d-block w-100" alt="...">
                                    {{-- <div class="carousel-caption d-none d-md-block" style="color: black">
                                        <h1 class="ud-heading-serif-xxl" data-purpose="safely-set-inner-html:billboard:title"
                                            data-testid="safely-set-inner-html:billboard:title">Des compétences pour votre
                                            avenir</h1>
                                        <p class="ud-text-md" data-purpose="safely-set-inner-html:billboard:subtitle"
                                            data-testid="safely-set-inner-html:billboard:subtitle">
                                            Développez votre potentiel avec un cours à partir de 11,99&nbsp;$US seulement. La
                                            promotion se termine aujourd'hui.
                                        </p>
                                    </div> 
                                    <div class="bg-dark bg-opacity-50 text-light d-flex justify-content-center align-items-center vh-100">
                                        <div class="text-center">
                                            <h4 class="text-light">Custom heading</h4>
                                            <p class="text-light mb-0">paragraph</p>
                                        </div>
                                    </div>
                                    
                            </div> --}}
                            <div class="carousel-item active position-relative" style="color: black">
                                <img src="https://img-b.udemycdn.com/notices/web_carousel_slide/image/4eab1b33-68a6-4419-ab03-14a255b62f42.jpg"
                                    class="d-block w-100" alt="...">
                                <div class="position-absolute  p-4" style="left:10%; top: 20%; width:35%; background-color:#fff;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
                                    <h1 style="font-style: italic;">Des compétences pour votre
                                        avenir.</h1>
                                    <p>
                                        Développez votre potentiel avec un cours à partir de 11,99&nbsp;$US seulement. La
                                        promotion se termine aujourd'hui.
                                    </p>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <img src="https://img-b.udemycdn.com/notices/web_carousel_slide/image/4eab1b33-68a6-4419-ab03-14a255b62f42.jpg"
                                    class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block" style="color: black">
                                    <h1 class="ud-heading-serif-xxl" data-purpose="safely-set-inner-html:billboard:title"
                                        data-testid="safely-set-inner-html:billboard:title">Des compétences pour votre
                                        avenir</h1>
                                    <p class="ud-text-md" data-purpose="safely-set-inner-html:billboard:subtitle"
                                        data-testid="safely-set-inner-html:billboard:subtitle">
                                        Développez votre potentiel avec un cours à partir de 11,99&nbsp;$US seulement. La
                                        promotion se termine aujourd'hui.
                                    </p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="https://img-b.udemycdn.com/notices/web_carousel_slide/image/4eab1b33-68a6-4419-ab03-14a255b62f42.jpg"
                                    class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block" style="color: black">
                                    <h1 class="ud-heading-serif-xxl" data-purpose="safely-set-inner-html:billboard:title"
                                        data-testid="safely-set-inner-html:billboard:title">Des compétences pour votre
                                        avenir</h1>
                                    <p class="ud-text-md" data-purpose="safely-set-inner-html:billboard:subtitle"
                                        data-testid="safely-set-inner-html:billboard:subtitle">
                                        Développez votre potentiel avec un cours à partir de 11,99&nbsp;$US seulement. La
                                        promotion se termine aujourd'hui.
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
@section('script')
    <script>
        $(document).ready(function() {
            var cat = document.getElementById('cat');
            var catlistdiv = document.getElementById('catlistdiv');
            var catlist = document.getElementById('catlist');
            var scatlist = document.getElementById('scatlist');

            function categorie() {
                categories.forEach(categorie => {
                    const catli = document.createElement('li');
                    const cata = document.createElement('a');
                    cata.textContent = categorie.CatName;
                    catli.name = categorie.id_Cat;
                    cata.id = categorie.id_Cat;
                    cata.classList.add('dropdown-item');
                    catli.appendChild(cata);
                    catlist.appendChild(catli);

                    cata.addEventListener('mouseenter', function() {
                        souscategorie(cata);
                        // scatlist.classList.toggle('show');
                    });
                    // cata.removeEventListener('mouseleave', souscategorie);

                    cata.addEventListener('mouseleave', function() {
                        cata.removeEventListener('mouseenter', souscategorie);
                        const ulToRemove = cata.querySelectorAll('li');
                        //     // const ulToRemove = cata.querySelector(`[name='${catli.name}']`);
                        //     // const ulToRemove = cata.querySelectorAll('li');
                        // console.log(ulToRemove);
                        // if (ulToRemove) {
                        //     cata.removeChild(ulToRemove);
                        // }
                        ulToRemove.forEach(li => {
                            cata.removeChild(li);
                        });
                    });
                });
            }
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

            function souscategorie(cata) {
                var scatlist = document.createElement('ul');
                scatlist.classList.add('dropdown-menu');

                const souscat = souscategories.filter(function(e) {
                    return e.id_Cat === cata.id;
                });
                console.log(souscat);
                souscat.forEach(function(souscategorie) {
                    const souscatLi = document.createElement('li');
                    const souscata = document.createElement('a');
                    souscata.textContent = souscategorie.SCatName;
                    souscatLi.name = souscategorie.id_SCat;
                    souscata.classList.add('dropdown-item');

                    souscatLi.appendChild(souscata);
                    // cata.appendChild(souscatLi);
                    scatlist.appendChild(souscatLi);
                    cata.appendChild(scatlist);
                    // console.log(scatlist);
                    // catdiv.appendChild(scatlist);


                    // event listener for sujet
                    // souscatdiv.addEventListener('mouseenter', function() {
                    //     sujet(souscatdiv);

                    // });
                    // souscatdiv.addEventListener('mouseleave', function() {
                    //     souscatdiv.removeEventListener('mouseenter', sujet);
                    //     const ulToRemove = souscatdiv.querySelector('div > ul');
                    //     if (ulToRemove) {
                    //         souscatdiv.removeChild(ulToRemove);
                    //     }
                    // });

                });

                // souscatdiv.appendChild(souscata); 
                // souscatLi.appendChild(souscatdiv); 
                // scatlist.appendChild(souscatLi);

            }

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

            cat.addEventListener('mouseenter', categorie);
            cat.addEventListener('mouseleave', function() {
                cat.removeEventListener('mouseenter', categorie);
            });
        });
    </script>
@endsection
