@extends('master.layout')

@section('title', 'cour')
@section('content')
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid justify-content-center align-items-center">
                    <div class="text center bg-white p-5 pb-3  rounded">
                        @if (auth()->user()->roles->contains('role_name', 'client'))
                            <form action="{{ route('sendEmail', $id) }}" id="">
                                @csrf
                                <div class="form-group row ps-5 pe-5 ms-5 justify-content-center">
                                    @php $counter = 1; @endphp
                                    @foreach ($certQues as $Que)
                                        <div class="col-12 mt-2 mb-4">
                                            <h3>Question {{ $counter }} </h3>
                                            <hr>
                                            <div class=" mb-3">
                                                <span for="question" style="font-style: italic;">
                                                    {{ $Que->question }} ?
                                                </span>
                                            </div>
                                            @if ($Que->reponse->isNotEmpty())
                                                <div
                                                    class="form-outline  mb-2 d-flex justify-content-center align-items-center flex-wrap">
                                                    @foreach ($Que->reponse as $reponse)
                                                        <span class="d-inline-block col-12">
                                                            <input type="radio" id="{{ $reponse->id_R }}"
                                                                name="{{ $Que->question }}" value="{{ $Que->question }}">
                                                            <label id="label{{ $reponse->id_R }}" for="{{ $reponse->id_R }}"
                                                                name="{{ $Que->question }}">
                                                                {{ $reponse->reponse }}
                                                            </label>
                                                        </span>
                                                    @endforeach
                                                </div>
                                            @else
                                                <div class="mb-3">
                                                    <label for="textAR" class="form-label">Response:</label>
                                                    <textarea class="form-control" name="{{ $Que->question }}" rows="3"></textarea>
                                                </div>
                                            @endif

                                        </div>
                                        @php $counter++; @endphp
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group text-start mt-3">
                                            <div id="score"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-end justify-content-end">
                                        <div class="form-group  mt-3 ">
                                            <button type="submit" id="valider"
                                                class="btn btn-outline-primary gradient-custom-4 text-body"
                                                style="font-style: italic;">Valider</button>
                                            <button type="button" id="effacer"
                                                class="btn btn-outline-primary gradient-custom-4 text-body"
                                                style="font-style: italic;" hidden>Effacer</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @elseif (auth()->user()->roles->contains('role_name', 'moderateur'))
                            <h1>Valider test pour user : {{ $certP->user->FirstName }} {{ $certP->user->LastName }}</h1>
                            <form id="responseForm"
                                action="{{ route('certificate.validertest', ['id' => $certP->id_CertP, 'idU' => $certP->user->id_U]) }}"
                                >
                                @csrf
                                <div class="form-group row ps-5 pe-5 ms-5 justify-content-center">
                                    @php $counter = 1; @endphp
                                    @foreach ($questions as $index => $question)
                                        <div class="col-12 mt-2 mb-4">
                                            <h3>Question {{ $counter }} </h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-4">
                                                    <span for="question" style="font-style: italic;">
                                                        {{ $question }} ?
                                                    </span>
                                                </div>
                                                <div class="col-4">
                                                    <span for="question" style="font-style: italic;">
                                                        {{ $responses[$index] }}
                                                    </span>
                                                </div>
                                                <div class="col-4">
                                                    <span for="question" style="font-style: italic;">
                                                        <span class="btn btn-white d-inline-block col-6">
                                                            <input type="radio" id="true{{ $question }}"
                                                                name="{{ $question }}" value="true">
                                                            <label id="label{{ $question }}"
                                                                for="true{{ $question }}" name="{{ $question }}">
                                                                true
                                                            </label>
                                                        </span><span class="btn btn-white d-inline-block col-6">
                                                            <input type="radio" id="false{{ $question }}"
                                                                name="{{ $question }}" value="false">
                                                            <label id="label{{ $question }}"
                                                                for="false{{ $question }}" name="{{ $question }}">
                                                                false
                                                            </label>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>


                                        </div>
                                        @php $counter++; @endphp
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group text-start mt-3">
                                            <div id="score"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-end justify-content-end">
                                        <div class="form-group  mt-3 ">
                                            <button type="submit" id="valider"
                                                class="btn btn-outline-primary gradient-custom-4 text-body"
                                                style="font-style: italic;">Valider</button>
                                            <button type="button" id="effacer"
                                                class="btn btn-outline-primary gradient-custom-4 text-body"
                                                style="font-style: italic;" hidden>Effacer</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Content Wrapper -->
    </div>
@endsection
@section('script')
    <script>
        // function calculateCounts() {
        //     let trueCount = 0;
        //     let falseCount = 0;

        //     document.querySelectorAll('input[type="radio"]').forEach(radio => {
        //         if (radio.checked) {
        //             if (radio.value === 'true') {
        //                 trueCount++;
        //             } else if (radio.value === 'false') {
        //                 falseCount++;
        //             }
        //         }
        //     });
        //     // let totalques = falseCount + trueCount;
        //     let totalques = document.querySelectorAll('input[type="radio"]').length / 2;
        //     var resultat = trueCount / totalques;
        //     console.log('resultat:', resultat);
        //     console.log('totalques Count:', totalques);
        //     console.log('True Count:', trueCount);
        //     console.log('False Count:', falseCount);
        // }

        document.getElementById('responseForm').addEventListener('submit', function(event) {
            event.preventDefault();
            // calculateCounts();
            let trueCount = 0;
            let falseCount = 0;

            document.querySelectorAll('input[type="radio"]').forEach(radio => {
                if (radio.checked) {
                    if (radio.value === 'true') {
                        trueCount++;
                    } else if (radio.value === 'false') {
                        falseCount++;
                    }
                }
            });
            let totalques = document.querySelectorAll('input[type="radio"]').length / 2;
            var resultat = trueCount / totalques;
            var url = $(this).attr('action');
            console.log('resultat:', resultat);
            console.log('totalques Count:', totalques);
            console.log('True Count:', trueCount);
            console.log('False Count:', falseCount);
            $.ajax({
                method: 'POST',
                url: url,
                data: {
                    resultat: resultat,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    // $wishlistLink.html('<i class="fa-solid fa-heart"></i>');
                    // $wishlistLink.attr('href', '{{ route('wishlist.index') }}');
                    // $wishlistLink.off('click');
                    // console.log(data);
                    window.location.href = '{{ route("home2") }}';

                },
                error: function(xhr, status, error) {
                    console.error(error);
                    console.error(status);
                    console.error(xhr);
                }
            });
        });
    </script>
@endsection
