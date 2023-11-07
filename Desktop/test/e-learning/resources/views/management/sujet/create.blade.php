@extends('auth.dashboard')

@section('title', 'add sujet')

@section('container-fluid')
    <div class="container ms-2 d-flex justify-content-center align-items-center">
        <div class="text center bg-white p-5 pb-3 mt-5 rounded">
            <form action="{{ route('sujet.store') }}" method="POST">
                @csrf
                <div class="form-group row ps-3 pe-3 ">
                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="SjName" style="font-style: italic;">Sujet:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <input type="text" name="SjName" value="{{ old('SjName') }}" id="SjName"
                                class="form-control form-control-lg  " style="" />
                        </div>
                        @error('SjName')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="id_Cat" style="font-style: italic;">Categorie:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <select name="id_Cat" id="id_Cat" class="custom-select">
                                <option selected>select Categorie</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id_Cat }}" @if (old('id_Cat') == $cat->id_Cat) selected @endif>
                                        {{ $cat->CatName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="id_SCat" style="font-style: italic;">SousCategorie:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            {{-- <select name="id_SCat" id="id_SCat" class="custom-select">
                                <option selected>select SousCategorie</option>
                                @foreach ($souscategorie as $scat)
                                    <option value="{{$scat->id_SCat}}">{{$scat->SCatName}}</option>
                                @endforeach
                            </select> --}}
                            <select name="id_SCat" id="id_SCat" class="custom-select">
                                <option selected>select SousCategorie</option>
                            </select>
                        </div>
                        @error('id_SCat')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group text-end mt-3">
                        <button type="submit" class="btn btn-outline-primary  gradient-custom-4 text-body"
                            style="font-style: italic;">Ajouter </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    $(document).ready(function() {
    $('#id_Cat').on('change', function() {
    var categoryId = $(this).val();
    if (categoryId) {
    $('#id_SCat').empty();
    $('#id_SCat').append('<option selected>select SousCategorie</option>');
    console.log(souscategories);
    $.each(souscategories, function(index, souscat) {
    if (souscat.id_Cat == categoryId) {
    $('#id_SCat').append('<option value="' + souscat.id_SCat + '">' +
        souscat.SCatName + '</option>');
    }
    });
    } else {
    $('#id_SCat').empty();
    $('#id_SCat').append('<option selected>select SousCategorie</option>');
    }
    });
    });
@endsection
