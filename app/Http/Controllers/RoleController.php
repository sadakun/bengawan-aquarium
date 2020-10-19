<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.roles.index',['roles'=>Role::all()]);
    }

    public function store()
    {
        request()->validate([
            'name'=>['required']
        ]);
        Role::create([
            'name'=>Str::ucfirst(request('name')),
            'slug'=>Str::of(Str::lower(request('name')))->slug('-'),
        ]);
        return back();
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit',[
            'role'=>$role,
            'permissions'=>Permission::all()
        ]);
    }

    public function update(Role $role)
    {
        $role->name= Str::ucfirst(request('name'));
        $role->slug= Str::of(Str::lower(request('name')))->slug('-');

        ##isDirty mean if the model has been edited since it was queried from the database, or isn't saved at all
        ##That means the role has been edited, else codes here will not be executed
        if($role->isDirty('name'))
        {
            session()->flash('role-updated', $role->name. ' '. 'role updated');
            $role->save();
        } else {
            session()->flash('role-updated', 'nothing has been updating');
        }
        
        return redirect()->route('roles.index');

        return view('post',['']);
    }

    public function delete(Role $role)
    {
        $role->delete();
        session()->flash('role-deleted', $role->name. ' '. 'role deleted');
        return back();
    }

    public function attach_permission(Role $role)
    {
        $role->permissions()->attach(request('permission'));
        return back();
    }

    public function detach_permission(Role $role)
    {
        $role->permissions()->detach(request('permission'));
        return back();
    }
}
