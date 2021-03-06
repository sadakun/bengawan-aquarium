<x-admin-master>
    @section('title')
    <title>Sadakun - Edit Permissions</title>
    @endsection
    @section('content')
        
        <h1 class="h3 mb-4 text-gray-800">Permission Edit</h1>
        <div class="mb-4 col-sm-3">
            <form method="post" action="{{route('permissions.update', $permission->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{$permission->name}}">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>


    @endsection
</x-admin-master>