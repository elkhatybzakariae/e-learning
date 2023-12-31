@extends('auth.dashboard')

@section('title', 'edit category')

@section('container-fluid')
    <div class="container ms-2 d-flex justify-content-center align-items-center">
        <div class="text center bg-white p-5 pb-3 mt-5 rounded">
            <form action="{{ route('categorie.update', $categorie->id_Cat) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group row ps-3 pe-3 ">
                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="CatName" style="font-style: italic;">Categorie:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <input type="text" name="CatName" id="CatName" class="form-control form-control-lg  "
                                style="" value="{{ old('CatName', $categorie->CatName) }}" />
                        </div>
                        @error('CatName')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group text-end mt-3">
                        <button type="submit" class="btn btn-outline-primary  gradient-custom-4 text-body"
                            style="font-style: italic;">modifier</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
