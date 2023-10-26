@extends('management.index')

@section('title', 'add category')

@section('content')
    <div class="container ms-2 d-flex justify-content-center align-items-center">
        <div class="text center bg-white p-5 pb-3 mt-5 rounded">
            <form action="{{ route('sujet.update', $sujet->id_Sj) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group row ps-3 pe-3 ">
                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="SCatName" style="font-style: italic;">sujet:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <input type="text" name="SjName" value="{{old('SjName', $sujet->SjName) }}" id="SCatName"
                                class="form-control form-control-lg  " style="" />
                        </div>
                        @error('SjName')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="id_SCat" style="font-style: italic;">SousCategorie:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <select name="id_SCat" id="id_SCat" class="custom-select">
                                @foreach ($souscategories as $scat)
                                    <option value="{{ $scat->id_SCat }}" @if ($sujet->id_SCat === $scat->id_SCat) selected @endif>
                                        {{ $scat->SCatName }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('id_SCat')
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
