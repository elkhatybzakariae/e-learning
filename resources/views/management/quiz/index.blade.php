@extends('auth.dashboard')
@section('title', 'quiz')

@section('container-fluid')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Quiz</h1>
        @if (auth()->user()->roles->contains('role_name', 'formateur'))
            <a href="{{ route('quiz.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fa-regular fa-plus"></i> Ajouter quiz</a>
        @endif
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            @if (auth()->user()->roles->contains('role_name', 'formateur'))
                                <th>quiz Name</th>
                                <th>Section</th>
                                <th>Cour</th>
                                <th>Actions</th>
                            @elseif(auth()->user()->roles->contains('role_name', 'client'))
                                <th>quiz Name</th>
                                <th>Score</th>
                                <th>Date Passer</th>
                                {{-- <th>Actions</th> --}}
                            @endif
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            @if (auth()->user()->roles->contains('role_name', 'formateur'))
                                <th>quiz Name</th>
                                <th>Section</th>
                                <th>Cour</th>
                                <th>Actions</th>
                            @elseif(auth()->user()->roles->contains('role_name', 'client'))
                                <th>quiz Name</th>
                                <th>Score</th>
                                <th>Date Passer</th>
                                {{-- <th>Actions</th> --}}
                            @endif
                        </tr>
                    </tfoot>
                    <tbody>
                        @if (auth()->user()->roles->contains('role_name', 'formateur'))
                            @foreach ($quiz as $quiz)
                                <tr>
                                    <td>{{ $quiz->quizName }}</td>
                                    <td>{{ $quiz->section->Sec_Name }}</td>
                                    <td>{{ $quiz->section->cour->title }}</td>
                                    <td class="d-flex justify-content-center">
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu animated--fade-in"
                                                aria-labelledby="dropdownMenuButton">
                                                <a href="{{ route('testquestion.index', $quiz->id_Q) }}"
                                                    class="btn btn-warning btn-icon-split ml-4 ">
                                                    <span class="icon text-white-50">
                                                        <i class="fa-solid fa-question"></i>
                                                    </span>
                                                    <span class="text">Questions</span>
                                                </a>
                                                <div class="dropdown-item">
                                                    <form action="{{ route('quiz.destroy', $quiz->id_Q) }}" method="post">
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
                            @foreach ($quiz as $quiz)
                                <tr>
                                    <td><a href="{{route('quiz.passer',$quiz->quiz->id_Q)}}">{{ $quiz->quiz->quizName }}</a></td>
                                    <td>{{ $quiz->score }} %</td>
                                    {{-- <td>{{ $quiz->quiz->updated_at }}</td> --}}
                                    <td>{{ \Carbon\Carbon::parse($quiz->quiz->updated_at)->format('Y/m/d') }}</td>
                                    {{--<td class="d-flex justify-content-center">
                                         <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu animated--fade-in"
                                                aria-labelledby="dropdownMenuButton">
                                                <a href="{{ route('testquestion.index', $quiz->id_Q) }}"
                                                    class="btn btn-warning btn-icon-split ml-4 ">
                                                    <span class="icon text-white-50">
                                                        <i class="fa-solid fa-question"></i>
                                                    </span>
                                                    <span class="text">Questions</span>
                                                </a>
                                                <div class="dropdown-item">
                                                    <form action="{{ route('quiz.destroy', $quiz->id_Q) }}" method="post">
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
                                    </td>--}}
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
