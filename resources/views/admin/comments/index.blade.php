<x-admin-master>
    @section('title')
    <title>Sadakun - Comments</title>
    @endsection
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">All Comments</h1>
        <!-- option 1 -->
        <!-- @if(Session::has('message'))
        <div class="alert alert-danger">{{Session::get('message')}}</div>
        @endif -->

        <!-- option 2 -->
        @if(session('comment-deleted'))
        <div class="alert alert-danger">{{session('comment-deleted')}}</div>
        @elseif(session('post-created'))
        <div class="alert alert-success">{{session('post-created')}}</div>
        @elseif(session('post-updated'))
        <div class="alert alert-success">{{session('post-updated')}}</div>
        @endif
    
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Post Title</th>
                      <th>Author</th>
                      <th>Body</th>
                      <th>Email</th>
                      <th>Created date</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Post Title</th>
                      <th>Author</th>
                      <th>Body</th>
                      <th>Email</th>
                      <th>Created date</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($comments as $comment)
                    <tr>
                      <td>{{$comment->id}}</td>
                      <td>{{$comment->post->title}}</td>
                      <td>{{$comment->user->username}}</td>
                      <td>{{$comment->body}}</td>
                      <td>{{$comment->user->email}}</td>
                      <td>{{$comment->created_at->diffForHumans()}}</td>
                      <td>
                        @if($comment->isActive == 1)
                          <form method="post" action="{{route('comments.update.status',$comment->id)}}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="isActive" value="0">
                              <button type="submit" class="btn btn-circle btn-success btn-sm">
                                <i class="fas fa-check"></i>
                              </button>
                          </form>
                        @else
                          <form method="post" action="{{route('comments.update.status',$comment->id)}}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="isActive" value="1">
                              <button type="submit" class="btn btn-circle btn-warning btn-sm">
                                <i class="fas fa-exclamation"></i>
                              </button>
                          </form>
                        @endif
                      </td>
                      <td>
                        <a href="{{route('comment.replies.show', $comment->id)}}" class="btn btn-circle btn-primary btn-sm">
                          <i class="fas fa-comment-dots"></i>
                        </a>
                        <a href="{{route('post.show', $comment->post->slug)}}" class="btn btn-circle btn-info btn-sm">
                          <i class="fas fa-search"></i>
                        </a>
                        <form method="post" action="{{route('comments.delete',$comment->id)}}" ectype="multipart/form-data">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-circle btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                          </button>
                        </form>  
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
        </div>
       
    @endsection

    @section('scripts')
        <!-- Page level plugins -->
        <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="/js/demo/datatables-demo.js"></script>
    @endsection
</x-admin-master>