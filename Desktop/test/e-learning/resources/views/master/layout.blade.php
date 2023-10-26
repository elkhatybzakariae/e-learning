<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/images/logo.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
    <style>
        body {
            background-image: url('{{ asset('storage/images/gradient_2.jpg') }}');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            background-position-x: center;
        }

        .dropdown:hover>.dropdown-menu {
            display: block;
            margin: 0px;
        }

        .dropdown>.dropdown-toggle:active {
            /*Without this, clicking will make it sticky*/
            pointer-events: none;
        }


        #catlist ul {
            display: none;
            /* Initially hide the <ul> */
            position: absolute;
            /* Position it absolutely */
            background: white;
            /* Set a background color */
            border: 1px solid #ccc;
            padding: 10px;
        }

        #catlist:hover ul {
            display: block;
            /* Show the <ul> on hover */
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <!-- Container wrapper -->
        <div class="container">
            <!-- Navbar brand -->
            <!-- LOGO -->
            <a class="navbar-brand me-2" href="{{ route('home') }}">
                <img src="{{ asset('storage/images/logo.png') }}" height="30" alt="Logo" loading="lazy"
                    style="margin-top: -1px;" />
            </a>

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse">
                <!-- Left links -->
                <ul class="navbar-nav dropdown me-auto mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <div class="dropdown nav-item dropend" id="catlistdiv">
                            <a class="nav-link  dropdown-toggle-split" href=""
                                data-mdb-toggle="dropdown dropdown-toggle" aria-expanded="false">Categories</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="catlist">
                            </ul>

                        </div>
                        @if (auth()->user()->roles->contains('role_name', 'client'))
                            <p>Welcome back ,client</p>
                        @elseif(auth()->user()->roles->contains('role_name', 'moderateur'))
                            <!-- Content for regular users -->
                            <p>Welcome, moderateur!</p>
                        @elseif(auth()->user()->roles->contains('role_name', 'formateur'))
                            <p>Welcome, formateur!</p>
                        @endif


                    @endauth
                </ul>
                <!-- Left links -->

                <div class="d-flex align-items-center ">
                    @auth
                        <div class="dropdown dropleft">
                            <a class=" d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar"
                                role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                <i class="fa-regular fa-user"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuAvatar">
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile', auth()->user()->id_U) }}">My
                                        profile</a>
                                </li>
                                {{-- @if (auth()->user()->roles->contains('role_name', 'formateur')) --}}
                                {{-- @if (auth()->user()->roles->whereIn('role_name', ['formateur', 'moderateur'])->isNotEmpty())
                                    <li>
                                        <a class="dropdown-item" href="{{ route('management') }}">e-learning management</a>
                                    </li>
                                @endif --}}
                                @if (auth()->user()->roles->contains('role_name', 'moderateur'))
                                    <li>
                                        <a class="dropdown-item" href="{{ route('management') }}">e-learning management</a>
                                    </li>
                                @endif
                                @if (auth()->user()->roles->contains('role_name', 'client'))
                                    <li>
                                        <a class="dropdown-item" href="{{ route('teach', auth()->user()->id_U) }}">teach</a>
                                    </li>
                                @elseif (auth()->user()->roles->contains('role_name', 'formateur'))
                                    <li>
                                        <a class="dropdown-item" href="{{ route('teachdashboard') }}">teach dashboard</a>
                                    </li>
                                @endif
                                <li>
                                    <a class="dropdown-item" href="#">Settings</a>
                                </li>
                                <hr>
                                <li>
                                    <form method="get" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endauth
                    @guest
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
                    @endguest
                </div>
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
    {{-- <div class="row " style="height: 100vh;"> --}}
    <div class="row " style="height: 100vh;margin-right: 0px;margin-left: 0px;">
        @if (auth()->user())
            @if (auth()->user()->roles->contains('role_name', 'formateur') ||
                    auth()->user()->roles->contains('role_name', 'moderateur'))
                <div class="col-3 ps-0 pe-0">
                    @yield('sidebar')
                </div>
                <div class=" col-9 row">
                    @yield('content')
                </div>
                {{-- @elseif(auth()->user()->roles->contains('role_name', 'client'))
                <div class=" col-12 row">
                    @yield('content')
                </div> --}}
            @endif
        @endif
        @yield('authentification')
    </div>
    <!-- Footer -->
    <footer class="bg-light text-center fixed mt-2">
        <!-- Grid container -->
        <div class="container p-4">
            <!-- Section: Text -->
            <section class="mb-4">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt
                    distinctio earum repellat quaerat voluptatibus placeat nam,
                    commodi optio pariatur est quia magnam eum harum corrupti dicta,
                    aliquam sequi voluptate quas.
                </p>
            </section>
            <!-- Section: Text -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2023 Copyright:
            <a class="text-dark" href="https://mdbootstrap.com/">E-Learning.com</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/345971220e.js" crossorigin="anonymous"></script>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>

