@extends('auth.dashboard')

@section('title', 'edit video')

@section('container-fluid')
    <div class="container ms-2 d-flex justify-content-center align-items-center">
        <div class="text center bg-white p-5 pb-3 mt-5 rounded">
            <form action="{{ route('video.update', $video->id_V) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group row ps-3 pe-3 ">
                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="title" style="font-style: italic;">video:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <input type="text" name="title" value="{{old('title', $video->title) }}" id="title"
                                class="form-control form-control-lg  " style="" />
                        </div>
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="aboutVideo" style="font-style: italic;">about Video:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <input type="text" name="aboutVideo" value="{{ old('aboutVideo', $video->aboutVideo) }}" id="aboutVideo"
                                class="form-control form-control-lg  " style="" />
                        </div>
                        @error('aboutVideo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="lien" style="font-style: italic;">Video lien:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <input type="text" name="lien" value="{{ old('lien', $url.$video->lien) }}" id="lien"
                                class="form-control form-control-lg  " style="" />
                        </div>
                        @error('lien')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="id_V" style="font-style: italic;">Section :</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <select name="id_V" id="id_V" class="custom-select">
                                    <option value="{{ $video->id_V }}">
                                        {{ $video->session->Sess_Name }}</option>
                            </select>
                        </div>
                        @error('id_V')
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
