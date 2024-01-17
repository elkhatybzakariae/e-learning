@extends('auth.dashboard')

@section('title', 'edit user role')
@section('container-fluid')

    <div class="container ms-2 d-flex justify-content-center align-items-center">
        <div class="text center bg-white p-5 pb-3 mt-5 rounded mb-5">
            <form action="{{ route('updateuser', $user->id_U) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group row ps-3 pe-3 ">
                    <div class="col-6 col-sm-3 col-form-label d-inline">
                        <label for="id_R" style="font-style: italic;">Role:</label>
                    </div>
                    <div class="col-6 col-sm-9 d-inline  ">
                        <div class="form-outline mb-2 row">
                            @foreach ($roles as $role)
                                <span class="d-inline-block col-12">
                                    <input type="radio" name="id_R" value="{{ old('id_R', $role->id_R) }}" 
                                    @if ($role->id_R=== $user->id_R)  checked @endif>
                                    <label for="">{{ $role->role_name }}</label>
                                </span>
                            @endforeach
                        </div>
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
