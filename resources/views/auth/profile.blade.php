@extends('master.layout')

@section('title', 'Profile')

@section('content')
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                @include('master.navbar')


                <form action="{{ route('update', $profile->id_U) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="wrapper bg-white center-div"
                        style="padding: 30px 50px;border: 1px solid #ddd;border-radius: 15px;margin: 10px auto;max-width: 600px;">
                        <div class="py-2">
                            <h4 class="pb-4 border-bottom">Personal Informations</h4>
                            <div class="row py-2">
                                <div class="col-lg-12 col-sm-12 form-group row">
                                    <label for="FirstName" class="col-lg-4 col-sm-12 col-form-label">Prenom :</label>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="FirstName" class="form-control bg-light"
                                            value="{{ $profile->FirstName }}">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-12 form-group row">
                                    <label for="lastname" class="col-lg-4 col-sm-12 col-form-label">Nom :</label>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="LastName" class="form-control bg-light"
                                            value="{{ $profile->LastName }}">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-12 form-group row">
                                    <label for="Email" class="col-lg-4 col-sm-12 col-form-label">Email :</label>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="email" name="Email" class="form-control bg-light" readonly
                                            value="{{ $profile->Email }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12 form-group row">
                                    <label for="phone" class="col-lg-4 col-sm-12 col-form-label">Telephone :</label>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="tel" name="Phone" class="form-control bg-light"
                                            value="{{ $profile->Phone }}">
                                    </div>
                                </div>

                            </div>
                            {{-- <div class="py-3 pb-4 border-bottom text-end">
                                <button type="submit" class="btn btn-primary mr-3">Save Changes</button>
                            </div> --}}
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
                    </div>
                    <div class="wrapper bg-white center-div"
                        style="padding: 30px 50px;border: 1px solid #ddd;border-radius: 15px;margin: 10px auto;max-width: 600px;">
                        <div class="py-2">
                            <h4 class="pb-4 border-bottom">Profession Informations</h4>
                            <div class="row py-2">
                                <div class="col-lg-12 col-sm-12 form-group row">
                                    <label for="Specialization" class="col-lg-4 col-sm-12 col-form-label">Specialization
                                        :</label>
                                    <div class="col-lg-8 col-sm-12">
                                        <select class="form-select bg-light" name="Specialization" id="Specialization">
                                            <option value="0">Select Specialization </option>

                                        </select>
                                        {{-- value="{{ $profile->Specialization }}" --}}
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-12 form-group row">
                                    <label for="option" class="col-lg-4 col-sm-12 col-form-label">Option :</label>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="text" name="option" id="option" class="form-control bg-light">
                                    </div>
                                </div>

                                {{-- <div class="col-lg-12 col-sm-12 form-group row">
                                    <label for="phone" class="col-lg-4 col-sm-12 col-form-label">Phone Number</label>
                                    <div class="col-lg-8 col-sm-12">
                                        <input type="tel" name="Phone" class="form-control bg-light"
                                            value="{{ $profile->Phone }}">
                                    </div>
                                </div> --}}

                            </div>
                            <div class="py-3 pb-4 border-bottom text-end">
                                <button type="submit" class="btn btn-primary mr-3">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            @include('master.footer')
        </div>
    </div>


@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var info = @json($info);
            var tb = info.split("&");
            if (info) {
                $('#option').val(tb[1]);
            }
            for (let index = 0; index < categories.length; index++) {
                const optionchild =`${(() => {
                        if (categories[index].CatName === tb[0]) {
                            return `<option value="${categories[index].CatName}" selected>${categories[index].CatName}</option>`;
                        } else {
                            return `<option value="${categories[index].CatName}">${categories[index].CatName}</option>`;
                        }
                    })()}`;                    
                $('#Specialization').append(optionchild);
            }
        });
    </script>
@endsection
