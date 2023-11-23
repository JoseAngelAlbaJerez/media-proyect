@extends('layouts.app', ['activePage' => 'welcome', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION'])

@section('content')
    <div class="full-page section-image">
        <div class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-8">
                        @foreach ($videos as $video)
                            <div class="row mb-4">
                                <div class="col-12">
                                    <div class="d-flex align-items-center">
                                        <img src="https://dictionary.cambridge.org/images/thumb/circle_noun_001_02738.jpg?version=5.0.357"
                                             width="50" height="47" alt="">
                                        <div class="ml-3">
                                            <h3>{{ $video->title }}</h3>
                                            <h6>{{ $video->user->name}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="video-container">
                                        <video class="video-js mb-5" controls width="700" height="400">
                                            <source src="{{ route('multimedia.stream', $video->filepath) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            demo.checkFullPageBackgroundImage();

            setTimeout(function () {
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700)
        });
    </script>
@endpush
