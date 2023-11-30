@extends('layouts.app', ['activePage' => 'channel', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim &
UPDIVISION', 'navName' => 'User Profile', 'activeButton' => 'laravel'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="section-image">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="row">





                <div class="col-md-12">
                    <div class="card card-user">
                        <div class="card-image p-5" style="background: #0f0f0f;">

                        </div>
                        <div class="card-body">
                            <div class="author">
                                <a href="#">
                                    <img class="avatar border-gray"
                                        src="{{ asset('light-bootstrap/img/faces/face-3.jpg') }}" alt="...">
                                    <h5 class="title">{{ old('name', auth()->user()->name) }}</h5>
                                </a>
                                <a href="{{ old('email', auth()->user()->email) }}" style="color: #0f0f0f;">
                                    <p class="description">

                                        {{ old('email', auth()->user()->email) }}
                                    </p>
                                </a>
                            </div>
                            <p class="description text-center">
                                {{ __('Description Placehorder') }}

                            </p>
                        </div>
                        <div class="row m-3 align-items-center" style="font-size: 20px;">
                            <a href="#" class="mx-2">Principal</a>
                            <a href="#" class="mx-2">Videos</a>
                            <a href="#" class="mx-2">Community</a>
                            <a href="#" class="mx-2">Playlists</a>
                            <a href="#" class="mx-2">Channels</a>
                          <input type="text" class="ml-auto mr-2 rounded border-secondary " placeholder=" search...">
</div>
                       

                        <hr>
                        <div class="section mt-2 ml-4">
                            @forelse ($videos as $index => $video)
                            @if ($index % 3 == 0)
                            <div class="row">
                                @endif

                                <div class="col-md-4">
                                    <a href="{{ route('multimedia.show', $video) }}">
                                        <div class="video-container"
                                            style="width: 400px; height: 250px; overflow: hidden; background-color: transparent;">
                                            <video muted onmouseover="this.play()"
                                                onmouseout="this.pause();this.currentTime=0;" width="400" height="250">
                                                <source src="{{ route('multimedia.stream', $video->filepath) }}"
                                                    type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                        <h4>{{ $video->title }}</h4>
                                        <h6>{{ $video->user->name }}</h6>
                                        <p>2k views 
                                            {{ $video->created_at->diffForHumans() }}</p>
                                    </a>
                                </div>

                                @if (($index + 1) % 3 == 0 || $loop->last)
                            </div>
                            @endif

                            @if ($loop->last && ($index + 1) % 3 != 0)
                        </div>
                        @endif
                        @empty
                        <p>No hay videos disponibles.</p>
                        @endforelse
                    </div>
                </div>

            </div>
            <hr>
            <div class="button-container ">
                <button href="#" class="btn btn-simple btn-link btn-icon">
                    <i class="fa fa-facebook-square"></i>
                </button>
                <button href="#" class="btn btn-simple btn-link btn-icon">
                    <i class="fa fa-twitter"></i>
                </button>
                <button href="#" class="btn btn-simple btn-link btn-icon">
                    <i class="fa fa-google-plus-square"></i>
                </button>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection