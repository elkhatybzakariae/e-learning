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
            /* Transition for smooth color change */
        }

        .accordion-header:hover .accordion-button {
            background-color: #f0f0f0;
            /* Change background color on hover */
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
            z-index: 9999;
        }

        #videocontent.expanded {
            width: 100%;
        }


        .sticky {
            background-color: rgba(8, 6, 6, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 10px;
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
                                <div class="col-lg-8 mb-4" id="videocontent">
                                    <img class="card-img-top" style="width: 100%; height: 70%;"
                                        src="{{ asset('storage/images/' . $cour->sujet->souscategorie->categorie->CatName . '.jpg') }}">
                                    <h1>{{ $cour->title }}</h1>
                                </div>
                                <!-- List Section (Right) -->
                                <div class="col-lg-4 mb-4" id="courdetails">
                                    {{-- <button class="btn btn-white" id="toggleAccordion">
                                        <i class="fa-solid fa-eye-slash"></i>
                                    </button> --}}
                                    <div class="" id="toggleAccordion">
                                        <span>
                                            Contenu cour
                                        </span>
                                        <i id="toggle" class="fa-solid fa-xmark"></i>
                                    </div>
                                    <div class="accordion accordion-flush border-start border-top border-bottom">

                                        @foreach ($cour->section as $section)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading{{ $section->id_Sec }}">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse{{ $section->id_Sec }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapse{{ $section->id_Sec }}">
                                                        {{ $section->Sec_Name }}
                                                    </button>
                                                </h2>
                                                <div id="collapse{{ $section->id_Sec }}"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="heading{{ $section->id_Sec }}"
                                                    data-bs-parent="#accordionPanelsStayOpenExample">
                                                    <div class="accordion-body ">
                                                        @foreach ($section->session as $session)
                                                            <div class="accordion accordion-flush" id="">
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header"
                                                                        id="heading{{ $session->id_Sess }}">
                                                                        <button class="accordion-button collapsed"
                                                                            type="button" data-bs-toggle="collapse"
                                                                            data-bs-target="#collapse{{ $session->id_Sess }}"
                                                                            aria-expanded="false"
                                                                            aria-controls="collapse{{ $session->id_Sess }}">
                                                                            {{ $session->Sess_Name }}
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
                                                                                        <h2 class="accordion-header flex-grow-1"
                                                                                            id="heading{{ $video->id_V }}">
                                                                                            <button
                                                                                                class="accordion-button collapsed"
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
                                                                                                    class="btn btn-secondary dropdown-toggle"
                                                                                                    type="button"
                                                                                                    data-bs-toggle="dropdown"
                                                                                                    aria-expanded="false">
                                                                                                    Ressources
                                                                                                </button>
                                                                                                <ul class="dropdown-menu">
                                                                                                    @foreach ($video->media as $media)
                                                                                                        <li><a class="dropdown-item"
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
                                                                            <a class="dropdown-item ps-3" type="button"
                                                                                href="{{ route('quiz.passer', $section->quiz->id_Q) }}">Quiz
                                                                                :
                                                                                {{ $section->quiz->quizName }}</a>
                                                                        </h6>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @if ($cour->certificate)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header"
                                                    id="heading{{ $cour->certificate->id_Cert }}">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" name="certi"
                                                        data-bs-target="#collapse{{ $cour->certificate->id_Cert }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapse{{ $cour->certificate->id_Cert }}">
                                                        <a class="dropdown-item" href="#"> Certificat :
                                                            {{ $cour->certificate->certificateName }}</a>
                                                    </button>
                                                </h2>
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
        $(document).ready(function() {
            $('[name="video"]').on('click', function(params) {
                $('#videocontent').html(`
                    <iframe width="100%" height="500" 
                     src="https://www.youtube.com/embed/${$(this).data('lien')}"
                     frameborder="0" allowfullscreen></iframe>
                 `);
            })
            // $('#toggleAccordion').click(function() {
            //     $('.accordion').slideToggle(function() {
            //         const isVisible = $('.accordion').is(':visible');
            //         const iconClass = isVisible ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye';
            //         $('#toggleAccordion i').removeClass().addClass('fas ' + iconClass);
            //         // const isCollapsed = isVisible ? 'Contenu du cours' : '';
            //         // $('#toggleAccordion').text(isCollapsed);
            //         const sideClass = isVisible ? 'col-lg-4 mb-4' : 'col-lg-1 mb-4';
            //         $('#courdetails').removeClass().addClass(sideClass);
            //         const Class = isVisible ? 'col-lg-8 mb-4' : 'col-lg-11 mb-4';
            //         $('#videocontent').removeClass().addClass(Class);
            //     });
            // });
            $('#toggleAccordion').on('click', function() {
                $('#courdetails .accordion').toggle(); 
                $('#toggleAccordion').toggleClass('sticky'); // Toggle sticky class
                $('#videocontent').toggleClass('col-lg-12'); // Expand video content

                const isVisible = $('.accordion').is(':visible');
                const iconClass = isVisible ? 'fa-solid fa-xmark' : 'fa-solid fa-arrow-left';
                // const class = isVisible ? 'glass-effect' :'' ;

                $('#toggleAccordion i').removeClass().addClass('fas ' + iconClass);
                // $('#toggleAccordion').addClass(class);
            });


        });
    </script>
@endsection
