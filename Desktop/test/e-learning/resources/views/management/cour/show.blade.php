@extends('auth.dashboard')
@section('title', 'cours')

@section('container-fluid')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <!-- Video Section (Left) -->
                <div class="col-lg-6 mb-4">
                    <!-- Add your video embed code or video player here -->
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/your-video-id" frameborder="0"
                        allowfullscreen></iframe>
                </div>

                <!-- List Section (Right) -->
                <div class="col-lg-6 mb-4">
                    <ul>
                        <li>List Item 1</li>
                        <li>List Item 2</li>
                        <li>List Item 3</li>
                        <!-- Add more list items as needed -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
