<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>//</title>
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
</head>

<body>
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <a class="sidebar-brand d-flex text-decoration-none align-items-center justify-content-center ms-1"
            href="{{ route('index') }}">
            <div class="sidebar-brand-text mx-2 fst-italic fw-bolder" style=" color: rgb(112, 112, 231);">E-Learning
            </div>
        </a>
    </nav>
</body>
<script src=" {{ asset('storage/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src=" {{ asset('storage/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src=" {{ asset('storage/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src=" {{ asset('storage/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src=" {{ asset('storage/vendor/jquery/jquery.min.js') }}"></script>
<script src=" {{ asset('storage/js/demo/datatables-demo.js') }}"></script>
<script src=" {{ asset('storage/js/sb-admin-2.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{-- <script>
    var categories = @json($categories);
    var contenu = '';
    categories.forEach(item => {
        contenu += `<li>
                  <div class="card"><a href="{{ route('index') }}"><span class="model-name">${item.CatName}</span><span>Model for
                  generating highly dimensional, mostly numeric, tabular data</span></a></div>
              </li>`;
    });
    $('#card-list').html(contenu);
</script> --}}

</html>
