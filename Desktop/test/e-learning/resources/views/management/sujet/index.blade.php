@extends('management.index')

@section('title', 'sujet')

@section('content')
    <div class="container ms-0 row">
        <div class="text-end p-1">
            <a href="{{ route('sujet.create') }}"class="btn btn-primary" style=" font-style: italic;"> <i
                    class="fa-regular fa-plus"></i>ajouter sujet</a>

        </div>
        <hr>
        <div class="row" style="display: flex; flex-direction: column; height: 100vh;">
            <div class="row col-12">
                @foreach ($sujets as $suj)
                <div class="card col-4 mb-1">
                        <div class="card-body">
                            <h5 class="card-title">{{ $suj->SjName }}</h5>
                        </div>
                        <div class="card-footer text-center row">
                            {{-- <a href="{{route('sujet.suj',$cat->id_Sj)}}" class="card-link col-6">sous categories</a> --}}
                            <a href="{{ route('sujet.edit', $suj->id_Sj) }}" class="card-link col-6">modifier</a>
                            <form action="{{ route('sujet.destroy', $suj->id_Sj) }}" method="post" class="col-6">
                                @csrf
                                @method('delete')
                                <input type="submit" value="supprimer" class="btn btn-danger rounded" onclick="return confirm('Are you sure you want to delete this card?')">
                            </form>
                        </div>
                </div>
                    
                @endforeach
            </div>
            {{-- <div class="col-12 text-center">
                {{ $categories->links() }}
        </div> --}}
            <div class="col-12 text-center" >
                <ul style="list-style: none; display: flex; justify-content: center; padding: 0;">
                    @if ($sujets->onFirstPage())
                        <li style="margin-right: 10px;">&laquo;</li>
                    @else
                        <li style="margin-right: 10px;"><a href="{{ $sujets->previousPageUrl() }}">&laquo;</a></li>
                    @endif

                    @foreach ($sujets as $sujet)
                        <li style="margin-right: 10px;"><a href="{{ $sujet->url }}">{{ $sujet->name }}</a></li>
                    @endforeach

                    @if ($sujets->hasMorePages())
                        <li><a href="{{ $sujets->nextPageUrl() }}">&raquo;</a></li>
                    @else
                        <li>&raquo;</li>
                    @endif
                </ul>
            </div>

        </div>
    </div>
@endsection
