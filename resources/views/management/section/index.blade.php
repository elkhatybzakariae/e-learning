@extends('auth.dashboard')

@section('title', 'sections')
@section('container-fluid')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Sections</h1>
        {{-- @if (auth()->user()->roles->contains('role_name', 'formateur')) --}}
            <a href="{{ route('section.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fa-regular fa-plus"></i> Ajouter Section</a>
        {{-- @endif --}}
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Cour</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Cour</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($sections as $sec)
                            <tr>
                                <td>{{ $sec->Sec_Name }}</td>
                                <td>{{ $sec->cour->title }}</td>
                                <td class="d-flex justify-content-center">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                            <a href="{{ route('section.edit',$sec->id_Sec) }}"
                                                class="btn btn-warning btn-icon-split ">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                </span>
                                                <span class="text">modifier</span>
                                            </a>
                                            <div class="dropdown-item">
                                                <form action="{{ route('section.destroy',$sec->id_Sec) }}"
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

    {{-- <div class="row col-12">
        {{-- @if (auth()->user()->roles->contains('role_name', 'moderateur'))
            @foreach ($cours as $cour)
                <div class="card mb-1  mr-1" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $cour->title }}</h5>
                        <p class="card-text">{{ $cour->info }}</p>
                        <p class="card-text">{{ $cour->Prerequisites }}</p>
                        <p class="card-text">{{ $cour->price }}</p>
                    </div>
                    <div class="card-footer text-center row">
                <a href="{{ route('cour.valider', $cour->id_C) }}" class="card-link col-6">valider</a>
                <form action="{{ route('cour.destroy', $cour->id_C) }}" method="post" class="col-6">
                    @csrf
                    @method('delete')
                    <input type="submit" value="supprimer" class="btn btn-danger rounded"
                        onclick="return confirm('Are you sure you want to delete this card?')">
                </form>
            </div>
            </div>
            @endforeach --}}
        {{-- @if (auth()->user()->roles->contains('role_name', 'formateur')) --}}
              
                {{-- <table class="table border-dark bg-light rounded">
                    <thead>
                        <tr>
                            <th>Section Name</th>
                            <th>Actoins</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sections as $sec)
                            <tr>
                                <td>{{ $sec->Sec_Name }}</td>
                                <td>
                                    <div class="text-center row">
                                    <a href="{{ route('section.edit', $sec->id_Sec) }}" class="card-link col-6">modifier</a>
                                    <form action="{{ route('section.destroy', $sec->id_Sec) }}" method="post" class="col-6">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="supprimer" class="btn btn-danger rounded"
                                            onclick="return confirm('Are you sure you want to delete this section?')">
                                    </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> 
            @endif
        @elseif(auth()->user()->roles->contains('role_name', 'client'))
        @endif
    </div> --}}
@endsection
