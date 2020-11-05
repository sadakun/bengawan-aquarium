<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $categories = Category::paginate(4);
        $tags = Tag::all();
        
        $q = $request->input('search');
        $posts = Post::where('title','LIKE','%' .$q. '%')->get();
        // dd($q);
        return view('components.blog.search-result',[
            'categories'=>$categories,
            'tags'=>$tags,
            'posts'=>$posts,
        ]);
    }
}
