<!-- resources/views/multimedia/search.blade.php -->
@extends('layouts.app', ['activePage' => 'user', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim &
UPDIVISION', 'navName' => 'User Profile', 'activeButton' => 'laravel'])

@section('content')

<div class="container-fluid">

    @if ($query)
    <h2 class="my-4">Resultados de búsqueda para "{{ $query }}"</h2>
    @elseif ($categoryName)
    <h2 class="my-4">Resultados de la categoría "{{ $categoryName }}"</h2>
    @endif

    <ul class="list-group">
        @forelse ($results as $result)
        <li class="list-group-item mb-3">
            <a href="{{ route('multimedia.show', $result) }}" class="text-decoration-none text-dark">
                <div class="d-flex">
                    <div class="video-container"
                        style="width: 350px; height: 195px; overflow: hidden; background-color: #0F0F0F;">
                        <video width="100%" height="100%">
                            <source src="{{ route('multimedia.stream', $result->filepath) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="ml-3">
                        <h4 id="title">{{ $result->title }}</h4>
                        <p id="description">{{ $result->description }}</p>
                        <a href="{{ route('multimedia.show', ['multimedia' => $result->id]) }}" id="details">Ver
                            Detalles</a>
                    </div>
                </div>
            </a>
        </li>
        @empty
        <li class="list-group-item">
            <p class="my-4">No se encontraron resultados.</p>
        </li>
        @endforelse
    </ul>
</div>

@endsection

<style>
#details {
    color: #0F0F0F;
    font-Weight: bold;
    font-size: 18px;
}
#description{
    font-size: 15px;
    color: #000;
    }
#title{
    color: #0F0F0F;
  
    font-size: 25px;
}
</style>