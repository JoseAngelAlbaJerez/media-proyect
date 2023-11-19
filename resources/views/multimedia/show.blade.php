@extends('layouts.app', ['activePage' => 'user', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'User Profile', 'activeButton' => 'laravel'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                {{-- Video Player --}}
                <div class="embed-responsive embed-responsive-16by9">
                    <div class="video-container">
                        @if (!empty($multimediaItem->filepath))
                            <video controls width="100%" height="100%">
                                <source src="{{ route('multimedia.stream', ['filename' => $multimediaItem->filepath]) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <p>No video available.</p>
                        @endif
                    </div>
                </div>

                {{-- Video Description --}}
                <div class="mt-4">
                       <div class="col"><h3>{{$multimediaItem->title}}</h3></div>
                       <div class="row">
                        <div class="col-auto">
                            <img src="https://dictionary.cambridge.org/images/thumb/circle_noun_001_02738.jpg?version=5.0.357" width="50" height="47" alt="">
                        </div>
                        <div class="col-auto">
                            <h5>Channel Name</h5>
                            <p>Subscriptions</p>
                        </div>
                        <div class="col-auto mr-5">
                            <button class="btn btn-dark rounded">Subscribe</button>
                        </div>
                        <div class="col-auto ml-auto">
                            <i class="fa fa-thumbs-up text-dark m-3"><p>500</p></i> <!-- Like icon -->
                            <i class="fa fa-thumbs-down text-dark ml-4"><p>10</p></i> <!-- Dislike icon -->
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-dark rounded"><i class="fa fa-share"></i> Share</button>
                            <button class="btn btn-dark rounded"><i class="fa fa-download"></i> Download</button>
                            <button class="btn btn-dark rounded"><i class="fa fa-plus"></i> Save</button>
                            <button class="btn btn-dark rounded"><i class="fa text-center"></i> ...</button>
                        </div>
                    </div>
                    <p>Description</p>
                    <div class="row bg-dark rounded text-white">
                    <div class="col-auto ml-2 mt-3"><p><b>1k views</b></p></div>
                    <div class="col-auto mt-3"><p><b>{{$multimediaItem->created_at->diffForHumans() }}</b></p></div>
                    
                    <div class="row m-2">
                    <div class="col">
                            <p>{{ $multimediaItem->description }}</p>
                        </div>
                    </div>
                    <a href=" ">show more...</a>
                   
                    </div>
                    
                   
                </div>

                {{-- Like and Dislike Buttons --}}
                <div class="mt-4">
                   
                </div>

                {{-- Comments Section --}}
                <div class="mt-4">
                    <h3>Comments</h3>
                    {{-- Add your comment section code here --}}
                    {{-- For example, you might loop through comments --}}
                    
                        <div class="mb-2">
                            <strong></strong>
                        
                        </div>
               

                    {{-- Add a form for new comments --}}
                    <form action="" method="post">
                        @csrf
                        <textarea name="body" class="form-control" placeholder="Add a comment"></textarea>
                        <button type="submit" class="btn btn-dark  mt-2">Post Comment</button>
                    </form>
                </div>
            </div>

            <div class="col-md-4">
                {{-- Other content in the right column --}}
            </div>
        </div>
    </div>
</div>
@endsection