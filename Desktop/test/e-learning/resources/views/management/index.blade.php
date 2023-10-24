@extends('master.layout')

@section('title', 'management')

@section('sidebar')
    <div class="row">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark col-4" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
                <span class="fs-4">e-learning management</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('categorie.index') }}" class="nav-link active" aria-current="page">
                        <i class="fa-solid fa-layer-group"></i>
                        category
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link ">
                        <i class="fa-solid fa-bars"></i>
                        sub-category
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link ">
                        <i class="fa-solid fa-file"></i>
                        subject
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                        class="rounded-circle me-2">
                    <strong>mdo</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </div>
        <div class="col-8">
            @yield('managementcontent')
        </div>
    </div>

@endsection
