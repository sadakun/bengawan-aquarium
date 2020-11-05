<x-admin-master>
    @section('content')
        
        <h1 class="h3 mb-4 text-gray-800">Category Edit</h1>
        <div class="mb-4 col-sm-3">
            <form method="post" action="{{route('categories.update', $category->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{$category->name}}">
                </div>

                <button type="submit" class="btn btn-primary mb-4">Update</button>
            </form>
        </div>


    @endsection
</x-admin-master>