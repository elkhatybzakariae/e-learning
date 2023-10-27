@extends('management.index')

@section('title', 'cours')

@section('content')
    @if (auth()->user()->roles->contains('role_name', 'formateur'))
        <div class="text-end p-1 col-12">
            <a href="{{ route('section.create',$id) }}" class="btn btn-primary" style=" font-style: italic;"> <i
                    class="fa-regular fa-plus"></i>ajouter section</a>
        </div>
    @endif

    <hr>
    <div class="row col-12">
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
        @if (auth()->user()->roles->contains('role_name', 'formateur'))
            @if ($sections)
                <table>
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
                                    <a href="{{ route('section.edit', $sec->id_Sec) }}" class="card-link col-6">modifier</a>
                                    <form action="{{ route('section.destroy', $sec->id_Sec) }}" method="post" class="col-6">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="supprimer" class="btn btn-danger rounded"
                                            onclick="return confirm('Are you sure you want to delete this section?')">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        @elseif(auth()->user()->roles->contains('role_name', 'client'))
        @endif
    </div>
    {{-- <div class="col-12 text-center">
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
    </div> --}}
@endsection