{{-- <script>
    var catlist = document.getElementById('catlist');
    var catlistdiv = document.getElementById('catlistdiv');

    var categories = @json($categories);
    var souscategories = @json($souscategories);
    var sujets = @json($sujets);

    function categorie() {
        // categories dropdown
        categories.forEach(function(categorie) {
            const catli = document.createElement('li');
            const catdiv = document.createElement('div');
            const cata = document.createElement('a');
            cata.textContent = categorie.CatName;
            // catdiv.setAttribute('name', categorie.id_Cat);
            catdiv.name = categorie.id_Cat;
            catdiv.classList.add('dropdown');
            catdiv.classList.add('nav-item');
            catdiv.classList.add('dropright');
            cata.classList.add('dropdown-item');

            catdiv.appendChild(cata);
            catli.appendChild(catdiv);
            catlist.appendChild(catli);


            //event listener for souscategorie
            catdiv.addEventListener('mouseenter', function() {
                souscategorie(catdiv);
            });

            catdiv.addEventListener('mouseleave', function() {
                catdiv.removeEventListener('mouseenter', souscategorie);
                const ulToRemove = catdiv.querySelector('div > ul');
                if (ulToRemove) {
                    catdiv.removeChild(ulToRemove);
                }

            });
        });
    }

    function souscategorie(catdiv) {
        var souscategorieList = document.createElement('ul');
        souscategorieList.classList.add('dropdown-menu');
        const souscat = souscategories.filter(function(e) {
            return e.id_Cat == catdiv.name;
        });
        souscat.forEach(function(souscategorie) {
            const souscatLi = document.createElement('li');
            const souscatdiv = document.createElement('div');
            const souscata = document.createElement('a');
            souscata.textContent = souscategorie.SCatName;

            souscatdiv.name = souscategorie.id_SCat;
            souscatdiv.classList.add('dropdown');
            souscatdiv.classList.add('nav-item');
            souscatdiv.classList.add('dropright');
            souscata.classList.add('dropdown-item');

            souscatdiv.appendChild(souscata);
            souscatLi.appendChild(souscatdiv);
            souscategorieList.appendChild(souscatLi);

            catdiv.appendChild(souscategorieList);


            // event listener for sujet
            souscatdiv.addEventListener('mouseenter', function() {
                sujet(souscatdiv);

            });
            souscatdiv.addEventListener('mouseleave', function() {
                souscatdiv.removeEventListener('mouseenter', sujet);
                const ulToRemove = souscatdiv.querySelector('div > ul');
                if (ulToRemove) {
                    souscatdiv.removeChild(ulToRemove);
                }
            });

        });

        // souscatdiv.appendChild(souscata); 
        // souscatLi.appendChild(souscatdiv); 
        // souscategorieList.appendChild(souscatLi);

    }

    function sujet(souscatdiv) {
        var sujetList = document.createElement('ul');
        sujetList.classList.add('dropdown-menu');
        const sujet = sujets.filter(function(e) {
            return e.id_Sj == souscatdiv.name;
        })
        sujet.forEach(function(sj) {
            const sujetLi = document.createElement('li');
            const sujetdiv = document.createElement('div');
            const sujeta = document.createElement('a');
            sujeta.textContent = sj.SjName;

            sujetdiv.id = sujet.id_Sj;
            sujetdiv.classList.add('dropdown');
            sujetdiv.classList.add('nav-item');
            sujetdiv.classList.add('dropright');
            sujeta.classList.add('dropdown-item');
            sujetdiv.appendChild(sujeta);
            sujetLi.appendChild(sujetdiv);
            sujetList.appendChild(sujetLi);

            souscatdiv.appendChild(sujetList);
        });
    }

    //event listener for categorie
    catlistdiv.addEventListener('mouseenter', categorie);
    catlistdiv.addEventListener('mouseleave', function() {
        catlistdiv.removeEventListener('mouseenter', categorie);
    });
</script> --}}
<script>
    var catlist = document.getElementById('catlist');
    var catlistdiv = document.getElementById('catlistdiv');

    var categories = @json($categories);
    var souscategories = @json($souscategories);
    var sujets = @json($sujets);

    function categorie() {
        // categories dropdown
        categories.forEach(function(categorie) {
            const catli = document.createElement('li');
            const catdiv = document.createElement('div');
            const cata = document.createElement('a');
            cata.textContent = categorie.CatName;
            // catdiv.setAttribute('name', categorie.id_Cat);
            catdiv.name = categorie.id_Cat;
            catdiv.classList.add('dropdown');
            catdiv.classList.add('nav-item');
            catdiv.classList.add('dropright');
            cata.classList.add('dropdown-item');

            catdiv.appendChild(cata);
            catli.appendChild(catdiv);
            catlist.appendChild(catli);


            //event listener for souscategorie
            catdiv.addEventListener('mouseenter', function() {
                souscategorie(catdiv);
            });

            catdiv.addEventListener('mouseleave', function() {
                catdiv.removeEventListener('mouseenter', souscategorie);
                const ulToRemove = catdiv.querySelector('div > ul');
                if (ulToRemove) {
                    catdiv.removeChild(ulToRemove);
                }

            });
        });
    }

    function souscategorie(catdiv) {
        var souscategorieList = document.createElement('ul');
        souscategorieList.classList.add('dropdown-menu');
        const souscat = souscategories.filter(function(e) {
            return e.id_Cat == catdiv.name;
        });
        souscat.forEach(function(souscategorie) {
            const souscatLi = document.createElement('li');
            const souscatdiv = document.createElement('div');
            const souscata = document.createElement('a');
            souscata.textContent = souscategorie.SCatName;

            souscatdiv.name = souscategorie.id_SCat;
            souscatdiv.classList.add('dropdown');
            souscatdiv.classList.add('nav-item');
            souscatdiv.classList.add('dropright');
            souscata.classList.add('dropdown-item');

            souscatdiv.appendChild(souscata);
            souscatLi.appendChild(souscatdiv);
            souscategorieList.appendChild(souscatLi);

            catdiv.appendChild(souscategorieList);


            // event listener for sujet
            souscatdiv.addEventListener('mouseenter', function() {
                sujet(souscatdiv);

            });
            souscatdiv.addEventListener('mouseleave', function() {
                souscatdiv.removeEventListener('mouseenter', sujet);
                const ulToRemove = souscatdiv.querySelector('div > ul');
                if (ulToRemove) {
                    souscatdiv.removeChild(ulToRemove);
                }
            });

        });

        // souscatdiv.appendChild(souscata); 
        // souscatLi.appendChild(souscatdiv); 
        // souscategorieList.appendChild(souscatLi);

    }

    function sujet(souscatdiv) {
        var sujetList = document.createElement('ul');
        sujetList.classList.add('dropdown-menu');
        const sujet = sujets.filter(function(e) {
            return e.id_Sj == souscatdiv.name;
        })
        sujet.forEach(function(sj) {
            const sujetLi = document.createElement('li');
            const sujetdiv = document.createElement('div');
            const sujeta = document.createElement('a');
            sujeta.textContent = sj.SjName;

            sujetdiv.id = sujet.id_Sj;
            sujetdiv.classList.add('dropdown');
            sujetdiv.classList.add('nav-item');
            sujetdiv.classList.add('dropright');
            sujeta.classList.add('dropdown-item');
            sujetdiv.appendChild(sujeta);
            sujetLi.appendChild(sujetdiv);
            sujetList.appendChild(sujetLi);

            souscatdiv.appendChild(sujetList);
        });
    }

    //event listener for categorie
    catlistdiv.addEventListener('mouseenter', categorie);
    catlistdiv.addEventListener('mouseleave', function() {
        catlistdiv.removeEventListener('mouseenter', categorie);
    });
</script>
@yield('script')

</html>
