<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function index()
    {
        return view('admin.comments.index',['comments'=>Comment::all()]);
    }

    public function show($id)
    {
        return view('admin.comments.show', ['comments'=>Post::findOrFail($id)->comments]);
    }

    public function store()
    {
        request()->validate([
            'body'=>'required'
        ]);
        Comment::create([
            'post_id'=>request()->post_id,
            'user_id'=>request()->user_id,
            'body'=>request()->body,
        ]);
        return back();
    }

    public function update($id)
    {
        Comment::find($id)->update(request()->all());
        return back();
    }

    public function delete($id)
    {
        Comment::find($id)->delete();
        request()->session()->flash('comment-deleted', 'comment was deleted');
        return back();
    }
}
