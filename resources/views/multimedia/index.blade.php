@section('content')<style>
    .fas.fa-circle {
        font-size: 8px;
    }

    p {
        font-size: 13px;
    }

    h4 {
        color: #0F0F0F;
    }
    body{
        overflow: hidden;
    }

    .col-2 {
        border: 7px solid #fff;
        border-radius: 25px;
        padding: 10px;
        background: #0f0f0f;
    }

    .col-2:hover {
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
    #container-category {
    white-space: nowrap;
    overflow-x: auto;     

}

</style>
<div class="content">
    <div class="container-fluid ml-5 ">
    <div id="container-category " class="row mb-4 ml-5 text-white text-center  ml-auto">
    @php
        $uniqueCategories = collect();
    @endphp

    @foreach ($multimediaItems as $index => $multimediaItem)
        @if ($multimediaItem->category)
            @php
                $uniqueCategories->put($multimediaItem->category->id, $multimediaItem->category);
            @endphp
        @endif
    @endforeach

    @foreach ($uniqueCategories as $category)
        <div class="col-2 p-2">
            <a href="{{ route('search', ['category' => $category->id]) }}" style="color: #fff; ">{{ $category->name }}</a>
        </div>
    @endforeach
</div>


        @forelse ($multimediaItems as $index => $multimediaItem)
        @if ($index % 3 == 0)
        <div class="row">
            @endif

            <div class="col-md-4" >
            <a href="{{ route('multimedia.show', $multimediaItem) }}">
                <div class="video-container "  style="width: 400px; height: 250px;  background-color: transparent;">
           <video muted onmouseover="this.play()" onmouseout="this.pause();this.currentTime=0;" width="400" height="250">
    <source src="{{ route('multimedia.stream', $multimediaItem->filepath) }}" type="video/mp4">
    Your browser does not support the video tag.
</video>
        </div>

     
                
                <h4>{{ $multimediaItem->title }}</h4>
                <h6>{{ $multimediaItem->user->name}}</h6>
          
            
           

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

<!-- Include Video.js CSS -->
<link href="https://vjs.zencdn.net/7.14.3/video-js.css" rel="stylesheet">

<!-- Include Video.js JS -->
<script src="https://vjs.zencdn.net/7.14.3/video.js"></script>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const videoContainers = document.querySelectorAll('.video-container');
      
        videoContainers.forEach(videoContainer => {
            videoContainer.addEventListener('hover', () => {
                const video = videoContainer.querySelector('video');
                video.play();
            });

            videoContainer.addEventListener('mouseleave', () => {
                const video = videoContainer.querySelector('video');
                video.pause();
                video.currentTime = 0;
            });
        });
    });
</script>
