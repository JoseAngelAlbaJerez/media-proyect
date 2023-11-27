@extends('layouts.app', ['activePage' => 'create', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim &
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

<style>
input[type="file"]::file-selector-button {
    /* Future CSS specification */
    font-weight: bold;
    color: white;
    background-color: #0F0F0F;
    border: 1px solid #0F0F0F;
    border-radius: 3px;
    padding: 0.2em 0.4em;
    cursor: pointer;


}

input[type="file"] {

    color: white;
    background-color: #0F0F0F;
    border: 1px solid #0F0F0F;
    border-radius: 3px;
    padding-bottom: 35px;
    padding-right: 20px;
    cursor: pointer;

}

input[type="file"]::file-selector-button:hover,
input[type="file"]:hover {

    background-color: #1A1A1A;
}
</style>
@section('content')
<div class="content mt-5 ">
    <div class="container-fluid">
        <div class="section-image">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="row">

                <div class="card col-md-8">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h3 class="mb-0">{{ __('Subir Video') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('multimedia.store') }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('post')

                            <h6 class="heading-small text-muted mb-4">{{ __('Información del Video') }}</h6>

                            @include('alerts.success')


                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">
                                        <i class="w3-xxlarge fa fa-heading"></i>{{ __('Titulo') }}
                                    </label>
                                    <input type="text" name="title" id="input-title"
                                        class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Titulo') }}"
                                        value="{{ old('title', auth()->user()->title) }}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'title'])
                                </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-description"><i
                                            class="w3-xxlarge fa fa-info"></i>{{ __('Descripción') }}</label>
                                    <textarea name="description" id="input-description"
                                        class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Description') }}"
                                        required>{{ old('description', auth()->user()->description) }}</textarea>
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
                                    <label class="form-control-label" for="input-filepath"><i
                                            class="w3-xxlarge 	fa fa-play"></i>{{ __('Video') }}</label>
                                    <input type="file" name="filepath" id="input-filepath"
                                        class="form-control{{ $errors->has('filepath') ? ' is-invalid' : '' }}" required
                                        onchange="previewVideo(this)"
                                        style=" background-color: #fff; color: #0F0F0F; border: 1px solid #0F0F0F; cursor: pointer;">

                                    @include('alerts.feedback', ['field' => 'filepath'])
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-default mt-4"
                                        style=" border-color: #0F0F0F; color: #0F0F0F;">{{ __('Guardar') }}</button>
                                </div>
                            </div>
                        </form>




                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-user">


                        <div class="card-body mt-5">
                            <h2>Preview</h2>


                            <video id="video-preview" width="100%" controls style="max-height: 400px;">
                                <source id="video-source" src="#" type="video/mp4">
                            </video>

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