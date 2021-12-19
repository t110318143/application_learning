<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Role;
use App\Models\Permission;
use Session;
class RoleController extends Controller
{
    public function index(){

        return view('admin.roles.index',[
            'roles'=>Role::all(),
        ]);
    }


    public function store(){

        request()->validate([
            'name'=>['required']
        ]);

        Role::create([
            'name'=>Str::ucfirst(request('name')),
            'slug'=>Str::lower(request('name')),
        ]);
        return back();
    }


    public function edit(Role $role,Permission $permission){

        return view('admin.roles.edit',[
            'role'=>$role,
            'permissions'=>Permission::all(),
        ]);
    }

    public function update(Role $role){
        $role->name = Str::ucfirst(request('name'));
        $role->slug = Str::lower(request('name'));
        $role->save();
        session()->flash('role-updated','Role has been updated ');
        return redirect()->route('roles.index');
    }


    public function attach_permission(Role $role){
        $role->permissions()->attach(request('permission'));
        return back();
    }

    public function detach_permission(Role $role){
        $role->permissions()->detach(request('permission'));
        return back();
    }

    public function destory(Role $role){
        $role->delete();
        Session::flash('role-delete','Role has been deleted');
        return back();
    }


}


