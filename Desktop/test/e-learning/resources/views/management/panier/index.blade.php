@extends('master.layout')

@section('title', 'panier')

@section('style')
    <style>
        .title {
            text-transform: capitalize;
        }

        .payment-info {
            background: rgb(97, 158, 189);
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
            background: rgb(102, 102, 221);
            color: #fff !important;
            border-color: rgb(102, 102, 221);
        }

        .credit-inputs::placeholder {
            color: #fff;
            font-size: 13px;
        }

        .credit-card-label {
            font-size: 9px;
            font-weight: 300;
        }

        .form-control.credit-inputs:focus {
            background: rgb(102, 102, 221);
            border: rgb(102, 102, 221);
        }

        .line {
            border-bottom: 1px solid rgb(102, 102, 221);
        }

        .information span {
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
                    <div class="card shadow mb-4">
                        <div class="card-body">
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
                            <div class="container mt-2 p-2 rounded cart">
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
                                                    <div
                                                        class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                                                        <div class="d-flex flex-row">
                                                            <div class="custom-control custom-checkbox align-self-center">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="{{ $item->id_C }}" name="item">
                                                                <label class="custom-control-label"
                                                                    for="{{ $item->id_C }}"></label>
                                                            </div>
                                                            <img class="rounded"
                                                                src="{{ asset('storage/' . $item['photo']) }}"
                                                                width="50" height="50">
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



                                    <div class="col-md-4">
                                        <div class="payment-info">
                                            <div class="d-flex justify-content-between align-items-center"><span>
                                                    Details</span>
                                                <img class="rounded" src="https://i.imgur.com/WU501C8.jpg" width="30">
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
                                                <input class="form-control credit-inputs" type="email" placeholder="Email@...">
                                            </div>
                                            <div>
                                                <label class="credit-card-label">Adress</label>
                                                <input type="text" class="form-control credit-inputs" placeholder="Adress ...">
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
                                                <span>items</span><span>0</span>
                                            </div>
                                            {{-- <div class="d-flex justify-content-between information">
                                                <span>Shipping</span>
                                                <span>$20.00</span>
                                            </div> --}}
                                            <div class="d-flex justify-content-between information">
                                                <span>Total</span>
                                                <span>$0.00</span>
                                            </div>
                                            <button class="btn btn-primary btn-block d-flex justify-content-between mt-3"
                                                type="button">
                                                <span>pay</span>
                                                {{-- <span>Checkout<i class="fa fa-long-arrow-right ml-1"></i> --}}
                                                </span>
                                            </button>
                                        </div>
                                        <div class="payment-info mt-3">
                                            <div class="d-flex justify-content-between align-items-center"><span>
                                                Protection acheteur</span>
                                                {{-- <img class="rounded" src="https://i.imgur.com/WU501C8.jpg" width="30"> --}}
                                            </div>
                                            
                                            <div>
                                                <label class="credit-card-label">Email </label>
                                                <input class="form-control credit-inputs" type="email" placeholder="Email@...">
                                            </div>
                                            <hr class="line">
                                            <div class="d-flex justify-content-between information">
                                                <span><img src="https://ae01.alicdn.com/kf/S5d155b426fd74b24bd10e73f9ac90a93b/64x76.png" height="21" style="vertical-align: middle;"></span><span>0</span>
                                            </div>
                                            <div class="d-flex justify-content-between information">
                                                <span>  Obtenez un remboursement complet si l'article vous est livré en retard ou bien ne correspond pas à sa description.</span>
                                                <span></span>
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
            $('#all').on('click', function() {
                var isChecked = $(this).prop('checked');
                isChecked === true ?
                    $('input[name="item"]').prop('checked', true) :
                    $('input[name="item"]').prop('checked', false);
            })
        })
    </script>
@endsection
