@extends('auth.dashboard')

@section('title', 'media')

@section('container-fluid')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">media</h1>
        <a href="{{ route('media.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fa-regular fa-plus"></i> Ajouter media</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>name</th>
                            <th>video</th>
                            <th>Session</th>
                            <th>Section</th>
                            <th>Cour</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>name</th>
                            <th>video</th>
                            <th>Session</th>
                            <th>Section</th>
                            <th>Cour</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($media as $media)
                            <tr>
                                <td>{{ $media->mediaName }}</td>
                                <td>{{ $media->video->title }}</td>
                                <td>{{ $media->video->session->Sess_Name }}</td>
                                <td>{{ $media->video->session->section->Sec_Name }}</td>
                                <td>{{ $media->video->session->section->cour->title }}</td>
                                <td class="d-flex justify-content-center">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                                            {{-- <a href="{{ route('media.edit', $media->id_M) }}"
                                                class="btn btn-warning btn-icon-split ">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                </span>
                                                <span class="text">modifier</span>
                                            </a> --}}
                                            <div class="dropdown-item">
                                                <form action="{{ route('media.destroy', $media->id_M) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-icon-split"
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
            </div>
        </div>
    </div>
    
@endsection
