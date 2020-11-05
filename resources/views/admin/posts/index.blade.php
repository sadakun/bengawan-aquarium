<x-admin-master>
    @section('title')
    <title>Sadakun - Posts</title>
    @endsection
    @section('styles')
    <link rel="stylesheet" href="/css/bootstrap-select.min.css">
    @endsection
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">All Posts</h1>
        <!-- option 1 -->
        <!-- @if(Session::has('message'))
        <div class="alert alert-danger">{{Session::get('message')}}</div>
        @endif -->

        <!-- option 2 -->
        @if(session('post-deleted'))
        <div class="alert alert-danger">{{session('post-deleted')}}</div>
        @elseif(session('post-created'))
        <div class="alert alert-success">{{session('post-created')}}</div>
        @elseif(session('post-updated'))
        <div class="alert alert-success">{{session('post-updated')}}</div>
        @endif
    
        <!-- DataTales Example -->
        <div class="row">
          <div class="col-sm-12">
            <a href="#" class="btn btn-primary btn-circle ml-2 float-right" data-toggle="modal" data-target="#postModal"><i class="fas fa-plus"></i></a>
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
                          <th>Author</th>
                          <th>Title</th>
                          <th>Image</th>
                          <th>Created date</th>
                          <th>Updated date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Id</th>
                          <th>Author</th>
                          <th>Title</th>
                          <th>Image</th>
                          <th>Created date</th>
                          <th>Updated date</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        @foreach($posts as $post)
                        <tr>
                          <td>{{$post->id}}</td>
                          <td>{{$post->user->name}}</td>
                          <td>{{$post->title}}</td>
                          <td><img height="100px" src="{{$post->post_image}}" alt=""></td>
                          <td>{{$post->created_at->diffForHumans()}}</td>
                          <td>{{$post->updated_at->diffForHumans()}}</td>
                          <td>
                            <a href="{{route('post.show', $post->slug)}}" class="btn btn-circle btn-info btn-sm">
                              <i class="fas fa-search"></i>
                            </a>

                            <a href="{{route('comments.post.show', $post->id)}}" class="btn btn-circle btn-primary btn-sm">
                              <i class="fas fa-comments"></i>
                            </a>

                            <a href="{{route('post.edit', $post->id)}}" class="btn btn-circle btn-warning btn-sm">
                              <i class="fas fa-pen"></i>
                            </a>
                            
                            <form method="post" action="{{route('post.delete', $post->id)}}" ectype="multipart/form-data">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-circle btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                            
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
          </div>
        </div>
       
    @endsection

    @section('modals')
    <!-- Tag Permission -->
    <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Permissions</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
          </div>
          <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              @csrf
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="Enter title">
              </div>

              <div class="form-group">
                <label for="file">File</label>
                <input type="file" name="post_image" class="form-control-file" 
                id="post_image">
              </div>

              <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" id="" class="form-control">
                  <option value="" class="disable selected">Choose category</option> 
                  @foreach($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>    
                  @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="tags">Tag</label>
                  <select name="tags[]" id="" class="form-control selectpicker" multiple data-live-search="true">
                    <option value="" class="disable selected">Choose tags</option> 
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>    
                    @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <textarea name="body" id="summernote" class="form-control" cols="30" rows="10"></textarea>
              </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Add New</button>
            </div>
          </form>
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
        <script src="/vendor/bootstrap/js/bootstrap-select.min.js"></script>
    @endsection
</x-admin-master>