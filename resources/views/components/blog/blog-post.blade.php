<x-home-master>
    @section('titles')
    <title></title>
    @endsection
    @section('content')
    <div class="row tm-row">
        <div class="col-12">
            <hr class="tm-hr-primary tm-mb-55">
            <!-- Video player 1422x800 -->
            <a href="#" class="d-block tm-mb-40">
                <figure>
                    <img src="{{$post->post_image}}" alt="Image" class="mb-1 img-fluid">
                </figure>
            </a>
        </div>
    </div>
    <div class="row tm-row">
        <div class="col-lg-8 tm-post-col">
            <div class="tm-post-full">                    
                <div class="mb-4">
                    <h2 class="pt-2 tm-color-primary tm-post-title">{{$post->title}}</h2>
                    <p class="tm-mb-40">{{$post->created_at->format('M d, Y')}} posted by <a href="{{route('author.show',$post->user->id)}}">{{$post->user->name}}</a></p>
                    <p>{!! $post->body !!}</p>
                    <div class="d-flex justify-content-end tm-pt-45">
                        @foreach($post->tags as $tag)
                        <a href="{{route('tags.show', $tag->slug)}}" class="tm-color-primary ml-custom">{{$tag->name}},</a>
                        @endforeach
                    </div>
                </div>
                
                <!-- Comments -->
                <div>
                    <h2 class="tm-color-primary tm-post-title">Comments</h2>
                    <hr class="tm-hr-primary tm-mb-45">
                    @if(count($comments) > 0)
                    @foreach($comments as $comment)
                    <div class="tm-comment tm-mb-45">
                        <figure class="tm-comment-figure">
                            <img src="{{$comment->user->avatar}}" alt="Image" class="mb-2 rounded-circle img-thumbnail">
                            <figcaption class="tm-color-primary text-center">Mark Sonny</figcaption>
                        </figure>
                        <div>
                            <p>{{$comment->body}}</p>
                            <div class="d-flex justify-content-between">
                                <a href="#" class="tm-color-primary">REPLY</a>
                                <span class="tm-color-primary">{{$comment->created_at->format('M d, Y')}}</span>
                            </div>                                                 
                        </div>                                
                    </div>

                    <!-- reply form -->
                    @if(Auth::check())
                    <form action="{{route('comment.replies.store')}}" class="mb-5 tm-comment-form" method="post">
                        @csrf
                        <div class="mb-4">
                            <textarea class="form-control" name="body" rows="1"></textarea>
                        </div>
                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}"> 
                        <div class="text-right">
                            <button class="tm-btn tm-btn-primary tm-btn-small">Submit</button>                        
                        </div>                                
                    </form>
                    @else
                    <div class="d-flex justify-content-between">
                        <a href="#" class="tm-color-primary">Login to reply</a>
                    </div>
                    @endif

                    <!-- Nested Comment -->
                    <div class="tm-comment-reply tm-mb-45">
                        <hr>
                        @foreach($comment->replies as $reply)
                        <div class="tm-comment">
                            <figure class="tm-comment-figure">
                                <img src="{{$reply->user->avatar}}" alt="Image" class="mb-2 rounded-circle img-thumbnail">
                                <figcaption class="tm-color-primary text-center">Jewel Soft</figcaption>    
                            </figure>
                            <p>{{$reply->body}}</p>
                        </div>                                
                        <span class="d-block text-right tm-color-primary">{{$reply->created_at->format('M d, Y')}}</span>
                        @endforeach
                    </div>
                    
                    @endforeach
                    @else
                    <div class="col-md-12 text-center tm-color-gray">
                        No Comment yet
                    </div>
                    @endif                      
                </div>
                @if(Auth::check())
                <!-- Comment Input -->
                <form method="post" action="{{route('comments.store')}}" class="mb-5 tm-comment-form" method="post">
                    @csrf
                    <h2 class="tm-color-primary tm-post-title mb-4">Your comment</h2>
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <div class="mb-4">
                        <textarea class="form-control" name="body" rows="6"></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="tm-btn tm-btn-primary tm-btn-small">Submit</button>                        
                    </div>                                
                </form>  
                @else
                <div class="d-flex justify-content-center">
                    <a href="#" class="tm-color-primary">Login to comment</a>
                </div>
                @endif
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
                <h2 class="tm-mb-2 tm-post-title tm-color-primary">Related Posts</h2>
                <hr class="mb-3 tm-hr-primary">
                @foreach($related as $relate)
                <a href="{{route('post.show',$relate->slug)}}" class="d-block tm-mb-40">
                    <figure>
                        <img src="{{$relate->post_image}}" alt="Image" class="mb-1 img-fluid">
                        <figcaption class="tm-color-primary">{{$relate->title}}</figcaption>
                    </figure>
                </a>
                @endforeach
            </div>                    
        </aside>
    </div>
    @endsection
</x-home-master>