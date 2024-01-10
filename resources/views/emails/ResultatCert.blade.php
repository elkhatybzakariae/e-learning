@extends('master.layout')
@section('title', 'Email')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="text-center">
            <p class="lead text-gray-800 mb-1">Salut  !</p>
            <p class="text-gray-500 mb-0">{{$data['message']}}</p>
            <p class="text-gray-500 mb-0">Votre score est :{{$data['resultat']}}</p>
            {{-- <a href="{{ route('certificate.choisircert') }}">&larr; Retour à la page des certificats</a> --}}
        </div>
    </div>
</div>
@endsection
