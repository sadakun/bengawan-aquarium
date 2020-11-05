<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        return view('admin.tags.index',['tags'=>Tag::all()]);
    }

    public function store()
    {
        request()->validate([
            'name'=>['required']
        ]);
        Tag::create([
            'name'=>Str::ucfirst(request('name'))
        ]);
        session()->flash('tag-created', 'tag was created');
        return back();
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.edit',['tag'=>$tag]);
    }

    public function update(Tag $tag)
    {
        $tag->name= Str::ucfirst(request('name'));

        ##isDirty mean if the model has been edited since it was queried from the database, or isn't saved at all
        ##That means the role has been edited, else codes here will not be executed
        if($tag->isDirty('name'))
        {
            session()->flash('tag-updated', $tag->name. ' '. 'tag updated');
            $tag->save();
        } else {
            session()->flash('tag-updated', 'nothing has been updating');
        }
        
        return redirect()->route('tags.index');

        return view('tag',['']);
    }

    public function delete(Tag $tag)
    {
        $tag->delete();
        session()->flash('tag-deleted', $tag->name. ' '. 'tag deleted');
        return back();
    }

    public function show($slug)
    {
        $categories = Category::paginate(4);
        $tags = Tag::all();
        $tags2 = Tag::findBySlug($slug);
        return view('components.blog.posts-tag',[
            'categories'=>$categories,
            'tags'=>$tags,
            'tags2'=>$tags2,
        ]);
    }
}
