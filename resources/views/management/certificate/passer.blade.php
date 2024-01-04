@extends('master.layout')

@section('title', 'cour')
@section('content')
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid justify-content-center align-items-center">
                    <div class="text center bg-white p-5 pb-3  rounded">
                        <form action="{{route('sendEmail')}}" id="">
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
                                                            name="responses{{ $Que->id_Que }}"
                                                            value="{{ $reponse->id_R }}">
                                                        <label id="label{{ $reponse->id_R }}" for="{{ $reponse->id_R }}"
                                                            name="responses{{ $Que->id_Que }}">
                                                            {{ $reponse->reponse }}
                                                        </label>
                                                    </span>
                                                @endforeach
                                            </div>
                                        @else
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1"
                                                    class="form-label">Response:</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Content Wrapper -->
    </div>
@endsection
