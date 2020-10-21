<x-admin-master>
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">All Replies</h1>
        <!-- option 1 -->
        <!-- @if(Session::has('message'))
        <div class="alert alert-danger">{{Session::get('message')}}</div>
        @endif -->

        <!-- option 2 -->
        @if(session('reply-deleted'))
        <div class="alert alert-danger">{{session('reply-deleted')}}</div>
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
                      <th>Comment by</th>
                      <th>Replied by</th>
                      <th>Body</th>
                      <th>Email</th>
                      <th>Created date</th>
                      <th>Updated date</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Comment by</th>
                      <th>Replied by</th>
                      <th>Body</th>
                      <th>Email</th>
                      <th>Created date</th>
                      <th>Updated date</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($replies as $reply)
                    <tr>
                      <td>{{$reply->id}}</td>
                      <td>{{$reply->comment->post->user->username}}</td>
                      <td>{{$reply->user->username}}</td>
                      <td>{{$reply->body}}</td>
                      <td>{{$reply->user->email}}</td>
                      <td>{{$reply->created_at->diffForHumans()}}</td>
                      <td>{{$reply->updated_at->diffForHumans()}}</td>
                      <td>
                        @if($reply->isActive == 1)
                          <form method="post" action="{{route('replies.update.status',$reply->id)}}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="isActive" value="0">
                              <button type="submit" class="btn btn-circle btn-success btn-sm">
                                <i class="fas fa-check"></i>
                              </button>
                          </form>
                        @else
                          <form method="post" action="{{route('replies.update.status',$reply->id)}}">
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
                        <a href="{{route('post',$reply->comment->post->id)}}" class="btn btn-circle btn-info btn-sm">
                          <i class="fas fa-search"></i>
                        </a>
                        <form method="post" action="{{route('comment.reply.delete',$reply->id)}}" ectype="multipart/form-data">
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
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection
</x-admin-master>