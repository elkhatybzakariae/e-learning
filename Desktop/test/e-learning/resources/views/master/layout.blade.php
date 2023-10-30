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
     <link href="{{ asset('storage/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

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

 <!-- Page level custom scripts -->
 <script src="{{ asset('storage/js/demo/datatables-demo.js') }}"></script>

@yield('script')

</html>
