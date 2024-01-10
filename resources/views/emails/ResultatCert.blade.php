@extends('master.layout')
@section('title', 'Email')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="text-center">
                <p class="lead text-gray-800 mb-1">Salut 
                    {{-- {{$data['user']['FirstName']}} {{$data['user']['LastName']}} --}}
                    !</p>
                <p class="text-gray-500 mb-0">{{ $data['message'] }}</p>
                <p class="text-gray-500 mb-0">Votre score est :{{ $data['resultat'] }}</p>
                @if ($data['status'] === 'success')
                    {{-- <a href="{{route('certificate.download',$data['user']['id_U'])}}" class="text-gray-500 mb-0">lien pour telecharger votre certificat. </a> --}}
                    <iframe src="data:application/pdf;base64,{{ base64_encode($data['pdf']->output()) }}" width="100%" height="500px"></iframe>
                    <a href="data:application/pdf;base64,{{ base64_encode($data['pdf']->output()) }}" download="certificate.pdf">Download PDF</a>

                @else
                @endif
                {{-- <a href="{{ route('certificate.choisircert') }}">&larr; Retour à la page des certificats</a> --}}
            </div>
        </div>
    </div>
@endsection
