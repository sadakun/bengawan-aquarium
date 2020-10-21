<x-home-master>
@section('content')

<!-- Blog Entries Column -->
<div class="col-md-8">

    <!-- Title -->
    <h1 class="mt-4">{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
    by
    <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p>Posted on {{$post->created_at->format('d, M Y H:i')}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-fluid rounded" src="{{$post->post_image}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{$post->body}}</p>

    <blockquote class="blockquote">
    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
    <footer class="blockquote-footer">Someone famous in
        <cite title="Source Title">Source Title</cite>
    </footer>
    </blockquote>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>

    <hr>

    <!-- Comments Form Input-->
    <div class="card my-4">
        <h5 class="card-header">Leave a Comment:</h5>
        <div class="card-body">
            <form action="{{route('comments.store')}}" method="post">
            @csrf
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <div class="form-group">
                    <textarea name="body" class="form-control @error('body') is-invalid @enderror" rows="3"></textarea>
                    @error('body')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <!-- Single Comment -->
    @if(count($comments) > 0)
    @foreach($comments as $comment)
    <div class="media mb-4">
        <img width="80px" class="rounded img-fluid mr-3 d-block" src="{{$comment->user->avatar}}" alt="">
        <div class="media-body">
            <h5 class="mt-0">{{$comment->user->username}}</h5>
            {{$comment->body}}

            @if(count($comment->replies) > 0)
            @foreach($comment->replies as $reply)
            <!-- Comment with nested comments -->
            <div class="media mt-5">
                <img width="60px" class="rounded img-fluid mr-3 d-block" src="{{$comment->user->avatar}}" alt="">
                <div class="media-body">
                    <h5 class="mt-0">{{$reply->user->username}}</h5>
                    {{$reply->body}}
                </div>
            </div>
            
            @endforeach
            
            @else
            <br>
            <small class="mt-3"><i>No one replied yet, be the first one to reply</i></small>
            
            @endif
            <form class="form-group" method="post" action="{{route('comment.replies.store')}}">
                @csrf
                <div class="input-group mt-3">
                    <div class="input-group-append">
                        <button class="btn rounded btn-primary" type="submit">
                        <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <input type="textarea" name="body" class="form-control  border-0 small @error('body') is-invalid @enderror" placeholder="Reply" rows="1">
                    @error('body')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </form>
        </div>
    </div>
    @endforeach
    @else
    <h1>No Comments yet</h1>
    @endif

    <!-- Comment with nested comments -->
    
    <!-- <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

            <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0">Commenter Name</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>

            <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0">Commenter Name</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>

        </div>
    </div> -->

    <!-- Pagination -->
    <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
        </li>
    </ul>

</div>

<!-- Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Search Widget -->
    <div class="card my-4">
        <h5 class="card-header">Search</h5>
        <div class="card-body">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button">Go!</button>
                </span>
            </div>
        </div>
    </div>

    <!-- Categories Widget -->
    <div class="card my-4">
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled mb-0">
                    <li>
                        <a href="#">Web Design</a>
                    </li>
                    <li>
                        <a href="#">HTML</a>
                    </li>
                    <li>
                        <a href="#">Freebies</a>
                    </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#">JavaScript</a>
                        </li>
                        <li>
                            <a href="#">CSS</a>
                        </li>
                        <li>
                            <a href="#">Tutorials</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Side Widget -->
    <div class="card my-4">
        <h5 class="card-header">Side Widget</h5>
        <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
        </div>
    </div>

</div>
    
@endsection
</x-home-master>