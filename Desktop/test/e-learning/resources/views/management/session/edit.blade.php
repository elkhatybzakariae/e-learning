@extends('auth.dashboard')

@section('title', 'edit session')

@section('container-fluid')
    <div class="container ms-2 d-flex justify-content-center align-items-center">
        <div class="text center bg-white p-5 pb-3 mt-5 rounded">
            <form action="{{ route('session.update', $session->id_Sess) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group row ps-3 pe-3 ">
                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="Sess_Name" style="font-style: italic;">session:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <input type="text" name="Sess_Name" value="{{old('Sess_Name', $session->Sess_Name) }}" id="Sess_Name"
                                class="form-control form-control-lg  " style="" />
                        </div>
                        @error('Sess_Name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="id_Sec" style="font-style: italic;">Section :</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <select name="id_Sec" id="id_Sec" class="custom-select">
                                    <option value="{{ $session->id_Sec }}" @if ($session->id_Sec === $session->section->id_Sec) selected @endif>
                                        {{ $session->section->Sec_Name }}</option>
                            </select>
                        </div>
                        @error('id_Sec')
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
