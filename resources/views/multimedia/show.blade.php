@extends('layouts.app', ['activePage' => 'user', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim &
UPDIVISION', 'navName' => 'User Profile', 'activeButton' => 'laravel'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                {{-- Video Player --}}
                <div class="embed-responsive embed-responsive-16by9">
                <div class="video-container">
    <video controls>
    <source src="{{ route('multimedia.stream', $multimediaItem->filepath) }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>
                </div>

                {{-- Video Description --}}
                <div class="mt-4">
                    <h3>Video Description</h3>
                    <p>Your video description goes here. You can provide details about the content of the video, its purpose, and any other relevant information.</p>
                </div>
            </div>
            <div class="col-md-4">
                {{-- Other content in the right column --}}
            </div>
        </div>
    </div>
</div>
@endsection