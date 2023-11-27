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

    <style>
        /* table td {
            white-space: nowrap;
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        #actions {
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
