@extends('management.index')

@section('title', 'souscategorie')

@section('content')
        <div class="text-end p-1">
            <a href="{{ route('souscategorie.create') }}"class="btn btn-primary" style=" font-style: italic;"> <i
                    class="fa-regular fa-plus"></i>ajouter souscategorie</a>

        </div>
        <hr>
        <div class="row col-12">
            @foreach ($souscategories as $souscat)
                <div class="card mb-1  mr-1" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $souscat->SCatName }}</h5>
                    </div>
                    <div class="card-footer text-center row">
                        {{-- <a href="{{route('souscategorie.souscat',$cat->id_SCat)}}" class="card-link col-6">sous categories</a> --}}
                        <a href="{{ route('souscategorie.edit', $souscat->id_SCat) }}" class="card-link col-6">modifier</a>
                        <form action="{{ route('souscategorie.destroy', $souscat->id_SCat) }}" method="post"
                            class="col-6">
                            @csrf
                            @method('delete')
                            <input type="submit" value="supprimer" class="btn btn-danger rounded"
                                onclick="return confirm('Are you sure you want to delete this card?')">
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- <div class="col-12 text-center">
                {{ $categories->links() }}
        </div> --}}
        <div class="col-12 text-center">
            <ul style="list-style: none; display: flex; justify-content: center; padding: 0;">
                @if ($souscategories->onFirstPage())
                    <li style="margin-right: 10px;">&laquo;</li>
                @else
                    <li style="margin-right: 10px;"><a href="{{ $souscategories->previousPageUrl() }}">&laquo;</a></li>
                @endif

                @foreach ($souscategories as $souscategorie)
                    <li style="margin-right: 10px;"><a href="{{ $souscategorie->url }}">{{ $souscategorie->name }}</a></li>
                @endforeach

                @if ($souscategories->hasMorePages())
                    <li><a href="{{ $souscategories->nextPageUrl() }}">&raquo;</a></li>
                @else
                    <li>&raquo;</li>
                @endif
            </ul>
        </div>

@endsection
