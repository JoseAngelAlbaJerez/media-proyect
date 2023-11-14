@section('content')
<style>
    .fas.fa-circle {
    font-size: 8px;
}
p{
    font-size: 13px;
}
video{
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
                    <video width="420" height="260" controls class="border-radius">
                        <source src="{{ asset($multimediaItem->filepath) }}" type="video/mkv">
                        Your browser does not support the video tag.
                    </video>
                    <h4>{{ $multimediaItem->title }}</h3>
                 
                    <p >2k views   <i class="fas fa-circle" ></i> {{ $multimediaItem->created_at->diffForHumans() }}</p>
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

