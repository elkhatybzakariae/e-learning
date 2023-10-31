@extends('auth.dashboard')

@section('title', 'edit media')

@section('container-fluid')
    <div class="container ms-2 d-flex justify-content-center align-items-center">
        <div class="text center bg-white p-5 pb-3 mt-5 rounded">
            <form action="{{ route('media.update', $media->id_M) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group row ps-3 pe-3 ">
                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="mediaName" style="font-style: italic;">media:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <input type="text" name="mediaName" value="{{old('mediaName', $media->mediaName) }}" id="mediaName"
                                class="form-control form-control-lg  " style="" />
                        </div>
                        @error('mediaName')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 col-sm-3 col-form-label d-inline ">
                        <label for="path"  style="font-style: italic;">Choose file :</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline">
                        <div class="col-6 col-sm-9 d-inline custom-file">
                            <input type="file" name="path" value="{{old('path', $media->path)}}" id="path" class="form-control form-control-lg custom-file-input">
                        </div>
                        
                        @error('path')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="id_V" style="font-style: italic;">Video :</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <select name="id_V" id="id_V" class="custom-select">
                                    <option value="{{ $media->id_V }}" >
                                        {{ $media->video->title }}</option>
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
