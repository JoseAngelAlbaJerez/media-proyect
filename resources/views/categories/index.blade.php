<div id="container-category" class="row mb-4 text-white text-center">
    @foreach($categories as $category)
        <div class="col-2"><a href="#" style="color: #fff;">{{ $category->name }}</a></div>
    @endforeach
</div>