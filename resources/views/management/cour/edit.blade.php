@extends('auth.dashboard')

@section('title', 'modify category')
@section('container-fluid')

    <div class="container ms-2 d-flex justify-content-center align-items-center">
        <div class="text center bg-white p-5 pb-3 mt-5 rounded mb-5">
            <form action="{{ route('cour.update', $cour->id_C) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group row ps-3 pe-3 ">
                    <div class="col-12 ">
                        <label for="photo" style="font-style: italic;">New Image:</label>
                        <div class="form-outline mb-2">
                            <input type="file" name="photo" 
                            accept="image/jpeg, image/png, image/jpg, image/gif" 
                            id="photo" class="form-control form-control-lg" style="">
                        </div>
                        @error('photo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="title" style="font-style: italic;">title:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <input type="text" name="title" value="{{ old('title', $cour->title) }}" id="title"
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
                            <input type="text" name="info" value="{{ old('info', $cour->info) }}" id="info"
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
                            <textarea name="description" id="description" class="form-control form-control-lg  " style="" />{{ old('description', $cour->description) }}</textarea>
                        </div>
                    </div>

                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="Prerequisites" style="font-style: italic;">Prerequisites:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <input type="text" name="Prerequisites"
                                value="{{ old('Prerequisites', $cour->Prerequisites) }}" id="Prerequisites"
                                class="form-control form-control-lg  " style="" />
                        </div>
                    </div>


                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="price" style="font-style: italic;">price:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <input type="number" name="price" value="{{ old('price', $cour->price) }}" id="price"
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
                            <input type="number" name="coupon" value="{{ old('coupon', $cour->coupon) }}" id="coupon"
                                class="form-control form-control-lg  " style="" />
                        </div>
                    </div>

                    {{-- <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="id_Cat" style="font-style: italic;">Categorie:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <select name="id_Cat" id="id_Cat" class="custom-select">
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
                                @foreach ($souscategories as $scat)
                                    <option value="{{ $scat->id_SCat }}" @if (old('id_SCat') == $scat->id_SCat) selected @endif>
                                        {{ $scat->SCatName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}

                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="id_Sj" style="font-style: italic;">Sujet:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <select name="id_Sj" id="id_Sj" class="custom-select">
                                @foreach ($sujets as $sj)
                                    <option value="{{ $sj->id_Sj }}" @if (old('id_Sj') == $sj->id_Sj) selected @endif>
                                        {{ $sj->SjName }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        @error('id_Sj')
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
