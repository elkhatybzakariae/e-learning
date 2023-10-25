@extends('management.index')

@section('title', 'cours')

@section('content')
    <div class="container ms-0 row">
        <div class="text-end p-1">
            <a href="{{ route('cour.create') }}"class="btn btn-primary" style=" font-style: italic;"> <i
                    class="fa-regular fa-plus"></i>ajouter cour</a>

        </div>
        <hr>
        <div class="row" style="display: flex; flex-direction: column; height: 100vh;">
            <div class="row col-12">
                @foreach ($cours as $cour)
                    <div class="card col-4 mb-1">
                        <div class="card-body">
                            <h5 class="card-title">{{ $cour->title }}</h5>
                            <p class="card-text">{{ $cour->info }}</p>
                            <p class="card-text">{{ $cour->Prerequisites }}</p>
                            <p class="card-text">{{ $cour->price }}</p>
                        </div>
                        @if (auth()->user()->roles->contains('role_name', 'moderateur'))
                            <div class="card-footer text-center row">
                                {{-- <a href="{{route('cour.suj',$cat->id_C)}}" class="card-link col-6">sous categories</a> --}}
                                <a href="#" class="card-link col-6">valider</a>
                                <form action="{{ route('cour.destroy', $cour->id_C) }}" method="post" class="col-6">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="supprimer" class="btn btn-danger rounded"
                                        onclick="return confirm('Are you sure you want to delete this card?')">
                                </form>
                            </div>
                        @elseif(auth()->user()->roles->contains('role_name', 'formateur'))
                            <div class="card-footer text-center row">
                                {{-- <a href="{{route('cour.suj',$cat->id_C)}}" class="card-link col-6">sous categories</a> --}}
                                <a href="{{ route('cour.edit', $cour->id_C) }}" class="card-link col-6">modifier</a>
                                <form action="{{ route('cour.destroy', $cour->id_C) }}" method="post" class="col-6">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="supprimer" class="btn btn-danger rounded"
                                        onclick="return confirm('Are you sure you want to delete this card?')">
                                </form>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
            {{-- <div class="col-12 text-center">
                {{ $categories->links() }}
        </div> --}}
            <div class="col-12 text-center">
                <ul style="list-style: none; display: flex; justify-content: center; padding: 0;">
                    @if ($cours->onFirstPage())
                        <li style="margin-right: 10px;">&laquo;</li>
                    @else
                        <li style="margin-right: 10px;"><a href="{{ $cours->previousPageUrl() }}">&laquo;</a></li>
                    @endif

                    @foreach ($cours as $cour)
                        <li style="margin-right: 10px;"><a href="{{ $cour->url }}">{{ $cour->name }}</a></li>
                    @endforeach

                    @if ($cours->hasMorePages())
                        <li><a href="{{ $cours->nextPageUrl() }}">&raquo;</a></li>
                    @else
                        <li>&raquo;</li>
                    @endif
                </ul>
            </div>

        </div>
    </div>
@endsection
