@extends('master.layout')

@section('title', 'e-learning')

@section('content')

    {{-- <!-- Jumbotron -->
    <div class="bg-image p-5 text-center shadow-1-strong rounded     text-white"
        style="background-image: url('{{ asset('storage/images/background.jpg') }}');">
        <h1 class="mb-3 h2">Jumbotron</h1>

        <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus praesentium
            labore accusamus sequi, voluptate debitis tenetur in deleniti possimus modi voluptatum
            neque maiores dolorem unde? Aut dolorum quod excepturi fugit.
        </p>
    </div>
    <!-- Jumbotron --> --}}

<!-- Background image -->
<div
  class="bg-image d-flex justify-content-center align-items-center"
  style="
    background-image:  url('{{ asset('storage/images/background.jpg') }}');
    height: 100vh;
  "
>
  <h1 class="text-white">Page title</h1>
</div>
<!-- Background image -->
@endsection
