@extends('master.layout')
@section('title', 'Register')
@section('content')
    <section class="">
        <div class="container ">
            {{-- <div class="row">
                <div class="col-12 d-flex justify-content-end align-items-center mt-1  pe-5">
                    <div class="d-inline pe-1 me-1">
                        <a class="link-offset-2 link-underline link-underline-opacity-0" style="font-style: italic;">Already
                            have an account ?</a>
                    </div>
                    <div class="d-inline mt-1 ">
                        <a href="{{ route('loginpage') }}" class="d-inline text-decoration-none ">
                            <button type="button" class="btn btn-outline-primary" style="font-style: italic;">Sign
                                in</button>
                        </a>
                    </div>
                </div>
            </div> --}}
            <div class="row  pt-2 d-flex">
                <div class="col-12 col-md-6  flex-fill">
                    <img src="{{ asset('storage/images/e-learning1.jpg') }}" class="img-fluid">
                </div>
                <div class="col-12 col-md-6 bg-white flex-fill " >
                    <div class="col-12">
                        <h2 class="text-uppercase text-center mb-3"
                            style="font-size: 1.5rem; color:#0c329a; font-weight: bold; font-style: italic;">
                            Welcome to our website
                        </h2>
                    </div>
                    <div class="pt-3">
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-group row ps-5 pe-5 ">
                                <div class="col-6 col-sm-3 col-form-label d-inline">
                                    <label for="form3Example1cg" style="font-style: italic;">First Name:</label>
                                </div>
                                <div class="col-6 col-sm-9 d-inline  ">
                                    <div class="form-outline mb-2">
                                        <input type="text" name="FirstName" id="form3Example1cg"
                                            class="form-control form-control-lg  " style="" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row ps-5 pe-5">
                                <div class="col-6 col-sm-3 col-form-label d-inline">
                                    <label for="form3Example2cg" style="font-style: italic;">Last Name:</label>
                                </div>
                                <div class="col-6 col-sm-9 d-inline  ">
                                    <div class="form-outline mb-2">
                                        <input type="text" name="LastName" id="form3Example2cg" style=""
                                            class="form-control form-control-lg" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row ps-5 pe-5">
                                <div class="col-6 col-sm-3 col-form-label d-inline">
                                    <label for="form3Example3cg" style="font-style: italic;">Email:</label>
                                </div>
                                <div class="col-6 col-sm-9 d-inline  ">
                                    <div class="form-outline mb-2">
                                        <input type="email" name="Email" id="form3Example3cg" style=""
                                            class="form-control form-control-lg" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row ps-5 pe-5">
                                <div class="col-6 col-sm-3 col-form-label d-inline">
                                    <label for="form3Example4cg" style="font-style: italic;">Phone:</label>
                                </div>
                                <div class="col-6 col-sm-9 d-inline  ">
                                    <div class="form-outline mb-2">
                                        <input type="text" name="Phone" id="form3Example4cg" style=""
                                            class="form-control form-control-lg" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row ps-5 pe-5">
                                <div class="col-6 col-sm-3 col-form-label d-inline">
                                    <label for="form3Example5cg" style="font-style: italic;">type :</label>
                                </div>
                                <div class="col-6 col-sm-9 d-inline  ">
                                    {{-- <div class="form-outline mb-2">
                                        <input type="radio" name="type" id="form3Example5cg" style=""
                                            class="form-control form-control-lg" />
                                        <input type="radio" name="type" id="form3Example5cg" style=""
                                            class="form-control form-control-lg" />

                                    </div> --}}
                                    <div class="form-outline mb-2 mt-2">
                                        @foreach ($roles as $role)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="type"
                                                    id="{{ $role->id_R }}" value="{{ $role->id_R }}" />
                                                <label class="form-check-label"
                                                    for="{{ $role->id_R }}">{{ $role->role_name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row ps-5 pe-5">
                                <div class="col-6 col-sm-3 col-form-label d-inline">
                                    <label for="form3Example6cg" style="font-style: italic;">Password:</label>
                                </div>
                                <div class="col-6 col-sm-9 d-inline  ">
                                    <div class="form-outline mb-2">
                                        <input type="password" name="Password" id="form3Example6cg" style=""
                                            class="form-control form-control-lg" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row ps-5 pe-5">
                                <div class="col-6 col-sm-3 col-form-label d-inline">
                                    <label for="form3Example7cdg" style="font-style: italic;">Repeat
                                        Password:</label>
                                </div>
                                <div class="col-6 col-sm-9 d-inline  ">
                                    <div class="form-outline mb-2">
                                        <input type="password" name="Confirm_password" id="form3Example7cdg" style=""
                                            class="form-control form-control-lg" />
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit"
                                    class="btn btn-outline-primary btn-block btn-lg gradient-custom-4 text-body"
                                    style="font-style: italic;">Sign up</button>
                            </div>
                            <hr class="my-4">
                            <div class="d-flex justify-content-center">
                                <a href="{{ url('auth/google') }}" class="btn btn-google">Sign up with Google</a>

                                <button class="btn btn-lg btn-block btn-primary"
                                    style="background-color: #0c329a; font-style: italic;" type="submit"><i
                                        class="fab fa-google me-2"></i><a href="{{route('google')}}"> Sign up with google</a></button>
                            </div>
                            <hr class="my-2">
                            <p class="text-center text-muted mt-2 mb-0" style="font-style: italic;">Have already an
                                account?
                                <a href="{{ route('loginpage') }}" class="fw-bold text-body"><u>Login here</u></a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
