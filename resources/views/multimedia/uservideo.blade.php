@extends('layouts.app', ['activePage' => 'uservideo', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim &
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
       
        border-radius: 10px; 
        padding: 10px; 
        display: flex;
        justify-content: space-between; 
        align-items: center; 
    }
    .col-2 {
        border: 7px solid #fff; 
        border-radius: 25px; 
        padding: 10px; 
        background: #0f0f0f;
        
    }.col-2:hover {
    background: #2a2a2a;
    cursor: pointer;
}  

    .col-2 a {
        color: #fff;
        text-decoration: none;
        
        width: 100%;
        height: auto; 
        max-width: 100%; 
        display: block;
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
                        <video muted  muted onmouseover="this.play()" onmouseout="this.pause();this.currentTime=0;"  width="400" height="350">
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
                <div>
                <form action="{{ route('multimedia.destroy', $multimediaItem) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn  btn-borrar bg-dark"><i class="fa fa-trash mr-2" aria-hidden="true"></i>Borrar</button>
</form>   <a class="btn btn-editar rounded "  href="{{ route('multimedia.edit', $multimediaItem) }}"><i class="fa fa-edit" aria-hidden="true"></i> Editar</a>
                </div>
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


<link href="https://vjs.zencdn.net/7.14.3/video-js.css" rel="stylesheet">

<script src="https://vjs.zencdn.net/7.14.3/video.js"></script>
@endsection