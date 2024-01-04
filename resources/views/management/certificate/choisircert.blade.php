@extends('master.layout')

@section('title', 'choisir certificat')
@section('content')
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('master.navbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="bg-white p-5 pb-3 mt-5 rounded mb-5">
                        <ul class="navbar-nav ml-auto">
                            @foreach ($certificats as $item)
                                <li class="nav-item no-arrow mx-1">
                                    <a class="nav-link" href="{{ route('certificate.passer',$item->id_Cert) }}" role="button">
                                        <span>{{ $item->certificateName }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
