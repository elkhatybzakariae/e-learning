@extends('master.layout')

@section('title', 'cour')
@section('style')
    <style>
        .accordion-button {
            --bs-accordion-btn-focus-border-color: transparent;
            --bs-accordion-btn-focus-box-shadow: none;
            --bs-accordion-active-color: inherit;
            --bs-accordion-active-bg: initial;
        }

        .accordion-body {
            padding-top: 0px;
            padding-right: 0px;
            padding-bottom: 0px;
        }

        button[name="video"] {
            --bs-accordion-btn-icon: none;
        }

        div[name="quiz"]:hover {
            background-color: #f0f0f0;
        }

        button[name="certi"] {
            --bs-accordion-btn-icon: none;
        }

        .accordion-header {
            transition: background-color 0.3s;
        }

        .accordion-header:hover .accordion-button {
            background-color: #f0f0f0;
        }


        /* Style for the toggle button */
        #toggleAccordion {
            margin-bottom: 0px;
            padding: 8px 16px;
            background-color: #f0f0f0;
            color: #333;
            border: 1px solid #ccc;
            border-radius: 5px 5px 0px 0px;
            cursor: pointer;
        }

        #toggleAccordion:hover {
            background-color: #e0e0e0;
        }

        /* Style for the expanded button */
        #toggleAccordion.sticky {
            position: fixed;
            top: 23%;
            right: 20px;
            transform: translateY(-50%);
            background-color: transparent;
            color: azure;
            border-radius: 5px 0px 0px 5px;
        }

        #videocontent.expanded {
            width: 100%;
        }


        .sticky {
            position: relative;
            transition: width 3s ease;
        }

        .sticky::after {
            content: " Contenu cour";
            font-style: italic;
            margin-left: 10px;
            width: 0;
            overflow: hidden;
            white-space: nowrap;
            display: inline-block;
            transition: width 3s ease;
        }

        .sticky:hover::after {
            width: 100px;
            background-color: transparent;
        }
    </style>
