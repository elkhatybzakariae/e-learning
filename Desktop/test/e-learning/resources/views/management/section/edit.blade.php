@extends('auth.dashboard')

@section('title', 'edit Session')

@section('container-fluid')
    <div class="container ms-2 d-flex justify-content-center align-items-center">
        <div class="text center bg-white p-5 pb-3 mt-5 rounded mb-5">
            <form action="{{ route('section.update',$section->id_Sec) }}" method="POST">
                @csrf
                @method('put')
                
                <div class="form-group row  ">
                    <div class="col-6 col-sm-4 col-form-label d-inline">
                        <label for="Sec_Name" style="font-style: italic;">Section Name:</label>
                    </div>
                    <div class="col-6 col-sm-8 d-inline  ">
                        <div class="form-outline mb-2">
                            <input type="text" name="Sec_Name" value="{{ old('title', $section->Sec_Name) }}" id="Sec_Name"
                                class="form-control form-control-lg  " style="" />
                        </div>
                        @error('Sec_Name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="id_C" style="font-style: italic;">Cour:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <select name="id_C" id="id_C" class="custom-select">
                                {{-- @foreach ($categorie as $cat) --}}
                                    <option value="{{ $section->id_C }}">
                                        {{ $section->cour->title }}</option>
                                {{-- @endforeach --}}
                            </select>
                        </div>
                        @error('id_C')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-group text-end mt-3">
                        <button type="submit" class="btn btn-outline-primary  gradient-custom-4 text-body"
                            style="font-style: italic;">modifier </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

