@extends('master.layout')

@section('title', 'panier')

@section('link')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@endsection
@section('style')
    <style>
        .title {
            text-transform: capitalize;
        }

        .payment-info {
            background: rgba(221, 220, 220, 0.598);
            padding: 10px;
            border-radius: 6px;
            color: #fff;
            font-weight: bold;
        }

        .product-details {
            padding: 10px;
        }

        /* body {
                                    background: #eee;
                                } */

        .cart {
            background: #fff;
        }

        .p-about {
            font-size: 12px;
        }

        .table-shadow {
            -webkit-box-shadow: 5px 5px 15px -2px rgba(0, 0, 0, 0.42);
            box-shadow: 5px 5px 15px -2px rgba(0, 0, 0, 0.42);
        }

        .type {
            font-weight: 400;
            font-size: 10px;
        }

        label.radio {
            cursor: pointer;
        }

        label.radio input {
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            pointer-events: none;
        }

        label.radio span {
            padding: 1px 12px;
            border: 2px solid #ada9a9;
            display: inline-block;
            color: #8f37aa;
            border-radius: 3px;
            text-transform: uppercase;
            font-size: 11px;
            font-weight: 300;
        }

        label.radio input:checked+span {
            border-color: #fff;
            background-color: blue;
            color: #fff;
        }

        .credit-inputs {
            background: rgb(238, 238, 241);
            color: #1a0f0f !important;
            border-color: rgb(134, 134, 150);
        }

        .credit-inputs::placeholder {
            color: #100d0d;
            font-size: 13px;
        }

        .credit-card-label {
            color: black;
            font-size: 9px;
            font-weight: 300;
        }

        .form-control.credit-inputs:focus {
            background: rgb(102, 221, 207);
            border: rgb(123, 123, 135);
        }

        .line {
            border-bottom: 1px solid rgb(102, 102, 221);
        }

        .information span {
            color: black;
            font-size: 12px;
            font-weight: 500;
        }

        .information {
            margin-bottom: 5px;
        }

        .items {
            -webkit-box-shadow: 5px 5px 4px -1px rgba(0, 0, 0, 0.25);
            box-shadow: 5px 5px 4px -1px rgba(0, 0, 0, 0.08);
        }

        .spec {
            font-size: 11px;
        }


        .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
            /* background-color: #7300ff; */
            background-color: gray;
        }
    </style>
    <style>
        body {
            font-family: 'Varela Round', sans-serif;
        }

        .modal-confirm {
            color: #636363;
            width: 325px;
            font-size: 14px;
        }

        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
        }

        .modal-confirm .modal-header {
            border-bottom: none;
            position: relative;
        }

        .modal-confirm h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -15px;
        }

        .modal-confirm .form-control,
        .modal-confirm .btn {
            min-height: 40px;
            border-radius: 3px;
        }

        .modal-confirm .close {
            position: absolute;
            top: -5px;
            right: -5px;
        }

        .modal-confirm .modal-footer {
            border: none;
            text-align: center;
            border-radius: 5px;
            font-size: 13px;
        }

        .modal-confirm .icon-box {
            color: #fff;
            position: absolute;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: -70px;
            width: 95px;
            height: 95px;
            border-radius: 50%;
            z-index: 9;
            background: #82ce34;
            padding: 15px;
            text-align: center;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        }

        .modal-confirm .icon-box i {
            font-size: 58px;
            position: relative;
            top: 3px;
        }

        .modal-confirm.modal-dialog {
            margin-top: 80px;
        }

        .modal-confirm .btn {
            color: #fff;
            border-radius: 4px;
            background: #82ce34;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            border: none;
        }

        .modal-confirm .btn:hover,
        .modal-confirm .btn:focus {
            background: #6fb32b;
            outline: none;
        }

        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }
    </style>
