<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/images/logo.png') }}">
    <link href="{{ asset('storage/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="{{ asset('storage/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="{{ asset('storage/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


    <!--card style-->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <style type="text/css">
        body {
            /* margin-top: 20px; */
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
    </style>

    @yield('link')









    <style>
        .tabletd {
            white-space: nowrap;
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* #actions {
            white-space: normal;
            width: auto;
            overflow: visible;
            text-overflow: clip;
        } */
    </style>

    {{-- <style>
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
    </style> --}}
    @yield('style')
</head>

<body>
    <!-- Page Wrapper -->
    @yield('content')
    <!-- End of Page Wrapper -->

</body>
<script>
    var categories = @json($categories);
    var souscategories = @json($souscategories);
    var sujets = @json($sujets);
    var sections = @json($sections);
    var sessions = @json($sessions);
    var video = @json($video);
</script>
<!-- Bootstrap core JavaScript-->
<script src=" {{ asset('storage/vendor/jquery/jquery.min.js') }}"></script>
<script src=" {{ asset('storage/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src=" {{ asset('storage/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src=" {{ asset('storage/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('storage/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('storage/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta2/js/bootstrap.min.js"></script> --}}

<!-- Page level custom scripts -->
<script src="{{ asset('storage/js/demo/datatables-demo.js') }}"></script>
{{-- <script src="{{ asset('storage/js/app/nav.js') }}"></script> --}}
<script>
    $(document).ready(function() {
        $('#courSearchForm').on('submit', function(event) {
            event.preventDefault();
            let searchInput = $('#searchInput').val();
            if ($('#bodycontent').length === 0) {
                window.location.href = "{{ route('index') }}";
            } else {

                $.ajax({
                    type: 'GET',
                    url: $(this).attr('action'),
                    data: {
                        searchInput: searchInput
                    },
                    success: function(response) {
                        console.log(response);
                        // $('#bodycontent').html('')
                        // $('#bodycontent').empty();
                        var cours = document.createElement('div');
                        cours.classList.add('row');

                        response.forEach(function(cour) {
                            var courEle = `
                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card shadow h-100 py-2">
                                            <div class="text-center">
                                                <a href="{{ route('cour.show', '') }}/${cour.id_C}">
                                                <img class="card-img-top" style="width: 200px;"
                                                    src="{{ asset('storage/images/`+ cour . sujet . souscategorie . categorie . CatName +`.jpg') }}"
                                                    alt="Card image cap"></a>
                                            </div>
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col ms-2">
                                                        <h6 class="card-title font-weight-bold text-dark text-uppercase mb-1">
                                                            ${cour.title}</h6>
                                                        <p class="card-text">${cour.user.FirstName} ${cour.user.LastName}</p>
                                                        <div class="h5 mb-1 font-weight-bold text-gray-800">${cour.price}$</div>
                                                        <div style="display: flex; justify-content: space-between;">
                                                            <a href="#" name="panier" data-id="${cour.id_C}"
                                                                class="btn btn-primary btn-sm"
                                                                data-route="{{ route('panier.store') }}">
                                                                Ajouter au panier
                                                            </a>
                                                            <a href="#" name="wishlist" data-id="${cour.id_C}" class="btn btn-white"
                                                                data-route="{{ route('wishlist.store') }}">
                                                                <i class="fa-regular fa-heart"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                            // cours.innerHTML += courEle;
                            var tempElement = document.createElement('div');
                            tempElement.innerHTML = courEle.trim();

                            cours.appendChild(tempElement.firstChild);
                        });

                        const contentP = `
                    <div class="row main-content-wrap gutter-lg">
                        <div class="col-lg-112 main-content">
                            ${cours.outerHTML}
                        </div>
                    </div> 
                `;
                        $('#bodycontent').html(contentP)

                    },
                    error: function(error) {
                        console.error('Error occurred:', error);
                    }
                });
            }

        });
    });
</script>
@yield('script')

</html>
