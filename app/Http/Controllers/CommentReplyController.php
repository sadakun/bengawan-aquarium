<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\CommentReply;

class CommentReplyController extends Controller
{
    public function show($id)
    {
        return view('admin.comments.replies.show', ['replies'=>Comment::findOrFail($id)->replies]);
    }

    public function store()
    {
        request()->validate([
            'body'=>'required'
        ]);
        CommentReply::create([
            'comment_id'=>request()->comment_id,
            'user_id'=>request()->user_id,
            'body'=>request()->body,
        ]);
        return back();
    }

    public function update($id)
    {
        CommentReply::find($id)->update(request()->all());
        return back();
    }

    public function delete($id)
    {
        CommentReply::find($id)->delete();
        request()->session()->flash('reply-deleted', 'reply was deleted');
        return back();
    }
}
