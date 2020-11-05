<x-admin-master>
    @section('title')
    <title>Sadakun - Edit Post</title>
    @endsection

    @section('styles')
    <link rel="stylesheet" href="/css/bootstrap-select.min.css">
    @endsection

    @section('content')
        <h1 class="h3 mb-4 text-gray-800">Edit Post</h1>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" 
                            id="title" aria-describedby="" placeholder="Enter title" value="{{$post->title}}">
                        </div>

                        <div class="mb-4">
                            <img class="card-img-top" src="{{$post->post_image}}" alt="Card image cap">
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
                                <option value="{{$category->id}}" @if($post->category_id == $category->id){ selected } @endif>
                                {{$category->name}}</option>    
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
                            <textarea name="body" id="summernote" class="form-control" cols="30" rows="10">{!! $post->body !!}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        
    @endsection
    @section('scripts')
    <script src="/vendor/bootstrap/js/bootstrap-select.min.js"></script>
    <script type="text/javascript">
        $(".selectpicker").selectpicker().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
    </script>
    @endsection
</x-admin-master>