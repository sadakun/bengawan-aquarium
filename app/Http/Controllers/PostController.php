<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    #Home Post
    public function show($slug)
    {
        $post = Post::findBySlug($slug);
        $comments = $post->comments()->where('isActive',1)->get();
        $categories = Category::all();
        $related = Post::whereHas('tags', function ($q) use ($post) {
            return $q->whereIn('name', $post->tags->pluck('name')); 
        })->where('id', '!=', $post->id)->get();
        

        return view('components.blog.blog-post', [
            'post'=>$post,
            'comments'=>$comments,
            'categories'=>$categories,
            'related'=>$related,
            ]);
        // return dd($related);
    }

    ##Admin Post
    #Show All Post
    public function index()
    {
        // $posts = auth()->user()->posts()->paginate(5);
        if(auth()->user()->roles->pluck( 'name' )->contains( 'Admin' )) {
            $posts = Post::all();
        } else if(auth()->user()->roles->pluck( 'name' )->contains( 'Author' )) {
            $posts = auth()->user()->posts()->get();
        }
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.index', [
            'posts'=>$posts,
            'categories'=>$categories,
            'tags'=>$tags,
            ]);
    }

    ##Create
    #Show create page
    public function create()
    {
        $this->authorize('create', Post::class);
        return view('admin.posts.create');
    }

    #Create a new data post
    public function store()
    {
        $this->authorize('create', Post::class);

        // Validating data form
        $inputs= request()->validate([
            'title'=> 'required|max:255',
            'post_image'=>'file',
            'body'=>'required',
            'category_id'=>'required',
        ]);

        // Condition to move save image file to folder images
        // if(request('post_image'))
        // {
        //     $inputs['post_image'] = request('post_image')->store('images');
        // }

        if(request('post_image'))
        {
            $image = request()->file('post_image');
            $inputs['post_image'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $inputs['post_image']);
        }

        // Condition to create, it must authetication user
        $post = auth()->user()->posts()->create($inputs);
        $post->tags()->sync(request()->tags);
        // Alert that shows after submit data
        session()->flash('post-created', $inputs['title']. ' '. 'post was created');
        return redirect()->route('post.index');
        // return dd($inputs);
    }

    ##Edit
    #Show edit page
    public function edit(Post $post)
    {
        $this->authorize('view', $post);
        #another way to use policies
        /*if(auth()->user()->can('view', $post))
        {
            return view('admin.posts.edit', ['post'=>$post]);
        }*/
        // $this->authorize('view', $post);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', [
            'post'=>$post,
            'categories'=>$categories,
            'tags'=>$tags,
            ]);
    }

    #Update edited post data
    public function update(Post $post)
    {

        $inputs=request()->validate([
            'title'=> 'required|max:255',
            'post_image'=>'file',
            'body'=>'required'
        ]);

        if(request('post_image'))
        {
            $image = request()->file('post_image');
            $inputs['post_image'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $inputs['post_image']);
            $post->post_image = $inputs['post_image'];
        }

        // if(request('post_image'))
        // {
        //     $inputs['post_image'] = request('post_image')->store('images');
        //     $post->post_image = $inputs['post_image'];
        // }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        $this->authorize('update', $post);
        $post->save();
        $post->tags()->sync(request()->tags);

        session()->flash('post-updated', $post['title']. ' '. 'was updated');

        return redirect()->route('post.index');
    }

    #option 1 to display alert using session
    /*public function delete(Post $post)
    {
        $post->delete();
        Session::flash('message', 'Post was deleted');
        return back();
    }*/

    #option 2 using Request
    #Delete specific post

    ##Delete
    #Deleting the post
    public function delete(Post $post, Request $request)
    {
        $this->authorize('delete', $post);
        $post->delete();
        $request->session()->flash('post-deleted', $post['title']. ' '. 'post was deleted');
        return back();
    }

    
}
