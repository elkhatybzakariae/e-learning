@extends('master.layout')

@section('title', 'login')

@section('content')
    <section>
        <div class="container">
            {{-- <div class="row">
                <div class="col-12 d-flex justify-content-end align-items-center mt-1  pe-5">
                    <div class="d-inline pe-1 me-1">
                        <a class="link-offset-2 link-underline link-underline-opacity-0" style="font-style: italic;">You
                            dont't
                            have an account ?</a>
                    </div>
                    <div class="d-inline mt-1 ">
                        <a href="{{ route('registerpage') }}" class="d-inline text-decoration-none ">
                            <button type="button" class="btn btn-outline-primary" style="font-style: italic;">Sign
                                up</button>
                        </a>
                    </div>
                </div>
            </div> --}}
            <div class="row pt-2 ">
                <div class="col-12 col-md-6">
                    <img src="{{ asset('storage/images/e-learning1.jpg') }}" class="img-fluid">
                </div>
                <div class="col-12 col-md-6 bg-white ">
                    <div class="col-12">
                        <h2 class="text-uppercase text-center mb-3"
                            style="font-size: 1.5rem; color: #007BFF; font-weight: bold; font-style: italic;">
                            Welcome back
                        </h2>
                    </div>
                    <div class="col-12">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group row mt-5">
                                <label for="form3Example3cg" class="col-sm-2 col-form-label"
                                    style="font-style: italic;">Email:</label>
                                <div class="col-sm-10">
                                    <div class="form-outline mb-3">
                                        <input type="email" name="Email" id="form3Example3cg"
                                            class="form-control form-control-lg" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="form3Example4cg" class="col-sm-2 col-form-label"
                                    style="font-style: italic;">Password:</label>
                                <div class="col-sm-10">
                                    <div class="form-outline mb-3">
                                        <input type="password" name="Password" id="form3Example4cg"
                                            class="form-control form-control-lg" />
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit"
                                    class="btn btn-outline-primary btn-block btn-lg gradient-custom-4 text-body"
                                    style="font-style: italic;">Sign in</button>
                            </div>
                            <hr class="my-4">
                            {{-- <div class="d-flex justify-content-center">
                                <button class="btn btn-lg btn-block btn-primary"
                                    style="background-color: #0c329a; font-style: italic;" type="submit">
                                    <i
                                        class="fab fa-google me-2"></i><a href="{{route('google')}}"> Sign in with google </a> </button>

                            </div> --}}
                            <div class="d-flex justify-content-center row">
                                <button class="btn btn-lg btn-block btn-primary col-12"
                                    style="background-color: #0c329a; font-style: italic;" type="submit"><i
                                        class="fab fa-google me-2"></i><a href="{{ route('google') }}"> Sign up with
                                        google</a></button>
                                <button class="btn btn-lg btn-block btn-dark col-12"
                                    style="text-color:white;font-style: italic;" type="submit"><i
                                        class="fa-brands fa-github"></i>
                                    <a href="{{ route('github') }}"> Sign up with
                                        github</a></button>
                            </div>
                            {{-- <hr class="my-4">
                        <p class="text-center text-muted mt-3 mb-0" style="font-style: italic;">Have already an account?
                            <a href="#!" class="fw-bold text-body"><u>Login here</u></a>
                        </p> --}}

                            <hr class="my-2">
                            <p class="text-center text-muted mt-2 pb-0" style="font-style: italic;">Create an account?
                                <a href="{{ route('registerpage') }}" class="fw-bold text-body"><u>register here</u></a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
