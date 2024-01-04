@extends('auth.dashboard')
@section('title', 'add question')
@section('container-fluid')
    <div class="container ms-2 d-flex justify-content-center align-items-center">
        <div class="text center bg-white p-5 pb-3 mt-5 rounded">
            <form action="{{ route('testquestion.storeN', $id) }}" method="POST">
                @csrf
                <div class="form-group row ps-3 pe-3 ">
                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="question" style="font-style: italic;">Question:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2">
                            <input type="text" name="question" value="{{ old('question') }}" id="question"
                                class="form-control form-control-lg  " style="" />
                        </div>
                        @error('question')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    {{-- <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="response1" style="font-style: italic;">Response 1 :</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2 row">
                            <span class="d-inline-block col-8">
                                <input type="text" name="responses[0][response_text]"
                                    value="{{ old('responses.0.response_text') }}" id="response1_text"
                                    class="form-control form-control-lg">
                            </span>
                            <span class="d-inline-block col-2">
                                <input type="radio" name="responses[0][is_true]" value="1" id="response1_true">
                                <label for="response1_true">True</label>
                            </span>
                            <span class="d-inline-block col-2">
                                <input type="radio" name="responses[0][is_true]" value="0" id="response1_false">
                                <label for="response1_false">False</label>
                            </span>
                        </div>
                    </div> --}}
                    

                </div>


                <div class="form-group text-end mt-3">
                    <button type="submit" class="btn btn-outline-primary  gradient-custom-4 text-body"
                        style="font-style: italic;">Ajouter </button>
                </div>

            </form>
        </div>
    </div>
@endsection
