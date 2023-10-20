<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-image: url('{{ asset('storage/images/gradient_2.jpg') }}');

            background-repeat: no-repeat;

            background-attachment: fixed;
            background-size: 100% 100%;
            background-position-x: center;
        }
    </style>

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <!-- Container wrapper -->
        <div class="container">
            <!-- Navbar brand -->
            <a class="navbar-brand me-2" href="#">
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
            <div class="collapse navbar-collapse" id="navbarButtonsExample">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="#">Dashboard</a>
                        </li>
                    @endauth
                </ul>
                <!-- Left links -->

                <div class="d-flex align-items-center">
                    @auth
                        <ul class="navbar-nav">
                          <!-- Avatar -->
                          <li class="nav-item dropdown">
                            <a
                              class="nav-link dropdown-toggle d-flex align-items-center"
                              href="#"
                              id="navbarDropdownMenuLink"
                              role="button"
                              data-mdb-toggle="dropdown"
                              aria-expanded="false"
                            >
                              <img
                                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (31).webp"
                                class="rounded-circle"
                                height="22"
                                alt="Portrait of a Woman"
                                loading="lazy"
                              />
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                              <li>
                                <a class="dropdown-item" href="#">My profile</a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="#">Settings</a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="#">Logout</a>
                              </li>
                            </ul>
                          </li>
                        </ul>
                        <form method="get" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    @endauth
                    @guest

                        <button type="button" class="btn btn-link px-3 me-2">
                            Login
                        </button>
                        <button type="button" class="btn btn-primary me-3">
                            Sign up for free
                        </button>
                        <a class="btn btn-primary px-3" href="#" role="button">

                            <i class="fa-brands fa-google"></i></a>
                    @endguest
                </div>
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
    @yield('content')

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/345971220e.js" crossorigin="anonymous"></script>

</html>
