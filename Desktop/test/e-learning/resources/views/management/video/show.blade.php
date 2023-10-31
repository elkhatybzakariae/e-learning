@extends('auth.dashboard')

@section('title', 'show video')

@section('container-fluid')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Video</h1>

    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <iframe width="560" height="315" 
                src="https://www.youtube.com/embed/fDCJpLR7oSs?si=JKDDfWzO4Djb0D3c" 
                title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    
@endsection
