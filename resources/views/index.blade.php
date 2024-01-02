@extends('master.layout')

@section('title', 'index')
@section('link')
    {{-- <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <style type="text/css">
        body {
            margin-top: 20px;
            background-color: #f4f7f6;
        }

        .c_review {
            margin-bottom: 0
        }

        .c_review li {
            margin-bottom: 16px;
            padding-bottom: 13px;
            border-bottom: 1px solid #e8e8e8
        }

        .c_review li:last-child {
            margin: 0;
            border: none
        }

        .c_review .avatar {
            float: left;
            width: 80px
        }

        .c_review .comment-action {
            float: left;
            width: calc(100% - 80px)
        }

        .c_review .comment-action .c_name {
            margin: 0
        }

        .c_review .comment-action p {
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            max-width: 95%;
            display: block
        }

        .product_item:hover .cp_img {
            top: -40px
        }

        .product_item:hover .cp_img img {
            box-shadow: 0 19px 38px rgba(0, 0, 0, 0.3), 0 15px 12px rgba(0, 0, 0, 0.22)
        }

        .product_item:hover .cp_img .hover {
            display: block
        }

        .product_item .cp_img {
            position: absolute;
            top: 0px;
            left: 50%;
            transform: translate(-50%);
            -webkit-transform: translate(-50%);
            -ms-transform: translate(-50%);
            -moz-transform: translate(-50%);
            -o-transform: translate(-50%);
            -khtml-transform: translate(-50%);
            width: 100%;
            padding: 15px;
            transition: all 0.2s ease-in-out
        }

        .product_item .cp_img img {
            transition: all 0.2s ease-in-out;
            border-radius: 6px
        }

        .product_item .cp_img .hover {
            display: none;
            text-align: center;
            margin-top: 10px
        }

        .product_item .product_details {
            padding-top: 110%;
            text-align: center
        }

        .product_item .product_details h5 {
            margin-bottom: 5px
        }

        .product_item .product_details h5 a {
            font-size: 16px;
            color: #444
        }

        .product_item .product_details h5 a:hover {
            text-decoration: none
        }

        .product_item .product_details .product_price {
            margin: 0
        }

        .product_item .product_details .product_price li {
            display: inline-block;
            padding: 0 10px
        }

        .product_item .product_details .product_price .new_price {
            font-weight: 600;
            color: #ff4136
        }

        .product_item_list table tr td {
            vertical-align: middle
        }

        .product_item_list table tr td h5 {
            font-size: 15px;
            margin: 0
        }

        .product_item_list table tr td .btn {
            box-shadow: none !important
        }

        .product-order-list table tr th:last-child {
            width: 145px
        }

        .preview {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column
        }

        .preview .preview-pic {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
            flex-grow: 1
        }

        .preview .preview-thumbnail.nav-tabs {
            margin-top: 15px;
            font-size: 0
        }

        .preview .preview-thumbnail.nav-tabs li {
            width: 20%;
            display: inline-block
        }

        .preview .preview-thumbnail.nav-tabs li nav-link img {
            max-width: 100%;
            display: block
        }

        .preview .preview-thumbnail.nav-tabs li a {
            padding: 0;
            margin: 2px;
            border-radius: 0 !important;
            border-top: none !important;
            border-left: none !important;
            border-right: none !important
        }

        .preview .preview-thumbnail.nav-tabs li:last-of-type {
            margin-right: 0
        }

        .preview .tab-content {
            overflow: hidden
        }

        .preview .tab-content img {
            width: 100%;
            -webkit-animation-name: opacity;
            animation-name: opacity;
            -webkit-animation-duration: .3s;
            animation-duration: .3s
        }

        .details {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column
        }

        .details .rating .stars {
            display: inline-block
        }

        .details .sizes .size {
            margin-right: 10px
        }

        .details .sizes .size:first-of-type {
            margin-left: 40px
        }

        .details .colors .color {
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
            height: 2em;
            width: 2em;
            border-radius: 2px
        }

        .details .colors .color:first-of-type {
            margin-left: 20px
        }

        .details .colors .not-available {
            text-align: center;
            line-height: 2em
        }

        .details .colors .not-available:before {
            font-family: Material-Design-Iconic-Font;
            content: "\f136";
            color: #fff
        }

        @media screen and (max-width: 996px) {
            .preview {
                margin-bottom: 20px
            }
        }

        @-webkit-keyframes opacity {
            0% {
                opacity: 0;
                -webkit-transform: scale(3);
                transform: scale(3)
            }

            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1)
            }
        }

        @keyframes opacity {
            0% {
                opacity: 0;
                -webkit-transform: scale(3);
                transform: scale(3)
            }

            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1)
            }
        }

        .cart-page .cart-table tr th:last-child {
            width: 145px
        }

        .cart-table .quantity-grp {
            width: 120px
        }

        .cart-table .quantity-grp .input-group {
            margin-bottom: 0
        }

        .cart-table .quantity-grp .input-group-addon {
            padding: 0 !important;
            text-align: center;
            background-color: #1ab1e3
        }

        .cart-table .quantity-grp .input-group-addon a {
            display: block;
            padding: 8px 10px 10px;
            color: #fff
        }

        .cart-table .quantity-grp .input-group-addon a i {
            vertical-align: middle
        }

        .cart-table .quantity-grp .form-control {
            background-color: #fff
        }

        .cart-table .quantity-grp .form-control+.input-group-addon {
            background-color: #1ab1e3
        }

        .ec-checkout .wizard .content .form-group .btn-group.bootstrap-select.form-control {
            padding: 0
        }

        .ec-checkout .wizard .content .form-group .btn-group.bootstrap-select.form-control .btn-round.btn-simple {
            padding-top: 12px;
            padding-bottom: 12px
        }

        .ec-checkout .wizard .content ul.card-type {
            font-size: 0
        }

        .ec-checkout .wizard .content ul.card-type li {
            display: inline-block;
            margin-right: 10px
        }

        .card {
            background: #fff;
            margin-bottom: 30px;
            transition: .5s;
            border: 0;
            border-radius: .55rem;
            position: relative;
            width: 100%;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
        }

        .card .body {
            font-size: 14px;
            color: #424242;
            padding: 20px;
            font-weight: 400;
        }
    </style> --}}
    <style>
        .title {
            text-transform: capitalize;
            /* white-space: nowrap;
                                                max-width: 150px;
                                                overflow: hidden;
                                                text-overflow: ellipsis; */
        }
        .owl-nav {
            position: relative;
            top: -50%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .owl-prev {
            width: 50px;
            height: 50px;
            right: -15px;
            text-align: center;
            border: none;
            border-radius: 50%;
            box-shadow: 4px 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #cf8d29;
            color: #FFFBF5;
            cursor: pointer;
            outline: none;
            z-index: 1;
        }

        .owl-next {
            width: 50px;
            height: 50px;
            text-align: center;
            border: none;
            border-radius: 50%;
            box-shadow: 4px 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #FFFBF5;
            color: #FFFBF5;
            font-size: 16px;
            cursor: pointer;
            outline: none;
            z-index: 1;
        }
        
    </style>
@endsection

@section('content')
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <div class="alert alert-warning alert-dismissible fade show" role="alert" id="msg">
                    <strong>Compléter Ton Profile</strong>
                    <span class="badge bg-primary rounded-pill">
                        Fin dans <span id="timerCountdown">5 h 59 min 13 s</span>.
                    </span>
                    <button type="button" class="btn"><a href="{{route('profile')}}">Cliquez pour Compléter</a></button>
                    <button type="button" id="msgbtn" class="btn-close" aria-label="Close"></button>
                </div>
                @include('master.navbar')
                <div class="container-fluid  d-flex justify-content-center align-item-center" id="bodycontent">

                    {{-- @foreach ($coursList['coursesGroupedByCategory'] as $courses)
                        <hr class="my-4">
                        <div class="category-carousel">
                            <h5 style="color: black">{{ $courses['category'] }}</h5>
                            <div class="owl-carousel">
                                @foreach ($courses['courses'] as $cour)
                                    <div class="item">
                                        <div class="card shadow h-100 py-2">
                                            <div class="">
                                                <a href="{{ route('cour.show', $cour->id_C) }}">
                                                    <img class="card-img-top" style="width: 100%; height:150px;"
                                                        src="{{ asset('storage/' . $cour['photo']) }}">
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <h6 class="card-title font-weight-bold text-dark text-uppercase mb-1 text-truncate"
                                                            style="max-width: 225px;">
                                                            {{ $cour->title }}
                                                        </h6>
                                                        <p class="card-text">{{ $cour->user->FirstName }}
                                                            {{ $cour->user->LastName }}</p>
                                                        <div class="h5 mb-1 font-weight-bold text-gray-800">
                                                            {{ $cour->price }}$</div>
                                                        <div style="display: flex; justify-content: space-between;">
                                                            @if ($cour->panier()->where('id_C', $cour->id_C)->exists())
                                                                <a href="{{ route('panier.index') }}"
                                                                    class="btn btn-primary btn-sm">
                                                                    Acceder au panier
                                                                </a>
                                                            @else
                                                                <a href="#" name="panier"
                                                                    data-id="{{ $cour->id_C }}"
                                                                    class="btn btn-primary btn-sm"
                                                                    data-route="{{ route('panier.store') }}">
                                                                    Ajouter au panier
                                                                </a>
                                                            @endif
                                                            @if ($cour->wishlist()->where('id_C', $cour->id_C)->exists())
                                                                <a href="{{ route('wishlist.index') }}"
                                                                    class="btn btn-white">
                                                                    <i class="fa-solid fa-heart"></i>
                                                                </a>
                                                            @else
                                                                <a href="#" name="wishlist"
                                                                    data-id="{{ $cour->id_C }}" class="btn btn-white"
                                                                    data-route="{{ route('wishlist.store') }}">
                                                                    <i class="fa-regular fa-heart"></i>
                                                                </a>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach --}}

                    @isset($coursList)
                        <div class="container">
                            @foreach ($coursList['coursesGroupedByCategory'] as $courses)
                                <hr class="my-4">
                                <div class="category-carousel row">
                                    <h5 style="color: black" class="col-10">{{ $courses['category'] }}</h5>
                                    <h6 style="color: rgb(84, 22, 156)" class="col-2 text-end">
                                        <a href="{{ route('cour.catshow', $courses['category']) }}">
                                            see all
                                        </a>
                                    </h6>
                                    <div class="owl-carousel">
                                        @foreach ($courses['courses'] as $cour)
                                            <div style="
                                            margin-top: 24px;
                                            margin-bottom: 10px;"
                                                class="item card product_item">
                                                <div class="body text-center">
                                                    <div class="cp_img">
                                                        <a href="{{ route('cour.show', $cour->id_C) }}">
                                                            <img src="{{ asset('storage/' . $cour['photo']) }}" alt="Product"
                                                                class="img-fluid">
                                                        </a>
                                                        <div class="hover">
                                                            @if ($cour->panier()->where('id_C', $cour->id_C)->where('id_U', Auth::id())->exists())
                                                                <a href="{{ route('panier.index') }}"
                                                                    class="btn btn-primary btn-sm">
                                                                    <i class="zmdi zmdi-shopping-cart"></i>
                                                                </a>
                                                            @else
                                                                <a href="#" name="panier" data-id="{{ $cour->id_C }}"
                                                                    class="btn btn-primary btn-sm"
                                                                    data-route="{{ route('panier.store') }}">
                                                                    <i class="zmdi zmdi-shopping-cart"></i>
                                                                </a>
                                                            @endif
                                                            @if ($cour->wishlist()->where('id_C', $cour->id_C)->where('id_U', Auth::id())->exists())
                                                                <a href="{{ route('wishlist.index') }}" class="btn btn-white">
                                                                    <i class="fa-solid fa-heart"></i>
                                                                </a>
                                                            @else
                                                                <a href="#" name="wishlist" data-id="{{ $cour->id_C }}"
                                                                    class="btn btn-white"
                                                                    data-route="{{ route('wishlist.store') }}">
                                                                    <i class="fa-regular fa-heart"></i>
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="product_details">
                                                        <h5 class="title ">
                                                            <a class="" href="#">{{ $cour->title }}</a>
                                                        </h5>
                                                        <ul class="product_price list-unstyled">
                                                            {{-- <li class="old_price">$16.00</li> --}}
                                                            <li class="new_price">
                                                                @if ($cour->price === 0.0)
                                                                    Free
                                                                @else
                                                                    ${{ $cour->price }}
                                                                @endif
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endisset
                    @isset($cours)
                        <div class="container row d-flex justify-content-center align-item-center">
                            @foreach ($cours as $cour)
                                <div class=" card product_item col-lg-3 ms-4 me-4">
                                    <div class="body">
                                        <div class="cp_img ">
                                            <a class="d-flex justify-content-center align-items-center"
                                                href="{{ route('cour.show', $cour->id_C) }}">
                                                <img 
                                                    src="{{ asset('storage/' . $cour['photo']) }}" alt="Product"
                                                    class="img-fluid" class="img-fluid">
                                            </a>
                                            <div class="hover">
                                                @if ($cour->panier()->where('id_C', $cour->id_C)->exists())
                                                    <a href="{{ route('panier.index') }}" class="btn btn-primary btn-sm">

                                                        <i class="zmdi zmdi-shopping-cart"></i>
                                                    </a>
                                                @else
                                                    <a href="#" name="panier" data-id="{{ $cour->id_C }}"
                                                        class="btn btn-primary btn-sm"
                                                        data-route="{{ route('panier.store') }}">
                                                        <i class="zmdi zmdi-shopping-cart"></i>
                                                    </a>
                                                @endif
                                                @if ($cour->wishlist()->where('id_C', $cour->id_C)->exists())
                                                    <a href="{{ route('wishlist.index') }}" class="btn btn-white">
                                                        <i class="fa-solid fa-heart"></i>
                                                    </a>
                                                @else
                                                    <a href="#" name="wishlist" data-id="{{ $cour->id_C }}"
                                                        class="btn btn-white" data-route="{{ route('wishlist.store') }}">
                                                        <i class="fa-regular fa-heart"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product_details">
                                            <h5><a href="#">{{ $cour->title }}</a>
                                            </h5>
                                            <ul class="product_price list-unstyled">
                                                <li class="new_price">
                                                    @if ($cour->price === 0.0)
                                                        Free
                                                    @else
                                                        ${{ $cour->price }}
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class='d-flex justify-content-end align-items-end'>
                            {{ $cours->links('pagination::bootstrap-4') }}
                        </div>
                    @endisset
                </div>

            </div>
            <!-- Footer -->
            @include('master.footer')
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {   
            $('#msgbtn').on('click', function() {
                $('#msg').hide();
            });         
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 3,
                        nav: true
                    },
                    1000: {
                        items: 5,
                        nav: true,
                        loop: true
                    }
                }
            });
            $('a[name="panier"]').on('click', function(event) {
                event.preventDefault();
                var $panierLink = $(this);
                var id = $(this).data('id');
                var url = $(this).data('route');
                $.ajax({
                    method: 'POST',
                    url: url,
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        console.log(data);
                        $panierLink.html('<i class="fa-solid fa-cart-shopping"></i>');
                        $panierLink.attr('href', '{{ route('panier.index') }}');
                        $panierLink.off('click');

                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
            $('a[name="wishlist"]').on('click', function(event) {
                event.preventDefault();
                var $wishlistLink = $(this);
                var id = $(this).data('id');
                var url = $(this).data('route');
                $.ajax({
                    method: 'POST',
                    url: url,
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $wishlistLink.html('<i class="fa-solid fa-heart"></i>');
                        $wishlistLink.attr('href', '{{ route('wishlist.index') }}');
                        $wishlistLink.off('click');

                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
            $('.btn-close').on('click',function() {
                $('#msg').addClass('none');
            });
        });
    </script>

    {{-- <script>
        var result = document.getElementById('result')
        var categorieselect = document.getElementById('categorie')
        var souscategorieselect = document.getElementById('souscategorie')
        var sujetselect = document.getElementById('sujet')
        var responseData;
        $(document).ready(function() {
            $('a[name="panier"]').on('click', function(event) {
                event.preventDefault();
                var $panierLink = $(this);
                var id = $(this).data('id');
                var url = $(this).data('route');
                $.ajax({
                    method: 'POST',
                    url: url,
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $panierLink.text('Acceder au panier');
                        $panierLink.attr('href', '{{ route('panier.index') }}');
                        $panierLink.off('click');

                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
            $('a[name="wishlist"]').on('click', function(event) {
                event.preventDefault();
                var $wishlistLink = $(this);
                var id = $(this).data('id');
                var url = $(this).data('route');
                $.ajax({
                    method: 'POST',
                    url: url,
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $wishlistLink.html('<i class="fa-solid fa-heart"></i>');
                        $wishlistLink.attr('href', '{{ route('wishlist.index') }}');
                        $wishlistLink.off('click');

                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
            $('#categorie').one('click', function(e) {
                categories.forEach(categorie => {
                    const catoption = document.createElement('option');
                    const cata = document.createElement('a');
                    cata.textContent = categorie.CatName;
                    catoption.name = categorie.id_Cat;
                    // catoption.id = categorie.id_Cat;
                    cata.id = categorie.id_Cat;
                    // cata.classList.add('dropdown-item');
                    catoption.appendChild(cata);
                    categorieselect.appendChild(catoption);
                    // console.log(categorieselect);
                    // $('#souscategorie').one('click', function(e) {
                    // if ($(this).children('option:selected')) {
                    //     var souscat = souscategories.filter(e => e.id_C === $(this).children(
                    //         'option:selected').attr('name'))
                    // }
                    // // souscategories.forEach(souscategorie => {
                    // //     if (souscategorie.id_C === $(this).children('option:selected').attr(
                    // //             'name')) {
                    // //         console.log("gut");
                    // //     }
                    // // });
                    // console.log(souscat);
                    // const souscatoption = document.createElement('option');
                    // const souscata = document.createElement('a');
                    // souscata.textContent = souscategorie.SCatName;
                    // souscatoption.name = souscategorie.id_SCat;
                    // // souscatoption.id = souscategorie.id_SCat;
                    // souscata.id = souscategorie.id_SCat;
                    // // souscata.classList.add('dropdown-item');
                    // souscatoption.appendChild(souscata);
                    // souscategorieselect.appendChild(souscatoption);
                    // // console.log(categorieselect);
                    // });
                    // })
                });
            })
            // $('#souscategorie').one('click', function(e) {
            //     souscategories.forEach(souscategorie => {
            //         // if (souscategorie.id_C === $('#categorie').children('option:selected').attr('name');) {
            //         //     console.log("gut");
            //         // }
            //         const souscatoption = document.createElement('option');
            //         const souscata = document.createElement('a');
            //         souscata.textContent = souscategorie.SCatName;
            //         souscatoption.name = souscategorie.id_SCat;
            //         // souscatoption.id = souscategorie.id_SCat;
            //         souscata.id = souscategorie.id_SCat;
            //         // souscata.classList.add('dropdown-item');
            //         souscatoption.appendChild(souscata);
            //         souscategorieselect.appendChild(souscatoption);
            //         // console.log(categorieselect);
            //     });
            // })
            $('#categorie').on('change', function(e) {
                $('#souscategorie').html('<option selected>Filtrer par SousCategorie</option>')
                var vl = $('#categorie').children(':selected').prop('name')
                var souscat = souscategories.filter(e => e.id_Cat === vl)
                souscat.forEach(ele => {
                    const scatoption = document.createElement('option');
                    const cata = document.createElement('a');
                    cata.textContent = ele.SCatName;
                    scatoption.name = ele.id_SCat;
                    // scatoption.id = categorie.id_Cat;
                    cata.id = ele.id_SCat;
                    scatoption.appendChild(cata);
                    souscategorieselect.appendChild(scatoption);


                    // const Parentdiv= document.createElement('div')
                    // Parentdiv.classList.add("col-xl-3 col-md-6 mb-4");
                    // const cardtdiv= document.createElement('div')
                    // cardtdiv.classList.add("card shadow h-100 py-2");
                    // const imgdiv= document.createElement('div')
                    // imgdiv.classList.add("text-center");
                    // const img= document.createElement('img')
                    // img.classList.add("card-img-top");
                    // img.src = "{{ asset('storage/images/logo.png') }}";
                    // img.alt = "Card image cap";
                    // img.style = "width: 200px;";
                    // const bodydiv= document.createElement('div')
                    // bodydiv.classList.add("card-body");
                    // const rowdiv= document.createElement('div')
                    // rowdiv.classList.add("row no-gutters align-items-center");
                    // const rowchilddiv= document.createElement('div')
                    // rowchilddiv.classList.add("col mr-2");
                    // const h6= document.createElement('h6')
                    // h6.classList.add("card-title font-weight-bold text-dark text-uppercase mb-1");
                    // h6.textContent = ele.SCatName;
                    // const p= document.createElement('p')
                    // p.classList.add("card-text");
                    // p.textContent = ele.SCatName;
                    // <div class="">
                    //     <div class="text-center">
                    //         <img class="card-img-top" =""
                    //             src="" alt="">
                    //     </div>
                    //     <div class="">
                    //         <div class="row no-gutters align-items-center">
                    //             <div class="col mr-2">
                    //                 <h6 class="card-title font-weight-bold text-dark text-uppercase mb-1">
                    //                     {{ $cour->title }}
                    //                 </h6>
                    //                     <p class="card-text">{{ $cour->user->FirstName }}
                    //                         {{ $cour->user->LastName }}
                    //                         </p>
                    //                     <div class="h5 mb-1 font-weight-bold text-gray-800">
                    //                         {{ $cour->price }}$</div>
                    //                     <a href="#" name="panier" data-id="{{ $cour->id_C }}"
                    //                         class="btn btn-primary"
                    //                         data-route="{{ route('panier.store') }}">Ajouter
                    //                         au panier</a>
                    //                     <a href="#" name="wishlist" data-id="{{ $cour->id_C }}"
                    //                         class="btn btn-white"
                    //                         data-route="{{ route('wishlist.store') }}"><i
                    //                             class="fa-regular fa-heart"></i></a>
                    //             </div>
                    //         </div>
                    //     </div>
                    // </div>
                });
                // console.log(souscat);

                const name = $(this).children(':selected').val();
                const url = "{{ route('cour.filterparcat', ':name') }}".replace(':name', name);
                console.log(url);
                $.ajax({
                    method: 'GET',
                    url: url,
                    data: {
                        name: name,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        responseData = data;
                        $('#result').html('');
                        if (data.length === 0) {
                            $('#result').html(`<div class="col-xl-12 text-center col-md-12 mb-4 mt-5">
                                    <div class="card shadow text-center h-100 py-2">
                                        <div class="card-body text-center">
                                            <div class="row text-center no-gutters align-items-center">
                                                <div class="col text-center mr-2">
                                                    <h5 class="card-title text-center font-weight-bold text-dark text-uppercase mb-1">
                                                      nothing found
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`);
                        } else {
                            $.each(data, function(index, cour) {
                                var Item = `<div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card shadow h-100 py-2">
                                        <div class="text-center">
                                            <img class="card-img-top" style="width: 200px;"
                                                src="{{ asset('storage/images/logo.png') }}" alt="Card image cap">
                                        </div>
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <h6 class="card-title font-weight-bold text-dark text-uppercase mb-1">
                                                        ` + cour.title + `</h5>
                                                        <p class="card-text"> ` + cour.user.FirstName + `
                                                            ` + cour.user.LastName + `</p>
                                                        <div class="h5 mb-1 font-weight-bold text-gray-800">
                                                            ` + cour.price + `$</div>
                                                            <div style="display: flex; justify-content: space-between;">
                                                        <a href="#" name="panier" data-id="` + cour.id_C + `"
                                                            
                                                        class="btn btn-primary btn-sm"
                                                            data-route="{{ route('panier.store') }}">Ajouter
                                                            au panier</a>
                                                        <a href="#" name="wishlist" data-id="` + cour.id_C + `"
                                                            class="btn btn-white"
                                                            data-route="{{ route('wishlist.store') }}"><i
                                                                class="fa-regular fa-heart"></i></a>   
                                                                </div>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                                $('#result').append(Item);
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            })
            $('#souscategorie').on('change', function(e) {
                $('#sujet').html('<option selected>Filtrer par Sujet</option>')
                var vl = $('#souscategorie').children(':selected').prop('name')
                var sjlist = sujets.filter(e => e.id_SCat === vl)
                sjlist.forEach(ele => {
                    const sjoption = document.createElement('option');
                    const sja = document.createElement('a');
                    sja.textContent = ele.SjName;
                    sjoption.name = ele.id_Sj;
                    // sjoption.id = categorie.id_Sj;
                    const id = ele.id_Sj;
                    sja.id = ele.id_Sj;
                    sjoption.appendChild(sja);
                    sujetselect.appendChild(sjoption);
                });

                const name = $(this).children(':selected').val();
                const url = "{{ route('cour.filterparsouscat', ':name') }}".replace(':name', name);
                $.ajax({
                    method: 'GET',
                    url: url,
                    data: {
                        name: name,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        responseData = data;
                        $('#result').html('');
                        if (data.length === 0) {
                            $('#result').html(`<div class="col-xl-12 text-center col-md-12 mb-4 mt-5">
                                    <div class="card shadow text-center h-100 py-2">
                                        <div class="card-body text-center">
                                            <div class="row text-center no-gutters align-items-center">
                                                <div class="col text-center mr-2">
                                                    <h5 class="card-title text-center font-weight-bold text-dark text-uppercase mb-1">
                                                      nothing found
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`);
                        } else {
                            $.each(data, function(index, cour) {
                                var Item = `<div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card shadow h-100 py-2">
                                        <div class="text-center">
                                            <img class="card-img-top" style="width: 200px;"
                                                src="{{ asset('storage/images/logo.png') }}" alt="Card image cap">
                                        </div>
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <h6 class="card-title font-weight-bold text-dark text-uppercase mb-1">
                                                        ` + cour.title + `</h5>
                                                        <p class="card-text"> ` + cour.user.FirstName + `
                                                            ` + cour.user.LastName + `</p>
                                                        <div class="h5 mb-1 font-weight-bold text-gray-800">
                                                            ` + cour.price + `$</div>
                                                            
                                                        <div style="display: flex; justify-content: space-between;">
                                                        <a href="#" name="panier" data-id="` + cour.id_C + `"
                                                            
                                                        class="btn btn-primary btn-sm"
                                                            data-route="{{ route('panier.store') }}">Ajouter
                                                            au panier</a>
                                                        <a href="#" name="wishlist" data-id="` + cour.id_C + `"
                                                            class="btn btn-white"
                                                            data-route="{{ route('wishlist.store') }}"><i
                                                                class="fa-regular fa-heart"></i></a>   
                                                                </div>                         
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                                $('#result').append(Item);
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            })

            $('#sujet').on('change', function(e) {
                // console.log($('#sujet').children(':selected').prop('name'));
                var $panierLink = $(this);
                // var id = $(this).children(':selected').prop('name');
                var name = $(this).children(':selected').val();
                // var url = $(this).data('route');
                var url = "{{ route('cour.filterparsj', ':name') }}".replace(':name', name);
                $.ajax({
                    method: 'GET',
                    url: url,
                    // headers: {
                    //     'Authorization': '{{ csrf_token() }}'
                    // },
                    data: {
                        name: name,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        responseData = data;
                        $('#result').html('');
                        if (data.length === 0) {
                            $('#result').html(`<div class="col-xl-12 text-center col-md-12 mb-4 mt-5">
                                    <div class="card shadow text-center h-100 py-2">
                                        <div class="card-body text-center">
                                            <div class="row text-center no-gutters align-items-center">
                                                <div class="col text-center mr-2">
                                                    <h5 class="card-title text-center font-weight-bold text-dark text-uppercase mb-1">
                                                      nothing found
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`);
                        } else {
                            $.each(data, function(index, cour) {
                                var Item = `<div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card shadow h-100 py-2">
                                        <div class="text-center">
                                            <img class="card-img-top" style="width: 200px;"
                                                src="{{ asset('storage/images/logo.png') }}" alt="Card image cap">
                                        </div>
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <h6 class="card-title font-weight-bold text-dark text-uppercase mb-1">
                                                        ` + cour.title + `</h5>
                                                        <p class="card-text"> ` + cour.user.FirstName + `
                                                            ` + cour.user.LastName + `</p>
                                                        <div class="h5 mb-1 font-weight-bold text-gray-800">
                                                            ` + cour.price + `$</div>
                                                            <div style="display: flex; justify-content: space-between;">
                                                        <a href="#" name="panier" data-id="` + cour.id_C + `"
                                                            
                                                        class="btn btn-primary btn-sm"
                                                            data-route="{{ route('panier.store') }}">Ajouter
                                                            au panier</a>
                                                        <a href="#" name="wishlist" data-id="` + cour.id_C + `"
                                                            class="btn btn-white"
                                                            data-route="{{ route('wishlist.store') }}"><i
                                                                class="fa-regular fa-heart"></i></a>   
                                                                </div>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                                $('#result').append(Item);
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            })

            $('#min').on('input', function(e) {
                const min = $(this).val();
                const max = $('#max').val();
                filter(min, max);
            })
            $('#max').on('input', function(e) {
                const min = $('#min').val();
                const max = $(this).val();
                filter(min, max);
            })

            function filter(min, max) {
                if (min === null || min == undefined || min == '') {
                    min = 0;
                }
                if (max === null || max == undefined || max == '') {
                    max = 10000;
                }
                const filteredCourses = responseData.filter(function(cour) {
                    const courPrice = parseFloat(cour.price);
                    return courPrice >= parseFloat(min) && courPrice <= parseFloat(max);
                });
                $('#result').html('');
                if (filteredCourses.length === 0) {
                    $('#result').html(`<div class="col-xl-12 text-center col-md-12 mb-4 mt-5">
                                    <div class="card shadow text-center h-100 py-2">
                                        <div class="card-body text-center">
                                            <div class="row text-center no-gutters align-items-center">
                                                <div class="col text-center mr-2">
                                                    <h5 class="card-title text-center font-weight-bold text-dark text-uppercase mb-1">
                                                      nothing found
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`);
                } else {
                    $.each(filteredCourses, function(index, cour) {
                        var Item = `<div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card shadow h-100 py-2">
                                        <div class="text-center">
                                            <img class="card-img-top" style="width: 200px;"
                                                src="{{ asset('storage/images/logo.png') }}" alt="Card image cap">
                                        </div>
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <h6 class="card-title font-weight-bold text-dark text-uppercase mb-1">
                                                        ` + cour.title + `</h5>
                                                        <p class="card-text"> ` + cour.user.FirstName + `
                                                            ` + cour.user.LastName + `</p>
                                                        <div class="h5 mb-1 font-weight-bold text-gray-800">
                                                            ` + cour.price + `$</div>
                                                            <div style="display: flex; justify-content: space-between;">
                                                        <a href="#" name="panier" data-id="` + cour.id_C + `"
                                                            
                                                        class="btn btn-primary btn-sm"
                                                            data-route="{{ route('panier.store') }}">Ajouter
                                                            au panier</a>
                                                        <a href="#" name="wishlist" data-id="` + cour.id_C + `"
                                                            class="btn btn-white"
                                                            data-route="{{ route('wishlist.store') }}"><i
                                                                class="fa-regular fa-heart"></i></a>   
                                                                </div>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                        $('#result').append(Item);
                    });
                }
            }

            $('#priceFilter').on('show.bs.collapse hide.bs.collapse', function() {
                $('#priceToggle i').toggleClass('fa-plus fa-minus');
            });

            $("#courSearchForm").on("submit", function(e) {
                e.preventDefault();
                var searchQuery = $("#searchInput").val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('cour.search') }}",
                    data: {
                        query: searchQuery,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        responseData = data;
                        $('#result').html('');
                        if (data.length === 0) {
                            $('#result').html(`<div class="col-xl-12 text-center col-md-12 mb-4 mt-5">
                                    <div class="card shadow text-center h-100 py-2">
                                        <div class="card-body text-center">
                                            <div class="row text-center no-gutters align-items-center">
                                                <div class="col text-center mr-2">
                                                    <h5 class="card-title text-center font-weight-bold text-dark text-uppercase mb-1">
                                                      nothing found
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`);
                        } else {
                            $.each(data, function(index, cour) {
                                var Item = `<div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card shadow h-100 py-2">
                                        <div class="text-center">
                                            <img class="card-img-top" style="width: 200px;"
                                                src="{{ asset('storage/images/logo.png') }}" alt="Card image cap">
                                        </div>
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <h6 class="card-title font-weight-bold text-dark text-uppercase mb-1">
                                                        ` + cour.title + `</h5>
                                                        <p class="card-text"> ` + cour.user.FirstName + `
                                                            ` + cour.user.LastName + `</p>
                                                        <div class="h5 mb-1 font-weight-bold text-gray-800">
                                                            ` + cour.price + `$</div>
                                                            <div style="display: flex; justify-content: space-between;">
                                                        <a href="#" name="panier" data-id="` + cour.id_C + `"
                                                            
                                                        class="btn btn-primary btn-sm"
                                                            data-route="{{ route('panier.store') }}">Ajouter
                                                            au panier</a>
                                                        <a href="#" name="wishlist" data-id="` + cour.id_C + `"
                                                            class="btn btn-white"
                                                            data-route="{{ route('wishlist.store') }}"><i
                                                                class="fa-regular fa-heart"></i></a>   
                                                                </div>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                                $('#result').append(Item);
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script> --}}
@endsection
