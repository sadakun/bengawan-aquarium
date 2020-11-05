<x-home-master>
    @section('content')
    <div class="row tm-row">
        <div class="col-12">
            <h2 class="mb-4 tm-post-title tm-color-primary">Category: {{$categories2->name}} <small>({{$categories2->posts()->count()}} articles)</small>
            <hr class="tm-hr-primary tm-mb-55">
        </div>
    </div>

    <div class="row tm-row">
        <!-- Blog Post -->
        <div class="col-lg-8 tm-post-col">
            <div class="tm-post-full">
                @foreach($categories2->posts as $post)
                <div class="mb-4">
                    <a href="{{route('post.show',$post->slug)}}" class="effect-lily tm-post-link tm-pt-60">
                        <div class="tm-post-link-inner">
                            <img src="{{$post->post_image}}" alt="Image" class="img-fluid">                            
                        </div>
                        <span class="position-absolute tm-new-badge">Read</span>
                        <div class="d-flex justify-content-between tm-pt-20">
                            <h2 class="tm-color-primary tm-post-title">{{$post->title}}</h2>
                            <span>{{$post->created_at->format('M d, Y')}}</span>
                        </div>
                    </a>                    
                    <p>
                        {!! Str::limit($post->body, '120', '...') !!}
                    </p>
                    <div class="d-flex justify-content-start">
                        <span class="tm-color-primary"><a href="{{route('categories.show', $categories2->slug)}}">{{$categories2->name}}</a></span>             
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>{{$post->comments()->count()}} comments</span>
                        <span>by {{$post->user->name}}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <aside class="col-lg-4 tm-aside-col">
            <div class="tm-post-sidebar">
                <h2 class="mb-2 tm-post-title tm-color-primary">Categories</h2>
                <hr class="mb-3 tm-hr-primary">
                <ul class="tm-mb-75 pl-5 tm-category-list">
                    @foreach($categories as $category)
                    <li><a href="{{route('categories.show',$category->slug)}}" class="tm-color-primary">{{$category->name}} <span class="float-right sum-size">{{$category->posts()->count()}}</span> </a></li>
                    @endforeach
                </ul>
                <h2 class="mb-2 tm-post-title tm-color-primary">Tags</h2>
                <hr class="mb-3 tm-hr-primary">
                <ul class="tm-mb-75 pl-5 tm-category-list">
                    @foreach($tags as $tag)
                    <li><a href="{{route('tags.show',$tag->slug)}}" class="d-block tm-color-primary">{{$tag->name}} <span class="float-right sum-size">{{$tag->posts()->count()}}</span> </a></li>
                    @endforeach
                </ul>
            </div>                    
        </aside>
    </div>
    @endsection
</x-home-master>