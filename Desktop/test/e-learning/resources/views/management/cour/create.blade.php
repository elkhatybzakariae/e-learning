@extends('management.index')

@section('title', 'add cour')

@section('content')
    <div class="container ms-2 d-flex justify-content-center align-items-center">
        <div class="text center bg-white p-5 pb-3 mt-5 rounded">
            <form action="{{ route('cour.store') }}" method="POST">
                @csrf
                <div class="form-group row ps-3 pe-3 ">
                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="title" style="font-style: italic;">title:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <input type="text" name="title" value="{{ old('title') }}" id="title"
                                class="form-control form-control-lg  " style="" />
                        </div>
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="info" style="font-style: italic;">info:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <input type="text" name="info" value="{{ old('info') }}" id="info"
                                class="form-control form-control-lg  " style="" />
                        </div>
                        @error('info')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="description" style="font-style: italic;">description:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <textarea name="description" id="description"
                                class="form-control form-control-lg  " style="" />{{ old('description') }}</textarea>
                        </div>
                    </div>

                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="Prerequisites" style="font-style: italic;">Prerequisites:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <input type="text" name="Prerequisites" value="{{ old('Prerequisites') }}" id="Prerequisites"
                                class="form-control form-control-lg  " style="" />
                        </div>
                    </div>


                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="price" style="font-style: italic;">price:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <input type="number" name="price" value="{{ old('price') }}" id="price"
                                class="form-control form-control-lg  " style="" />
                        </div>
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="coupon" style="font-style: italic;">coupon:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <input type="number" name="coupon" value="{{ old('coupon') }}" id="coupon"
                                class="form-control form-control-lg  " style="" />
                        </div>
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
                            <select name="id_SCat" id="id_SCat" class="custom-select">
                                <option selected>select SousCategorie</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="id_Sj" style="font-style: italic;">Sujet:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <select name="id_Sj" id="id_Sj" class="custom-select">
                                <option selected>select Sujet</option>
                            </select>
                        </div>
                        @error('id_Sj')
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#id_Cat').on('change', function() {
                var categoryId = $(this).val(); // Get the selected category ID
                if (categoryId) {
                    $('#id_SCat').empty();
                    $('#id_SCat').append('<option selected>select SousCategorie</option>');

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
            $('#id_SCat').on('change', function() {
                var selectedSubcategoryId = $(this).val();
                var filteredSujets = sujets.filter(function(sujet) {
                    return sujet.id_SCat == selectedSubcategoryId;
                });

                var subjectsSelect = $('#id_Sj');
                subjectsSelect.empty();
                subjectsSelect.append('<option value="" selected>select Subject</option>');
                filteredSujets.forEach(function(sujet) {
                    subjectsSelect.append('<option value="' + sujet.id_Sj + '">' + sujet.SjName + '</option>');
                });
            });
        });
    </script>
@endsection
