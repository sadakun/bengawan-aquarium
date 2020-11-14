<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    public function show(User $user)
    {
        return view('admin.users.profile', [
            'user'=>$user,
            'roles'=>Role::all() 
            
        ]);
    }

    public function update(User $user)
    {
        $inputs = request()->validate([
            'username'=> ['required', 'string', 'max:255', 'alpha_dash'],
            'name'=> ['required', 'string', 'max:255'],
            'last_name'=> ['required', 'string', 'max:255'],
            'email'=> ['required', 'email', 'max:255'],
            'avatar'=> ['file']
        ]);

        if(request('avatar'))
        {
            $image = request()->file('avatar');
            $inputs['avatar'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/avatar');
            $image->move($destinationPath, $inputs['avatar']);
            // $inputs['avatar'] = request('avatar')->store('images');
        }

        $user->update($inputs);
        session()->flash('user-updated', 'user has beed updated');
        return back();
    }

    public function attach(User $user)
    {
        $user->roles()->attach(request('role'));
        return back();
    }

    public function detach(User $user)
    {
        $user->roles()->detach(request('role'));
        return back();
    }

    public function delete(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        session()->flash('user-delete', 'user has beed deleted');
        return back();
    }

    public function author($id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $authors = User::find($id);
        return view('components.blog.posts-author',[
            'categories'=>$categories,
            'tags'=>$tags,
            'authors'=>$authors,
        ]);
        // return dd($authors->posts());
    }
}
