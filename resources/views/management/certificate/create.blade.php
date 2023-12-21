@extends('auth.dashboard')
@section('title', 'add certificate')
@section('container-fluid')

    <div class="container ms-2 d-flex justify-content-center align-items-center">
        <div class="text center bg-white p-5 pb-3 mt-5  rounded">
            <form action="{{ route('certificate.store') }}" method="POST">
                @csrf
                <div class="form-group row ps-3 pe-3 ">
                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="certificateName" style="font-style: italic;">certificateName:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <input type="text" name="certificateName" value="{{ old('certificateName') }}" id="certificateName"
                                class="form-control form-control-lg  " style="" />
                        </div>
                        @error('certificateName')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="id_C" style="font-style: italic;">Cours:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <select name="id_C" id="id_C" class="custom-select">
                                <option selected>select Cour</option>
                                @foreach ($cours as $cour)
                                    <option value="{{ $cour->id_C }}" @if (old('id_C') == $cour->id_C) selected @endif>
                                        {{ $cour->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('id_C')
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

