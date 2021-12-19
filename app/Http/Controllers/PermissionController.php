<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Support\Str;
use Session;
class PermissionController extends Controller
{
    public function index(){
        return view('admin.permissions.index',[
            'permissions'=>Permission::all()
        ]);
    }

    public function store(){
        request()->validate([
            'name'=>['required']
        ]);

        Permission::create([
            'name'=>Str::ucfirst(request('name')),
            'slug'=>Str::lower(request('name')),
        ]);
        return back();
    }

    public function edit(Permission $permission){

        return view('admin.permissions.edit',[
            'permissions'=>$permission
        ]);
    }


    public function update(Permission $permission){
        $permission->name = Str::ucfirst(request('name'));
        $permission->slug = Str::lower(request('name'));
        $permission->save();
        session()->flash('permission-updated','Permission has been updated ');
        return redirect()->route('permissions.index');
    }




    public function destory(Permission $permission){
        $permission->delete();
        Session::flash('permission-delete','Permission has been deleted');
        return back();
    }


}
