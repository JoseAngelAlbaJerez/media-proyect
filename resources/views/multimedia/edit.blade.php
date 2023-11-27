@extends('layouts.app', ['activePage' => 'user', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim &
UPDIVISION', 'navName' => 'User Profile', 'activeButton' => 'laravel'])


<script>
// document.addEventListener("DOMContentLoaded", function () {
//     const videoInput = document.querySelector('input[name="filepath"]');
//     const videoPreview = document.getElementById('video-preview');
//     const videoSource = document.getElementById('video-source');

//     videoInput.addEventListener('change', function (event) {
//         const file = event.target.files[0];

//         if (file) {
//             const url = URL.createObjectURL(file);
//             videoSource.src = url;
//             videoPreview.load();
//             videoPreview.style.display = 'block';
//         } else {
//             videoPreview.style.display = 'none';
//         }
//     });
// });
</script>

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="section-image">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="row">

                <div class="card col-md-8">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h3 class="mb-0">{{ __('Editar Video') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('multimedia.update', ['id' => $multimediaItem->id]) }}"
                            autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <h6 class="heading-small text-muted mb-4">{{ __('Información del Video') }}</h6>

                            @include('alerts.success')


                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">
                                        <i class="w3-xxlarge fa fa-heading"></i>{{ __('Titulo') }}
                                    </label>
                                    <input type="text" name="title" id="input-title"
                                        class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                        value="{{ old('title', $multimediaItem->title) }}" required autofocus>


                                    @include('alerts.feedback', ['field' => 'title'])
                                </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-description"><i
                                            class="w3-xxlarge fa fa-info"></i>{{ __('Descripción') }}</label>
                                    <textarea name="description" id="input-description"
                                        class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                        required>{{ old('description', $multimediaItem->description) }}</textarea>
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                                <div class="form-group{{ $errors->has('category') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-category">
                                        <i class="w3-xxlarge fa fa-th-large"></i>{{ __('Categoria') }}
                                    </label>

                                    <select name="category" id="input-category"
                                        class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}"
                                        required>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                    @include('alerts.feedback', ['field' => 'category'])
                                </div>
                                <div class="form-group{{ $errors->has('file') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-filepath">
                                        <i class="w3-xxlarge fa fa-play"></i>{{ __('Video') }}
                                    </label>

                                    @if (!$multimediaItem->filepath)
                                    <input type="file" name="filepath" id="input-filepath"
                                        class="form-control{{ $errors->has('filepath') ? ' is-invalid' : '' }}"
                                        onchange="previewVideo(this)">
                                    @else
                                    <input type="hidden" name="current_filepath"
                                        value="{{ $multimediaItem->filepath }}">
                                    <small>Archivo actual: {{ $multimediaItem->filepath }}</small>
                                    <br>
                                    <label>
                                        <input type="checkbox" name="remove_filepath" value="1">
                                        Eliminar archivo actual
                                    </label>
                                    @endif

                                    @include('alerts.feedback', ['field' => 'filepath'])
                                </div>

                                <!-- <div class="form-group{{ $errors->has('thumbnail') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-thumbnail">
                                        <i class="w3-xxlarge fa fa-image"></i>{{ __('Thumbnail') }}
                                    </label>
                                    <input type="file" name="thumbnail" id="input-thumbnail"
                                        class="form-control{{ $errors->has('thumbnail') ? ' is-invalid' : '' }}"
                                        required onchange="previewThumbnail(this)">
                                    @include('alerts.feedback', ['field' => 'thumbnail'])
                                </div> -->

                                <div class="text-center">
                                    <button type="submit" class="btn btn-default mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>




                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-user">


                        <div class="card-body mt-5">
                            <h2>{{$multimediaItem->title}}</h2>


                            @if (!empty($multimediaItem->filepath))
                            <video id="my-video" class="video-js vjs-default-skin" controls width="100%" height="100%"
                                data-setup="{}">
                                <source
                                    src="{{ route('multimedia.stream', ['filename' => $multimediaItem->filepath]) }}"
                                    type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            @else
                            <p>No video available.</p>
                            @endif

                            <img id="thumbnail-preview" src="" alt="Thumbnail Preview"
                                style="display: none; max-width: 100%; height: auto;">
                        </div>

                        </video>

                        <p class="description">{{ old('email', auth()->user()->description) }}</p>
                        <hr>
                        <div>
                            <div class="button-container mr-auto ml-auto">
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

    <script>
    function previewVideo(input) {
        var videoPreview = document.getElementById('video-preview');
        var videoSource = document.getElementById('video-source');

        var file = input.files[0];
        var objectURL = URL.createObjectURL(file);

        videoSource.src = objectURL;
        videoPreview.load();
    }
    </script>

    <script>
    function previewThumbnail(input) {
        var thumbnailPreview = document.getElementById('thumbnail-preview');
        var file = input.files[0];

        if (file) {
            var objectURL = URL.createObjectURL(file);
            thumbnailPreview.src = objectURL;
            thumbnailPreview.style.display = 'block';
        } else {
            thumbnailPreview.style.display = 'none';
        }
    }
    </script>