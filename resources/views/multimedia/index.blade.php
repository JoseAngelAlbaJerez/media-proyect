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
</style>
<div class="content">
    <div class="container-fluid">
        <h3>Placehorder categorias</h3>
        @forelse ($multimediaItems as $index => $multimediaItem)
        @if ($index % 3 == 0)
        <div class="row">
            @endif

            <div class="col-md-4">
            <video controls width="100%">
                <source src="{{ route('multimedia.stream', $multimediaItem->filepath) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
                
                <h3>{{ $multimediaItem->title }}</h3>
                <h6>{{__('Usermane')}}</h6>
                <!-- Placeholder -->
                <a href="{{ action('MultimediaController@stream', ['filename' => $multimediaItem->filepath]) }}">Open in Another Page</a>
                <!-- <a href="{{ url('/video/' . $multimediaItem->filepath) }}">Open in Another Page</a> -->

                    <p>2k views <i class="fas fa-circle"></i> {{ $multimediaItem->created_at->diffForHumans() }}</p>
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


@endsection