@endsection
@section('content')

    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                @include('master.navbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">Panier</h1>
                    </div>
                    <div class="card shadow mb-4" style="background-color: #f5f5f5">
                        <div class="card-body"  style="background-color: #f5f5f5">
                            {{-- <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Cour</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Cour</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($listC as $item)
                                            <tr>
                                                <td>{{ $item->title }}</td>
                                                <td class="d-flex justify-content-center">
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            Actions
                                                        </button>
                                                        <div class="dropdown-menu animated--fade-in"
                                                            aria-labelledby="dropdownMenuButton">                                                            
                                                            <div class="dropdown-item">
                                                                <form id="delete-form"
                                                                    action="{{ route('panier.delete', $item->id_C) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit"
                                                                        class="btn btn-danger btn-icon-split"
                                                                        onclick="return confirm('Are you sure you want to delete this card?')">
                                                                        <span class="icon text-white-50">
                                                                            <i class="fas fa-trash"></i>
                                                                        </span>
                                                                        <span class="text">supprimer</span>

                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> --}}
                            <div class="container mt-2 p-2 rounded cart"  style="background-color: #f5f5f5">
                                <div class="row no-gutters">
                                    <div class="col-md-8">
                                        <div class="product-details mr-2">
                                            <h6 class="mb-0">Shopping cart</h6>
                                            <div class="d-flex justify-content-between">
                                                <span>You have {{ $NeleinP }} items in your panier</span>
                                                <div class="d-flex flex-row align-items-center"><span
                                                        class="text-black-50">Sort by:</span>
                                                    <div class="price ml-2"><span class="mr-1">price</span><i
                                                            class="fa fa-angle-down"></i></div>
                                                </div>
                                            </div>
                                            <div class="custom-control custom-checkbox align-self-center mt-3 mb-3">
                                                <input type="checkbox" class="custom-control-input" id="all">
                                                <label class="custom-control-label" for="all">Select All</label>
                                            </div>
                                            @foreach ($listC as $item)
                                                @if ($item->price != 0.0)
                                                    <div  style="background-color: #ffffff"
                                                        class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                                                        <div class="d-flex flex-row">
                                                            <div class="custom-control custom-checkbox align-self-center">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="{{ $item->id_C }}"
                                                                    data-price="{{ $item->price }}" name="item">
                                                                <label class="custom-control-label"
                                                                    for="{{ $item->id_C }}"></label>
                                                            </div>
                                                            
                                                        <a href="{{ route('cour.show', $item->id_C) }}">
                                                            <img class="rounded"
                                                                src="{{ asset('storage/' . $item['photo']) }}"
                                                                width="50" height="50"></a>
                                                            <div class="ml-2"><span
                                                                    class="font-weight-bold d-block title">{{ $item->title }}</span>
                                                                <span class="spec fw-bold">$ {{ $item->price }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-row align-items-center">
                                                            {{-- <span class="d-block ml-5 font-weight-bold">$900</span> --}}
                                                            <form id="delete-form"
                                                                action="{{ route('panier.delete', $item->id_C) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"
                                                                    onclick="return confirm('Are you sure you want to delete this card?')"
                                                                    class="btn btn-link">
                                                                    <i class="fa-solid fa-trash me-3"
                                                                        style="color: gray"></i>
                                                                </button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>



                                    <div class="col-md-4" >
                                        <div class="payment-info mt-5" style="background-color: #ffffff">
                                            <div class="d-flex justify-content-between align-items-center"><span
                                                    style="color: black;">
                                                    Details</span>
                                            </div>
                                            {{-- <span class="type d-block mt-3 mb-1">Card
                                                type</span>
                                            <label class="radio"> <input type="radio" name="card" value="payment"
                                                    checked> <span><img width="30"
                                                        src="https://img.icons8.com/color/48/000000/mastercard.png" /></span>
                                            </label>

                                            <label class="radio"> <input type="radio" name="card" value="payment">
                                                <span><img width="30"
                                                        src="https://img.icons8.com/officel/48/000000/visa.png" /></span>
                                            </label>

                                            <label class="radio"> <input type="radio" name="card" value="payment">
                                                <span><img width="30"
                                                        src="https://img.icons8.com/ultraviolet/48/000000/amex.png" /></span>
                                            </label>


                                            <label class="radio"> <input type="radio" name="card" value="payment">
                                                <span><img width="30"
                                                        src="https://img.icons8.com/officel/48/000000/paypal.png" /></span>
                                            </label> --}}
                                            <div>
                                                <label class="credit-card-label">Email </label>
                                                <input class="form-control credit-inputs" type="email"
                                                    placeholder="Email@...">
                                            </div>
                                            <div>
                                                <label class="credit-card-label">Adress</label>
                                                <input type="text" class="form-control credit-inputs"
                                                    placeholder="Adress ...">
                                            </div>
                                            {{-- <div class="row">
                                                <div class="col-md-6"><label class="credit-card-label">Date</label><input
                                                        type="text" class="form-control credit-inputs"
                                                        placeholder="12/24"></div>
                                                <div class="col-md-6"><label class="credit-card-label">CVV</label><input
                                                        type="text" class="form-control credit-inputs"
                                                        placeholder="342">
                                                </div>
                                            </div> --}}
                                            <hr class="line">
                                            <div class="d-flex justify-content-between information">
                                                <span>items</span><span id="nbitem">0</span>
                                            </div>
                                            {{-- <div class="d-flex justify-content-between information">
                                                <span>Shipping</span>
                                                <span>$20.00</span>
                                            </div> --}}
                                            <div class="d-flex justify-content-between information">
                                                <span>Total</span>
                                                <span id="totalP">$0.00</span>
                                            </div>
                                            <button href="#myModal" data-toggle="modal" 
                                            id="pay"
                                            style="background-color: #5FBDFF"  
                                                class="btn  btn-block d-flex justify-content-center mt-3"
                                                type="button">
                                                <span>pay</span>
                                                {{-- <span>Checkout<i class="fa fa-long-arrow-right ml-1"></i> --}}
                                                {{-- </span> --}}
                                            </button>
                                        </div>
                                        <div class="payment-info mt-3">
                                            <div class="cart-icons">
                                                <div class="cart-icons-title mb-2" style="color: black;">Payez avec</div>
                                                <div class="cart-icons-list mt-1 mb-1">
                                                    <i style="color: #000000;" class="fa-brands fa-cc-visa fa-2xl"></i>
                                                    <i style="color: #000000;"
                                                        class="fa-brands fa-cc-mastercard fa-2xl"></i>
                                                    <i style="color: #000000;" class="fa-brands fa-cc-jcb fa-2xl"></i>
                                                    <i style="color: #000000;" class="fa-brands fa-cc-paypal fa-2xl"></i>
                                                    <i style="color: #000000;" class="fa-brands fa-google-pay fa-2xl"></i>
                                                    <i style="color: #000000;" class="fa-brands fa-apple-pay fa-2xl"></i>
                                                    <i style="color: #000000;" class="fa-brands fa-amazon-pay fa-2xl"></i>

                                                    {{-- <img class="cart-icons-img" src="https://img.alicdn.com/tfs/TB1xcMWdEKF3KVjSZFEXXXExFXa-68-48.png"><img class="cart-icons-img" src="https://ae01.alicdn.com/kf/S7b20ce778ba44e60a062008c35e98b57M/216x144.png"><img class="cart-icons-img" src="https://ae01.alicdn.com/kf/Sea8b6d9e957a4b4783785f087af30ba2r/216x144.png"><img class="cart-icons-img" src="https://ae01.alicdn.com/kf/S91ee3e0f4fde4535aad35f7c30f6bacfh/216x144.png"><img class="cart-icons-img" src="https://ae01.alicdn.com/kf/S8df1a1d99c8049d1b1a86c9a144719b6W/216x144.png"><img class="cart-icons-img" src="https://ae01.alicdn.com/kf/S173da9e53a234dcb9795cebd1856c4d7J/216x144.png"><img class="cart-icons-img" src="https://ae01.alicdn.com/kf/Sa4a89534ef694f1c8877ae3d864db6acz/216x144.png"><img class="cart-icons-img" src="https://ae01.alicdn.com/kf/S85aba413145f4b479fc18825603f87aaZ/216x144.png"><img class="cart-icons-img" src="https://ae01.alicdn.com/kf/S0321450614244c4dafba2517560de3b8s/216x144.png"><img class="cart-icons-img" src="https://ae01.alicdn.com/kf/Sffbd9fb9807e42d9a32feda7bc09121cA/216x144.png"><img class="cart-icons-img" src="https://ae01.alicdn.com/kf/S7774cbfd89914cad85c8b548087820308/216x144.png"><img class="cart-icons-img" src="https://ae01.alicdn.com/kf/Sf9caac85ebcd470a95d0ff441ebf609fc/216x144.png"><img class="cart-icons-img" src="https://ae01.alicdn.com/kf/S2a5881f5906b4fb58a0c6da600ddf7bf1/216x144.png"></div><div class="cart-icons-line"></div> --}}
                                                </div>
                                                <hr>
                                                <div class="cart-icons-title mt-3"
                                                    style="display: flex; align-items: center; color:black;">Protection
                                                    acheteur</div>
                                                <div class="cart-icons-list mt-1 fw-light" style="color: black;">
                                                    
                                                    <img src="{{asset('storage/images/insurance.png')}}"
                                                        height="21"
                                                        {{-- style="vertical-align: middle; " --}}
                                                        >&nbsp;&nbsp;Obtenez un
                                                    remboursement complet si l'article vous est livré en retard ou bien
                                                    ne correspond pas à sa description.
                                                </div>
                                            </div>
                                            {{-- <div class="d-flex justify-content-between align-items-center"><span>
                                                    Protection acheteur</span>
                                            </div>

                                            <div>
                                                <label class="credit-card-label">Email </label>
                                                <input class="form-control credit-inputs" type="email"
                                                    placeholder="Email@...">
                                            </div>
                                            <hr class="line">
                                            <div class="d-flex justify-content-between information">
                                                <span><img
                                                        src="https://ae01.alicdn.com/kf/S5d155b426fd74b24bd10e73f9ac90a93b/64x76.png"
                                                        height="21" style="vertical-align: middle;"></span><span>0</span>
                                            </div>
                                            <div class="d-flex justify-content-between information">
                                                <span> Obtenez un remboursement complet si l'article vous est livré en
                                                    retard ou bien ne correspond pas à sa description.</span>
                                                <span></span>
                                            </div> --}}
                                        </div>
                                    </div>




                                    <!-- Modal HTML -->
                                    <div id="myModal" class="modal fade">
                                        <div class="modal-dialog modal-confirm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="icon-box">
                                                        <i class="material-icons">&#xE876;</i>
                                                    </div>
                                                    <h4 class="modal-title w-100">Awesome!</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-center">Your order has been confirmed.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-success btn-block"
                                                        data-dismiss="modal">OK</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('master.footer')
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            console.log( $('input[name="item"]:checked').length);
            

            $('#all').on('click', function() {
                var isChecked = $(this).prop('checked');
                isChecked === true ?
                    $('input[name="item"]').prop('checked', true) :
                    $('input[name="item"]').prop('checked', false);
                const checkedCount = $('input[name="item"]:checked').length;
                $('#nbitem').html(checkedCount);
                let totalprice = 0;
                $('input[name="item"]:checked').each(function() {
                    const itemPrice = $(this).data('price');
                    totalprice += parseFloat(itemPrice);
                });
                $('#totalP').html('$' + totalprice);
            })

            $('input[name="item"]').on('click', function() {
                const checkedCount = $('input[name="item"]:checked').length;
                // checkedCount = 0 ? $('#pay').prop('disabled', false) : $('#pay').prop('disabled', true)

                $('#nbitem').html(checkedCount);
                let totalprice = 0;
                $('input[name="item"]:checked').each(function() {
                    const itemPrice = $(this).data('price');
                    totalprice += parseFloat(itemPrice);
                });
                $('#totalP').html('$' + totalprice);
            });

        })
    </script>
@endsection
