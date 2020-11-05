<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index',['categories'=>Category::all()]);
    }

    public function store()
    {
        
        request()->validate([
            'name'=>['required']
        ]);
        Category::create([
            'name'=>Str::ucfirst(request('name'))
        ]);
        session()->flash('category-created', 'category was created');
        return back();
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit',['category'=>$category]);
    }

    public function update(Category $category)
    {
        $category->name= Str::ucfirst(request('name'));

        ##isDirty mean if the model has been edited since it was queried from the database, or isn't saved at all
        ##That means the role has been edited, else codes here will not be executed
        if($category->isDirty('name'))
        {
            session()->flash('category-updated', $category->name. ' '. 'category updated');
            $category->save();
        } else {
            session()->flash('category-updated', 'nothing has been updating');
        }
        
        return redirect()->route('categories.index');

        return view('category',['']);
    }

    public function delete(Category $category)
    {
        $category->delete();
        session()->flash('category-deleted', $category->name. ' '. 'category deleted');
        return back();
    }

    public function show($slug)
    {
        $categories = Category::paginate(4);
        $categories2 = Category::findBySlug($slug);
        $tags = Tag::all();
        return view('components.blog.posts-category',[
            'categories'=>$categories,
            'categories2'=>$categories2,
            'tags'=>$tags,
        ]);
    }
}
