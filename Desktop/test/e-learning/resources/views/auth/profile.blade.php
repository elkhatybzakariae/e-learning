@extends('master.layout')

@section('title', 'Profile')

@section('content')
    <div class="wrapper bg-white center-div" 
        style="
        padding: 30px 50px;
        border: 1px solid #ddd;
        border-radius: 15px;
        margin: 10px auto;
        max-width: 600px;
    ">
        <h4 class="pb-4 border-bottom">Profile settings</h4>
        <form action="{{ route('update', $profile->id_U) }}" method="post" >
            @csrf
            @method('put')
            <div class="py-2 ">
                <div class="row py-2">
                    <div class="col-lg-12 col-sm-12 form-group row">
                        <label for="FirstName" class="col-lg-4 col-sm-12 col-form-label">First Name</label>
                        <div class="col-lg-8 col-sm-12">
                            <input type="text" name="FirstName"  class="form-control bg-light" value="{{ $profile->FirstName }}">
                        </div>
                    </div>
                    
                    <div class="col-lg-12 col-sm-12 form-group row">
                        <label for="lastname" class="col-lg-4 col-sm-12 col-form-label">Last Name</label>
                        <div class="col-lg-8 col-sm-12">
                        <input type="text" name="LastName" class="form-control bg-light" value="{{ $profile->LastName }}">
                        </div>
                    </div>
                    
                    <div class="col-lg-12 col-sm-12 form-group row">
                        <label for="phone" class="col-lg-4 col-sm-12 col-form-label">Phone Number</label>
                        <div class="col-lg-8 col-sm-12">
                        <input type="tel" name="Phone" class="form-control bg-light" value="{{ $profile->Phone }}">
                        </div>
                    </div>
                    
                </div>
                <div class="py-3 pb-4 border-bottom text-end">
                    <button type="submit" class="btn btn-primary mr-3">Save Changes</button>
                </div>
                {{-- <div class="d-sm-flex align-items-center pt-3" id="deactivate">
                    <div>
                        <b>Deactivate your account</b>
                        <p>Details about your company account and password</p>
                    </div>
                    <div class="ml-auto">
                        <button  class="btn danger">Deactivate</button>
                    </div>
                </div> --}}
            </div>
        </form>
    </div>


@endsection
