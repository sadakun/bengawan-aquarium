<x-admin-master>
    @section('title')
    <title>Sadakun - Tags</title>
    @endsection
    @section('content')
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">All Tags</h1>
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tagModal"><i class="fas fa-download fa-sm text-white-50"></i> Create New Tag</a>
        </div>
        @if(session()->has('tag-deleted'))
        <div class="alert alert-danger">{{session('tag-deleted')}}</div>
        @elseif(session()->has('tag-updated'))
        <div class="alert alert-success">{{session('tag-updated')}}</div>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="20px">Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th width="50px">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th width="20px">Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th width="50px">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($tags as $tag)
                                <tr>
                                    <td>{{$tag->id}}</td>
                                    <td><a href="{{route('tags.edit', $tag->id)}}">{{$tag->name}}</a></td>
                                    <td>{{$tag->slug}}</td>
                                    <td>
                                        <form method="post" action="{{route('tags.delete', $tag->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
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
    <!-- Tag Modal -->
    <div class="modal fade" id="tagModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Tags</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <form method="post" action="{{route('tags.store')}}">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
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
    @endsection
</x-admin-master>