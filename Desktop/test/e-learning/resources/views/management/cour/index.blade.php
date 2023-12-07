@extends('auth.dashboard')
@section('title', 'cours')

@section('style')
    {{-- <style>
        table td {
            white-space: nowrap;
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style> --}}

@endsection
@section('container-fluid')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Cours</h1>
        @if (auth()->user()->roles->contains('role_name', 'formateur'))
            <a href="{{ route('cour.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fa-regular fa-plus"></i> Ajouter Cour</a>
        @endif
    </div>
    <!-- DataTales Example -->
    @if (!auth()->user()->roles->contains('role_name', 'client'))
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>title</th>
                                <th>info</th>
                                <th>description</th>
                                <th>Prerequisites</th>
                                <th>price</th>
                                <th>coupon</th>
                                <th>valider</th>
                                <th>terminer</th>
                                <th>Sujet</th>
                                <th>SousCategorie</th>
                                <th>Categorie</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>title</th>
                                <th>info</th>
                                <th>description</th>
                                <th>Prerequisites</th>
                                <th>price</th>
                                <th>coupon</th>
                                <th>valider</th>
                                <th>terminer</th>
                                <th>Sujet</th>
                                <th>SousCategorie</th>
                                <th>Categorie</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if (auth()->user()->roles->contains('role_name', 'moderateur'))
                                @foreach ($cours as $cour)
                                    <tr>
                                        <td>{{ $cour->title }}</td>
                                        <td>{{ $cour->info }}</td>
                                        <td>{{ $cour->description }}</td>
                                        <td>{{ $cour->Prerequisites }}</td>
                                        <td>{{ $cour->price }}</td>
                                        <td>{{ $cour->coupon }}</td>
                                        <td>{{ $cour->valider ? 'Oui' : 'No' }}</td>
                                        <td>{{ $cour->terminer ? 'Oui' : 'No' }}</td>
                                        <td>{{ $cour->sujet->SjName }}</td>
                                        <td>{{ $cour->sujet->souscategorie->SCatName }}</td>
                                        <td>{{ $cour->sujet->souscategorie->categorie->CatName }}</td>
                                        <td id="actions" class="d-flex justify-content-center">
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu animated--fade-in"
                                                    aria-labelledby="dropdownMenuButton">
                                                    <a href="{{ route('cour.valider', $cour->id_C) }}"
                                                        class="btn btn-warning btn-icon-split ms-2">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-exclamation-triangle"></i>
                                                        </span>
                                                        <span class="text">Valider</span>
                                                    </a>
                                                    <div class="dropdown-item">
                                                        <form action="{{ route('cour.destroy', $cour->id_C) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger btn-icon-split"
                                                                onclick="return confirm('Are you sure you want to delete this card?')">
                                                                {{-- <i class="fas fa-trash"></i>class="btn btn-danger btn-circle" --}}
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
                            @elseif(auth()->user()->roles->contains('role_name', 'formateur'))
                                @foreach ($cours as $cour)
                                    <tr>
                                        <td>{{ $cour->title }}</td>
                                        <td>{{ $cour->info }}</td>
                                        <td>{{ $cour->description }}</td>
                                        <td>{{ $cour->Prerequisites }}</td>
                                        <td>{{ $cour->price }}</td>
                                        <td>{{ $cour->coupon }}</td>
                                        <td>{{ $cour->valider ? 'Oui' : 'No' }}</td>
                                        <td>{{ $cour->terminer ? 'Oui' : 'No' }}</td>
                                        <td>{{ $cour->sujet->SjName }}</td>
                                        <td>{{ $cour->sujet->souscategorie->SCatName }}</td>
                                        <td>{{ $cour->sujet->souscategorie->categorie->CatName }}</td>
                                        <td id="actions" class="d-flex justify-content-center">
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu animated--fade-in"
                                                    aria-labelledby="dropdownMenuButton">
                                                    <a href="{{ route('cour.edit', $cour->id_C) }}"
                                                        class="btn btn-warning btn-icon-split ml-4 ">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-exclamation-triangle"></i>
                                                        </span>
                                                        <span class="text">modifier</span>
                                                    </a>
                                                    <div class="dropdown-item">
                                                        <form action="{{ route('cour.destroy', $cour->id_C) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger btn-icon-split"
                                                                onclick="return confirm('Are you sure you want to delete this card?')">
                                                                {{-- <i class="fas fa-trash"></i>class="btn btn-danger btn-circle" --}}
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
                            @elseif(auth()->user()->roles->contains('role_name', 'client'))
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="container row">
            @foreach ($cours as $cour)
                <div class="card product_item col-lg-3 col-md-4 col-sm-12 ml-1">
                    <div class="body">
                        <div class="cp_img d-flex justify-content-center align-items-center">
                            <a href="{{ route('cour.show', $cour->id_C) }}">
                                <img style="width: 195px; height:195px;" src="{{ asset('storage/' . $cour['photo']) }}"
                                    alt="Product" class="img-fluid" class="img-fluid">
                            </a>
                            {{-- <div class="hover">

                                @if ($cour->panier()->where('id_C', $cour->id_C)->exists())
                                    <a href="{{ route('panier.index') }}" class="btn btn-primary btn-sm">

                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </a>
                                @else
                                    <a href="#" name="panier" data-id="{{ $cour->id_C }}"
                                        class="btn btn-primary btn-sm" data-route="{{ route('panier.store') }}">
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </a>
                                @endif
                                @if ($cour->wishlist()->where('id_C', $cour->id_C)->exists())
                                    <a href="{{ route('wishlist.index') }}" class="btn btn-white">
                                        <i class="fa-solid fa-heart"></i>
                                    </a>
                                @else
                                    <a href="#" name="wishlist" data-id="{{ $cour->id_C }}" class="btn btn-white"
                                        data-route="{{ route('wishlist.store') }}">
                                        <i class="fa-regular fa-heart"></i>
                                    </a>
                                @endif
                            </div> --}}
                        </div>
                        <div class="product_details">
                            <h5><a href="#">{{ $cour->title }}</a>
                            </h5>
                            <ul class="product_price list-unstyled">
                                <li class="new_price">${{ $cour->price }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
