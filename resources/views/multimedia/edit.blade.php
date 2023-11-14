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
                                <h3 class="mb-0">{{ __('Subir Video') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update') }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <h6 class="heading-small text-muted mb-4">{{ __('Información del Video') }}</h6>

                            @include('alerts.success')
                            @include('alerts.error_self_update', ['key' => 'not_allow_profile'])

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">
                                        <i class="w3-xxlarge fa fa-heading"></i>{{ __('Titulo') }}
                                    </label>
                                    <input type="text" name="name" id="input-title"
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
                                        placeholder="{{ __('Descripción') }}"
                                        value="{{ old('email', auth()->user()->email) }}" required>
</textarea>
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                                <div class="form-group{{ $errors->has('category') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-category"><i
                                            class="w3-xxlarge fa fa-th-large"></i>{{ __('Categoria') }}</label>
                                    <select type="category" name="category" id="input-category"
                                        class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}"

                                        required>
                                    </select>
                                    @include('alerts.feedback', ['field' => 'category'])
                                </div>
                                <div class="form-group{{ $errors->has('file') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-file"><i
                                            class="w3-xxlarge 	fa fa-play"></i>{{ __('Video') }}</label>
                                    <input type="file" name="file" id="input-file"
                                        class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}"
                                    
                                      required>
                                 
                                    @include('alerts.feedback', ['field' => 'category'])
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-default mt-4">{{ __('Guardar') }}</button>
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