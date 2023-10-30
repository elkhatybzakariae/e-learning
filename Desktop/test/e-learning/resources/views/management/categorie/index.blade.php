@extends('auth.dashboard')

@section('title', 'categorie')

@section('container-fluid')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Categories</h1>
        <a href="{{ route('categorie.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fa-regular fa-plus"></i> Ajouter Categorie</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($categories as $cat)
                            <tr>
                                <td>{{ $cat->CatName }}</td>
                                <td class="d-flex justify-content-center">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Actions
                                        </button>                                       
                                        <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                            <a  href="{{ route('categorie.edit', $cat->id_Cat) }}" class="btn btn-warning btn-icon-split ">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                </span>
                                                <span class="text">modifier</span>
                                            </a>
                                            <div class="dropdown-item">
                                                <form action="{{ route('categorie.destroy', $cat->id_Cat) }}"
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- <div class="text-end p-1 col-12">
            <a href="{{ route('categorie.create') }}"class="btn btn-primary" style=" font-style: italic;"> <i
                    class="fa-regular fa-plus"></i>ajouter categorie</a>

        </div>
        <hr>
        <div class="row col-12">
            @foreach ($categories as $cat)
                <div class="card mb-1  mr-1" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $cat->CatName }}</h5>
                    </div>
                    <div class="card-footer text-center row">
                        {{-- <a href="{{route('categorie.souscat',$cat->id_Cat)}}" class="card-link col-6">sous categories</a> 
                        <a href="{{ route('categorie.edit', $cat->id_Cat) }}" class="card-link col-6">modifier</a>
                        <form action="{{ route('categorie.destroy', $cat->id_Cat) }}" method="post" class="col-6">
                            @csrf
                            @method('delete')
                            <input type="submit" value="supprimer" class="btn btn-danger rounded"
                                onclick="return confirm('Are you sure you want to delete this card?')">
                        </form>
                    </div>
                </div>
            @endforeach
        </div> --}}

@endsection
