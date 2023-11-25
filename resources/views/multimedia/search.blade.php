<!-- resources/views/multimedia/search.blade.php -->
@extends('layouts.app', ['activePage' => 'user', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim &
UPDIVISION', 'navName' => 'User Profile', 'activeButton' => 'laravel'])

@section('content')
<h2>Resultados de búsqueda para "{{ $query }}"</h2>

@forelse ($results as $result)
<div>
<div class="col-md-4" >
            <a href="{{ route('multimedia.show', $result) }}">
                <div class="video-container"  style="width: 400px; height: 250px; overflow: hidden; background-color: #0F0F0F;">
           <video width="400" height="250">
    <source src="{{ route('multimedia.stream', $result->filepath) }}" type="video/mp4">
    Your browser does not support the video tag.
</video>
        </div>
    <h2>{{ $result->title }}</h2>
    <p>{{ $result->description }}</p>
    
    
    <a href="{{ route('multimedia.show', ['multimedia' => $result->id]) }}">Ver Detalles</a>
</div>
@empty
<p>No se encontraron resultados.</p>
@endforelse
@endsection