@endsection
@section('content')
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('master.navbar')
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row">
                                <!-- Video Section (Left) -->
                                <div class="col-lg-8 mb-4 pr-0" id="videocontainer">
                                    <div id="videocontent">
                                        <img class="card-img-top" id="img" data-hidden-id='{{ $cour->id_C }}'
                                            style="width: 100%; height: 500px;"
                                            src="{{ asset('storage/' . $cour->photo) }}">
                                    </div>
                                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                        <a class="navbar-brand ms-2" href="#">{{ $cour->title }}</a>
                                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                            data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                                            aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>
                                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                            <div class="navbar-nav">
                                                <a class="nav-item nav-link active" href="#"
                                                    id="presen">Presentation <span class="sr-only">(current)</span></a>
                                                <a class="nav-item nav-link" href="#">Remarques</a>
                                                <a class="nav-item nav-link" href="#">Avis</a>
                                                {{-- <div class="progress-bars">
                                                    <h2>85%</h2>
                                                </div><!--progress-bars--> --}}
                                            </div>
                                        </div>
                                    </nav>
                                    <div id="details">

                                    </div>
                                </div>
                                <!-- List Section (Right) -->
                                <div class="col-lg-4 mb-4 ps-0" id="courdetails">
                                    <div class="d-flex justify-content-between align-items-center" id="toggleAccordion">
                                        <span class="flex-grow-1 fst-italic fs-4">
                                            Contenu cour
                                        </span>
                                        <sub class=" fst-italic" id="sub">
                                        </sub>
                                        <i id="toggle" class="fa-solid fa-xmark"></i>
                                    </div>
                                    <div class="accordion accordion-flush border-start border-top border-bottom">
                                        @php $sectcounter = 1; @endphp
                                        @foreach ($cour->section as $section)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading{{ $section->id_Sec }}">
                                                    <button class="accordion-button fst-italic collapsed fs-5"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapse{{ $section->id_Sec }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapse{{ $section->id_Sec }}">
                                                        Section {{ $sectcounter }} : {{ $section->Sec_Name }} .
                                                        @php
                                                            echo '<sub>' . count($section->session) . ' sessions</sub   >';
                                                        @endphp

                                                    </button>
                                                </h2>
                                                <div id="collapse{{ $section->id_Sec }}" class="accordion-collapse collapse"
                                                    aria-labelledby="heading{{ $section->id_Sec }}"
                                                    data-bs-parent="#accordionPanelsStayOpenExample">
                                                    <div class="accordion-body ">
                                                        @php $sesscounter = 1; @endphp
                                                        @foreach ($section->session as $session)
                                                            <div class="accordion accordion-flush" id="">
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header"
                                                                        id="heading{{ $session->id_Sess }}">
                                                                        <button
                                                                            class="accordion-button fst-italic collapsed fs-6"
                                                                            type="button" data-bs-toggle="collapse"
                                                                            data-bs-target="#collapse{{ $session->id_Sess }}"
                                                                            aria-expanded="false"
                                                                            aria-controls="collapse{{ $session->id_Sess }}">
                                                                            Session {{ $sesscounter }} :
                                                                            {{ $session->Sess_Name }} .
                                                                            @php
                                                                                echo ' <sub> ' . count($session->video) . ' video</sub   >';
                                                                            @endphp
                                                                        </button>
                                                                    </h2>
                                                                    <div id="collapse{{ $session->id_Sess }}"
                                                                        class="accordion-collapse collapse"
                                                                        aria-labelledby="heading{{ $session->id_Sess }}"
                                                                        data-bs-parent="#collapse{{ $section->id_Sec }}">
                                                                        <div class="accordion-body">
                                                                            @php $counter = 1; @endphp
                                                                            @foreach ($session->video as $video)
                                                                                <div class="accordion accordion-flush"
                                                                                    id="">
                                                                                    <div class="accordion-item d-flex">
                                                                                        <input class="form-check-input"
                                                                                            style="margin-top: 20px;"
                                                                                            type="checkbox" name="videoT"
                                                                                            value="{{ $video->id_V }}"
                                                                                            id="{{ $video->id_V }}"
                                                                                            @foreach ($video->videoterminer as $videoterminer)
                                                                                            @if ($videoterminer->terminer === 1) checked @endif @endforeach>
                                                                                        <h2 class="accordion-header flex-grow-1"
                                                                                            id="heading{{ $video->id_V }}">
                                                                                            <button
                                                                                                class="accordion-button fst-italic collapsed"
                                                                                                type="button"
                                                                                                name="video"
                                                                                                data-id="{{ $video->id_V }}"
                                                                                                data-lien="{{ $video->lien }}">
                                                                                                {{ $counter }}.{{ $video->title }}
                                                                                            </button>
                                                                                        </h2>
                                                                                        @if (count($video->media) > 0)
                                                                                            <div class="dropdown mt-2">
                                                                                                <button
                                                                                                    class="btn btn-secondary fst-italic dropdown-toggle"
                                                                                                    type="button"
                                                                                                    data-bs-toggle="dropdown"
                                                                                                    aria-expanded="false">
                                                                                                    Ressources
                                                                                                </button>
                                                                                                <ul class="dropdown-menu">
                                                                                                    @foreach ($video->media as $media)
                                                                                                        <li><a class="dropdown-item fst-italic"
                                                                                                                href="{{ route('file.download', $media->id_M) }}">{{ $media->mediaName }}</a>
                                                                                                        </li>
                                                                                                    @endforeach
                                                                                                </ul>
                                                                                            </div>
                                                                                        @endif

                                                                                    </div>

                                                                                </div>
                                                                                @php $counter++; @endphp
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @if ($section->quiz)
                                                                    <div class="accordion-item p-3" name='quiz'>
                                                                        <h6 class="accordion-header">
                                                                            <a class="dropdown-item fst-italic ps-3"
                                                                                type="button"
                                                                                href="{{ route('quiz.passer', $section->quiz->id_Q) }}">Quiz
                                                                                :
                                                                                {{ $section->quiz->quizName }}</a>
                                                                        </h6>
                                                                    </div>
                                                                @endif
                                                            </div>

                                                            @php $sesscounter++; @endphp
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                            @php $sectcounter++; @endphp
                                        @endforeach
                                        @if ($cour->certificate)
                                            <div class="accordion-item">
                                                @foreach ($cour->certificate as $certificate)
                                                    <h2 class="accordion-header" id="heading{{ $certificate->id_Cert }}">
                                                        <button class="accordion-button collapsed " type="button"
                                                            data-bs-toggle="collapse" name="certi"
                                                            data-bs-target="#collapse{{ $certificate->id_Cert }}"
                                                            aria-expanded="false"
                                                            aria-controls="collapse{{ $certificate->id_Cert }}">
                                                            <a class="dropdown-item fst-italic" href="#"> Certificat
                                                                :
                                                                {{ $certificate->certificateName }}</a>
                                                        </button>
                                                    </h2>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Footer -->
            @include('master.footer')
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->

    </div>


@endsection

@section('script')
    <script>
        function progress() {
            const id = $('#img').data('hidden-id');
            const url = "{{ route('videoTerminer.progress') }}";
            $.ajax({
                url: url,
                method: 'GET',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#sub').html(response.videoTerminerCount + ' sur ' + response.videoCount + ' terminé.')

                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }

        $(document).ready(function() {
            progress();
            $('[name="video"]').on('click', function(params) {
                $('#videocontent').html(`
                    <iframe width="100%" height="500" 
                     src="https://www.youtube.com/embed/${$(this).data('lien')}"
                     frameborder="0" allowfullscreen></iframe>
                 `);
            })
            $('#toggleAccordion').on('click', function() {
                $('#courdetails .accordion').toggle();
                $('#toggleAccordion').toggleClass('sticky');
                $('#videocontainer').toggleClass('col-lg-12');

                const isVisible = $('.accordion').is(':visible');
                const iconClass = isVisible ? 'fa-solid fa-xmark' : 'fa-solid fa-arrow-left';
                const span = isVisible ? 'Contenu cour  ' : '';

                $('#toggleAccordion i').removeClass().addClass('fas ' + iconClass);
                $('#toggleAccordion span').text(span);
            });
            $('#presen').on('click', function(e) {
                e.preventDefault();
                const courDes =
                    `<h5 class='p-1'>À propos de ce cours</h5><div class='p-3'>{{ $cour->description }}</div>`;
                $('#details').html(courDes);
            });
            $('[name="videoT"]').on('change', function(e) {

                const idV = $(this).attr('id');
                if ($(this).is(':checked')) {
                    const url = "{{ route('videoTerminer.check') }}";
                    $.ajax({
                        url: url,
                        method: 'POST',
                        data: {
                            id: idV,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                        }
                    });
                } else {
                    const url = "{{ route('videoTerminer.delete') }}";
                    $.ajax({
                        url: url,
                        method: 'DELETE',
                        data: {
                            id: idV,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                        }
                    });
                }
                progress();
            });


        });
    </script>
@endsection
