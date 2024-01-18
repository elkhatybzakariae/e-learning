@extends('master.layout')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="text-center">
            <!-- 404 Error Text -->
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">Page Not Found</p>
            <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
            <a href="{{ route('home2') }}">&larr; Back to Dashboard</a>
        </div>
    </div>
</div>
@endsection
