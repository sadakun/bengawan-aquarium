<x-admin-master>
    @section('title')
    <title>Sadakun - Edit Tag</title>
    @endsection
    @section('content')
        
        <h1 class="h3 mb-4 text-gray-800">Tag Edit</h1>
        <div class="mb-4 col-sm-3">
            <form method="post" action="{{route('tags.update', $tag->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{$tag->name}}">
                </div>

                <button type="submit" class="btn btn-primary mb-4">Update</button>
            </form>
        </div>


    @endsection
</x-admin-master>