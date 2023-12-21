@extends('auth.dashboard')

@section('title', 'edit souscategory')

@section('container-fluid')
    <div class="container ms-2 d-flex justify-content-center align-items-center">
        <div class="text center bg-white p-5 pb-3 mt-5 rounded">
            <form action="{{ route('souscategorie.update', $souscategorie->id_SCat) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group row ps-3 pe-3 ">
                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="SCatName" style="font-style: italic;">SousCategorie:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <input type="text" name="SCatName" value="{{old('SCatName', $souscategorie->SCatName) }}" id="SCatName"
                                class="form-control form-control-lg  " style="" />
                        </div>
                        @error('SCatName')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="id_Cat" style="font-style: italic;">Categorie:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <select name="id_Cat" id="id_Cat" class="custom-select">
                                @foreach ($categorie as $cat)
                                    <option value="{{ $cat->id_Cat }}" @if ($souscategorie->id_Cat === $cat->id_Cat) selected @endif>
                                        {{ $cat->CatName }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('id_Cat')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="form-group text-end mt-3">
                        <button type="submit" class="btn btn-outline-primary  gradient-custom-4 text-body"
                            style="font-style: italic;">Modifier </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
