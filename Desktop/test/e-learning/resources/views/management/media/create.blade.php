@extends('auth.dashboard')

@section('title', 'add media')

@section('container-fluid')
    <div class="container ms-2 d-flex justify-content-center align-items-center">
        <div class="text center bg-white p-5 pb-3 mt-5 rounded">
            <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row ps-3 pe-3 ">
                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="mediaName" style="font-style: italic;">media name:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <input type="text" name="mediaName" value="{{ old('mediaName') }}" id="mediaName"
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
                            <input type="file" name="path" id="path" class="form-control form-control-lg custom-file-input">
                        </div>
                        
                        @error('path')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="id_C" style="font-style: italic;">Cours :</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <select name="id_C" id="id_C" class="custom-select">
                                <option selected>select Cour </option>
                                @foreach ($cours as $cour)
                                    <option value="{{ $cour->id_C }}" @if (old('id_C') == $cour->id_C) selected @endif>
                                        {{ $cour->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="id_SCat" style="font-style: italic;">Sections :</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <select name="id_Sec" id="id_Sec" class="custom-select">
                                <option selected>select section</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="id_Sess" style="font-style: italic;">Sessions :</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <select name="id_Sess" id="id_Sess" class="custom-select">
                                <option selected>select Session</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="id_V" style="font-style: italic;">Video :</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <select name="id_V" id="id_V" class="custom-select">
                                <option selected>select Video</option>
                            </select>
                        </div>
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
    <script>
        $(document).ready(function() {
            $('#id_C').on('change', function() {
                var courId = $(this).val();
                if (courId) {
                    $('#id_Sec').empty();
                    $('#id_Sec').append('<option selected>select Section</option>');

                    $.each(sections, function(index, section) {
                        if (section.id_C == courId) {
                            $('#id_Sec').append('<option value="' + section.id_Sec + '">' + section
                                .Sec_Name + '</option>');
                        }
                    });
                } else {
                    $('#id_Sec').empty();
                    $('#id_Sec').append('<option selected>select Section</option>');
                }
            });
            $('#id_Sec').on('change', function() {
                var selectedSub = $(this).val();
                var filteredsessions = sessions.filter(function(session) {
                    return session.id_Sec == selectedSub;
                });

                var sessionsSelect = $('#id_Sess');
                sessionsSelect.empty();
                sessionsSelect.append('<option value="" selected>select Session</option>');
                filteredsessions.forEach(function(session) {
                    sessionsSelect.append('<option value="' + session.id_Sess + '">' + session
                        .Sess_Name + '</option>');
                });
            });
            $('#id_Sess').on('change', function() {
                var selectedSubSess = $(this).val();
                var filteredvideos = video.filter(function(vid) {
                    return vid.id_Sess == selectedSubSess;
                });

                var videosSelect = $('#id_V');
                videosSelect.empty();
                videosSelect.append('<option value="" selected>select Video</option>');
                filteredvideos.forEach(function(vid) {
                    videosSelect.append('<option value="' + vid.id_V + '">' + vid
                        .title + '</option>');
                });
            });
        });
    </script>
@endsection
