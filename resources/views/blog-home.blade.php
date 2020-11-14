<x-home-master>
@section('titles')
<title>Sadaku - Blog</title>
@endsection

@section('content')
<div class="row tm-row">
    
    @foreach($posts as $post)
    <article class="col-12 col-md-6 tm-post">
        <hr class="tm-hr-primary">
        <a href="{{route('post.show',$post->slug)}}" class="effect-lily tm-post-link tm-pt-20">
            <div class="tm-post-link-inner">
                <img src="{{$post->post_image}}" alt="Image" class="img-fluid">
            </div>
            <h2 class="tm-pt-30 tm-color-primary tm-post-title">{{$post->title}}</h2>
        </a>                    
        <p class="tm-pt-30">
        {!! Str::limit($post->body, '100', '...') !!}
        </p>
        <div class="row d-flex justify-content-between">
            <div class="col-7">
                @foreach($post->tags as $tag)
                <span class="tm-color-primary"><a href="{{route('tags.show', $tag->slug)}}">{{$tag->name}}, </a></span>
                @endforeach
            </div>
            <div class="col-5">
                <span class="tm-color-primary ml-custom">{{$post->created_at->format('M d, Y')}}</span>
            </div>
        </div>
        <hr>
        <div class="d-flex justify-content-between">
            <span>{{$post->comments()->count()}} comments</span>
            <span>by <a href="#">{{$post->user->name}}</a></span>
        </div>
    </article>
    @endforeach
</div>
{{ $posts->links('vendor.pagination.custom') }}

@endsection
</x-blog-master>