@extends('management.index')

@section('title', 'categorie')

@section('content')
    <div class="container ms-0 row">
        <div class="text-end p-1">
            <a href="{{ route('categorie.create') }}"class="btn btn-primary" style=" font-style: italic;"> <i
                    class="fa-regular fa-plus"></i>ajouter categorie</a>

        </div>
        <hr>
        <div class="row" style="display: flex; flex-direction: column; height: 100vh;">
            <div class="row col-12">
                @foreach ($categories as $cat)
                    <div class="card col-4 ">
                        <div class="card-body">
                            <h5 class="card-title">{{ $cat->CatName }}</h5>
                        </div>
                        <div class="card-footer text-center row">
                            {{-- <a href="{{route('categorie.souscat',$cat->id_Cat)}}" class="card-link col-6">sous categories</a> --}}
                            <a href="{{ route('categorie.edit', $cat->id_Cat) }}" class="card-link col-6">modifier</a>
                            <form action="{{ route('categorie.destroy', $cat->id_Cat) }}" method="post" class="col-6">
                                @csrf
                                @method('delete')
                                <input type="submit" value="supprimer" class="btn btn-danger rounded">
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
                    @if ($categories->onFirstPage())
                        <li style="margin-right: 10px;">&laquo;</li>
                    @else
                        <li style="margin-right: 10px;"><a href="{{ $categories->previousPageUrl() }}">&laquo;</a></li>
                    @endif

                    @foreach ($categories as $category)
                        <li style="margin-right: 10px;"><a href="{{ $category->url }}">{{ $category->name }}</a></li>
                    @endforeach

                    @if ($categories->hasMorePages())
                        <li><a href="{{ $categories->nextPageUrl() }}">&raquo;</a></li>
                    @else
                        <li>&raquo;</li>
                    @endif
                </ul>
            </div>

        </div>
    </div>
@endsection
