@extends('master.layout')

@section('title', 'index')
@section('link')
    <style>
        .title {
            text-transform: capitalize;
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
                @if (!$haveDU )
                    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="msg">
                        <strong>Compléter Ton Profile</strong>
                        {{-- <span class="badge bg-primary rounded-pill">
                            Fin dans <span id="timerCountdown">5 h 59 min 13 s</span>.
                        </span> --}}
                        <button type="button" class="btn"><a href="{{ route('profile') }}">Cliquez pour
                                Compléter</a></button>
                        <button type="button" id="msgbtn" class="btn-close" aria-label="Close"></button>
                    </div>
                @endif

                @include('master.navbar')
                <div class="container-fluid  d-flex justify-content-center align-item-center" id="bodycontent">
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
                                                <img src="{{ asset('storage/' . $cour['photo']) }}" alt="Product"
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
            $('.btn-close').on('click', function() {
                $('#msg').addClass('none');
            });
        });
    </script>
@endsection
