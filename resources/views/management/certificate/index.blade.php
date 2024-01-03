@extends('auth.dashboard')
@section('title', 'certificates')

@section('container-fluid')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">certificates</h1>
        @if (auth()->user()->roles->contains('role_name', 'formateur'))
            <a href="{{ route('certificate.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fa-regular fa-plus"></i> Ajouter certificate</a>
        @endif
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>certificate Name</th>
                            <th>Cour</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>certificate Name</th>
                            <th>Cour</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        {{-- @if (auth()->user()->roles->contains('role_name', 'moderateur')) --}}
                            {{-- @foreach ($certificates as $cert)
                                <tr>
                                    <td>{{ $cert->title }}</td>
                                    <td>{{ $cert->info }}</td>
                                    <td>{{ $cert->description }}</td>
                                    <td>{{ $cert->Prerequisites }}</td>
                                    <td>{{ $cert->price }}</td>
                                    <td>{{ $cert->coupon }}</td>
                                    <td>{{ $cert->valider ? "Oui" : "No"; }}</td>
                                    <td>{{ $cert->terminer ? "Oui" : "No"; }}</td>
                                    <td>{{ $cert->sujet->SjName }}</td>
                                    <td>{{ $cert->sujet->souscategorie->SCatName }}</td>
                                    <td>{{ $cert->sujet->souscategorie->categorie->CatName }}</td>
                                    <td class="d-flex justify-content-center">
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu animated--fade-in"
                                                aria-labelledby="dropdownMenuButton">
                                                <a href="{{ route('cert.valider', $cert->id_Cert ) }}"
                                                    class="btn btn-warning btn-icon-split ">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-exclamation-triangle"></i>
                                                    </span>
                                                    <span class="text">Valider</span>
                                                </a>
                                                <div class="dropdown-item">
                                                    <form action="{{ route('cert.destroy', $cert->id_Cert ) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-icon-split"
                                                            onclick="return confirm('Are you sure you want to delete this card?')">
                                                            {{-- <i class="fas fa-trash"></i>class="btn btn-danger btn-circle" 
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
                            @endforeach --}}
                        @if(auth()->user()->roles->contains('role_name', 'formateur'))
                            @foreach ($certificates as $cert)
                                <tr>
                                    <td>{{ $cert->certificateName }}</td>
                                    <td>{{ $cert->certificatetable->title }}</td>
                                    <td class="d-flex justify-content-center">
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu animated--fade-in"
                                                aria-labelledby="dropdownMenuButton">
                                                <a href="{{route('testquestion.index', $cert->id_Cert )}}"
                                                    class="btn btn-warning btn-icon-split ml-4 ">
                                                    <span class="icon text-white-50">
                                                        <i class="fa-solid fa-question"></i>
                                                    </span>
                                                    <span class="text">Questions</span>
                                                </a>
                                                <div class="dropdown-item">
                                                    <form action="{{ route('certificate.destroy', $cert->id_Cert ) }}" method="post">
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
@endsection
