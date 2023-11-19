@section('content')
<style>
.fas.fa-circle {
    font-size: 8px;
}

p {
    font-size: 13px;
}

video {
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
        <h3>Placehorder categorias</h3>
        @forelse ($multimediaItems as $index => $multimediaItem)
        @if ($index % 3 == 0)
        <div class="row">
            @endif

            <div class="col-md-4">
            <a href="{{ route('multimedia.show', $multimediaItem) }}">
                <div class="video-container">
           <video controls width="300" height="200">
    <source src="{{ route('multimedia.stream', $multimediaItem->filepath) }}" type="video/mp4">
    Your browser does not support the video tag.
</video>
        </div>

            <!-- OJO Poner Tumbnail en vez de video -->
                
                <h3>{{ $multimediaItem->title }}</h3>
                <h6>{{__('Usermane')}}</h6>
                <!-- Placeholder -->
            
                <!-- <a href="{{ url('/video/' . $multimediaItem->filepath) }}">Open in Another Page</a> -->

                    <p>2k views <i class="fas fa-circle"></i> {{ $multimediaItem->created_at->diffForHumans() }}</p>
            </div></a>

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


@endsection