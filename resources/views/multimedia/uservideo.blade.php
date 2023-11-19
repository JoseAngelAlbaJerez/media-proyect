@extends('layouts.app', ['activePage' => 'user', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim &
UPDIVISION', 'navName' => 'User Profile', 'activeButton' => 'laravel'])

@section('content')
<style>
.fas.fa-circle {
    font-size: 8px;
}

p {
    font-size: 13px;
}

video {
    position: relative;
    left: 0;
    top: 0;
    opacity: 1;
}
#container-category {
       
        border-radius: 10px; /* Ajusta el valor según sea necesario para redondear las esquinas */
        padding: 10px; /* Agrega espacio interno para separar las categorías */
        display: flex;
        justify-content: space-between; /* Distribuye las categorías uniformemente */
        align-items: center; /* Centra verticalmente las categorías */
    }
    .col-2 {
        border: 7px solid #fff; /* Añade un borde para resaltar las categorías */
        border-radius: 25px; /* Redondea las esquinas de las categorías */
        padding: 10px; /* Agrega espacio interno para las categorías */
        background: #0f0f0f;
        
    }.col-2:hover {
    background: #2a2a2a; /* Cambia el color al pasar el cursor sobre la categoría */
    cursor: pointer;
}  

    .col-2 a {
        color: #fff;
        text-decoration: none;
        
        width: 100%; /* Adjust this as needed */
        height: auto; /* Maintain aspect ratio */
        max-width: 100%; /* Ensure video doesn't exceed its container */
        display: block; /* Remove extra space below inline elements */
    }
.video-container {
        position: relative;
        overflow: hidden;
        
    }
</style>
<div class="content">
    <div class="container-fluid">

        @forelse ($multimediaItems as $index => $multimediaItem)
            @if ($index % 3 == 0)
                <div class="row">
            @endif

            <div class="col-md-4">
                <a href="{{ route('multimedia.show', $multimediaItem) }}">
                    <div class="video-container">
                        <video controls width="400" height="350">
                            <source src="{{ route('multimedia.stream', $multimediaItem->filepath) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>

                    <h3>{{ $multimediaItem->title }}</h3>
                    <h6>{{ $multimediaItem->user->name }}</h6>
                    <!-- Placeholder -->

                    <!-- <a href="{{ url('/video/' . $multimediaItem->filepath) }}">Open in Another Page</a> -->

                    <p>2k views <i class="fas fa-circle"></i> {{ $multimediaItem->created_at->diffForHumans() }}</p>
                </a>
            </div>

            @if (($index + 1) % 3 == 0 || $loop->last)
                </div>
            @endif

            @if ($loop->last && ($index + 1) % 3 != 0)
                </div>
            @endif

            <hr>
        @empty
            <p>No hay videos disponibles.</p>
        @endforelse
    </div>
</div>

<!-- Include Video.js CSS -->
<link href="https://vjs.zencdn.net/7.14.3/video-js.css" rel="stylesheet">

<!-- Include Video.js JS -->
<script src="https://vjs.zencdn.net/7.14.3/video.js"></script>
@endsection