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
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <div class="container-fluid">
                                <div class="mx-auto d-flex justify-content-center" id="navbarNav">
                                    <ul class="navbar-nav" style="margin-right: 15px;">
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="#" onclick="showDiv1()">Certificates</a>
                                        </li>
                                        <li class="nav-item" style="margin-left: 15px;">
                                            <a class="nav-link" href="#" onclick="showDiv2()">Mes Certificates</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        
                        <div id="div1" style="display:none;">
                            {{-- <h2>Div 1</h2> --}}
                            <ul class="navbar-nav ml-auto">
                                @foreach ($certificats as $item)
                                    <li class="nav-item no-arrow mx-1">
                                        <a class="nav-link" href="{{ route('certificate.passer', $item->id_Cert) }}"
                                            role="button">
                                            <span>{{ $item->certificateName }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div id="div2" style="display:none;">
                            {{-- <h2>Div 2</h2> --}}
                            <p>This is the content of Div 2.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function showDiv1() {
            document.getElementById("div1").style.display = "block";
            document.getElementById("div2").style.display = "none";
        }

        function showDiv2() {
            document.getElementById("div1").style.display = "none";
            document.getElementById("div2").style.display = "block";
        }
    </script>
@endsection
