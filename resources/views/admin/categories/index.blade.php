<x-admin-master>
    @section('title')
    <title>Sadakun - Categories</title>
    @endsection
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">CATEGORIES</h1>
        @if(session()->has('category-deleted'))
        <div class="alert alert-danger">{{session('category-deleted')}}</div>
        @elseif(session()->has('category-updated'))
        <div class="alert alert-success">{{session('category-updated')}}</div>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <a href="#" class="btn btn-primary btn-circle ml-2 float-right" data-toggle="modal" data-target="#categoryModal"><i class="fas fa-plus"></i></a>
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
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
                                    <td>{{$category->slug}}</td>
                                    <td>
                                        <form method="post" action="{{route('categories.delete', $category->id)}}">
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
    <!-- Category Modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <form method="post" action="{{route('categories.store')}}">
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
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection
</x-admin-master>