<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class AdminsController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function show()
    {
        $users = User::all();
        $comments = Comment::all();
        $posts = Post::all();
        return view('admin.dashboards.index',[
            'users'=>$users,
            'comments'=>$comments,
            'posts'=>$posts
        ]);
    }
}
