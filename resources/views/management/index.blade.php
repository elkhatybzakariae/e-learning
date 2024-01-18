@extends('master.layout')

@section('title', 'management')

@section('sidebar')
    <div class="d-flex flex-column flex-shrink-0 p-3 me-0 text-white bg-dark" style="height: 100vh; width: 280px;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32">
                <use xlink:href="#bootstrap" />
            </svg>
            <span class="fs-4">e-learning management</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            @if (auth()->user()->roles->contains('role_name', 'moderateur'))
                <li>
                    <a href="{{ route('categorie.index') }}" class="nav-link active" aria-current="page">
                        <i class="fa-solid fa-layer-group"></i>
                        categories
                    </a>
                </li>
                <li>
                    <a href="{{ route('souscategorie.index') }}" class="nav-link" aria-current="page">
                        <i class="fa-solid fa-bars"></i>
                        souscategories
                    </a>
                </li>
                <li>
                    <a href="{{ route('sujet.index') }}" class="nav-link ">
                        <i class="fa-solid fa-file"></i>
                        sujets
                    </a>
                </li>
                {{-- valider cours --}}
                <li>
                    <a href="{{ route('cour.index') }}" class="nav-link ">
                        <i class="fa-solid fa-paste"></i>
                        cours
                    </a>
                </li>
            @elseif (auth()->user()->roles->contains('role_name', 'formateur'))
                {{-- creer cours --}}
                <li>
                    <a href="{{ route('cour.index', auth()->user()->id_U) }}" class="nav-link " id="courslien">
                        <i class="fa-solid fa-paste"></i>
                        cours
                    </a>
                    <ul class="list-unstyled  pl-5" id="submenu"{{--  style="display: none" --}}>
                        <li><a href="{{ route('cour.coursvalider', auth()->user()->id_U) }}" class="nav-link ">
                                <i class="fa-solid fa-check"></i>
                                valider
                            </a>
                        </li>
                        <li><a href="{{ route('cour.coursnonvalider', auth()->user()->id_U) }}" class="nav-link ">
                                <i class="fa-solid fa-xmark"></i>
                                non valider
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
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
@endsection
