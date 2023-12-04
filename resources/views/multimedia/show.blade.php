@extends('layouts.app', ['activePage' => 'show', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim &
UPDIVISION', 'navName' => 'User Profile', 'activeButton' => 'laravel'])


@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                {{-- Video Player --}}

                <div class="video-container m-2">
                    @if (!empty($multimediaItem->filepath))
                    <video id="my-video" class="video-js vjs-default-skin rounded" controls width="1030" height="800"
                        data-setup="{}">
                        <source src="{{ route('multimedia.stream', ['filename' => $multimediaItem->filepath]) }}"
                            type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    @else
                    <p>No video available.</p>
                    @endif
                </div>



                {{-- Video Description --}}
                <div class="mt-4">
                    <div class="col">
                        <h3>{{$multimediaItem->title}}</h3>

                    </div>
                    <div class="row">
                        <div class="col-auto ml-3"><a href="{{ route('users.show', $multimediaItem->user->id) }}">
                                <img src="https://dictionary.cambridge.org/images/thumb/circle_noun_001_02738.jpg?version=5.0.357"
                                    width="50" height="47" alt="">
                        </div>
                        <div class="col-auto mt-3 text-dark ">
                          <b><h5>{{$multimediaItem->user->name}} 300k</h5></b> 
                           
                        </div>
                      
                     
                    
                    </a>
                        <div class="col-auto mr-5">
                            <button class="btn btn-dark rounded">Subscribe</button>
                        </div>
                        <div class="col-auto ml-auto">
                            <i class="fa fa-thumbs-up text-dark m-3">
                                <p>500</p>
                            </i> <!-- Like icon -->
                            <i class="fa fa-thumbs-down text-dark ml-4">
                                <p>10</p>
                            </i> <!-- Dislike icon -->
                        </div>
                        <div class="col-auto " style="margin-right: 118px">
                            <button class="btn btn-dark rounded"><i class="fa fa-share"></i> Share</button>
                            <a href="{{ route('multimedia.download', ['filename' => $multimediaItem->filepath]) }}"
                                class="btn btn-dark rounded"> <i class="fa fa-download"></i> Download
                            </a>
                            <button class="btn btn-dark rounded"><i class="fa fa-plus"></i> Save</button>
                            <button class="btn btn-dark rounded"><i class="fa text-center"></i> ...</button>
                        </div>
                    </div>
                    <p class="ml-2">Description</p>
                    <div class="row bg-dark rounded ml-2 text-white">
                        <div class="col-auto ml-2 mt-3">
                            <p><b>1k views</b></p>
                        </div>
                        <div class="col-auto mt-3">
                            <p><b>{{$multimediaItem->created_at->diffForHumans() }}</b></p>
                        </div>

                        <div class="row m-2">
                            <div class="col" style="display: none;">
                                <p>{{ $multimediaItem->description }}</p>
                            </div>
                        </div>
                        <a href="" style="display: none;">show more...</a>

                    </div>


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

            {{-- Recommended Multimedia Items --}}
            <div class="col-md-4">
                <h3 class="ml-5">Recommended</h3>
                <ul style="list-style-type: none;">
                    @forelse ($recommendedMultimediaItems as $index => $recommendedItem)
                    <li>

                        <div class="col-md-4">
                            <a href="{{ route('multimedia.show', $recommendedItem) }}">
                                <div class="video-container"
                                    style="width: 400px; height: 250px; overflow: hidden; background-color: #FFF;">
                                    <video muted onmouseover="this.play()" onmouseout="this.pause();this.currentTime=0;"
                                        width="400" height="250">
                                        <source src="{{ route('multimedia.stream', $recommendedItem->filepath) }}"
                                            type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                        </div>

                        <div class="row ml-2">
                            <img src="https://dictionary.cambridge.org/images/thumb/circle_noun_001_02738.jpg?version=5.0.357"
                                width="50" height="47" alt="" class="mb-auto">
                            <div class="col mt-2">
                                <p style="color: #0F0F0F;"><b>{{$recommendedItem->title}}</b></p>
                            </div>
                        </div>
                        <div class="row mt-2 ml-2">
                            <p>{{$multimediaItem->user->name}}</p>

                            <p class="ml-2 mb-2"> 2k views
                                {{ $multimediaItem->created_at->diffForHumans() }}</p>
                        </div>
                        </a>

                    </li>
                    @empty
                    {{-- Logic for when there are no recommended items --}}
                    <p>No recommended multimedia items found.</p>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>

<link href="https://vjs.zencdn.net/7.14.3/video-js.css" rel="stylesheet">


<script src="https://vjs.zencdn.net/7.14.3/video.js"></script>
<script>
var player = videojs('my-video');
</script>

@endsection