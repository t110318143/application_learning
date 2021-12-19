<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Session;

class PostController extends Controller
{
    //

    public function index(){

        $posts = auth()->user()->posts;



        return view('admin.posts.index',['posts'=>$posts]);
    }


    public function show($id)
    {
        $posts = Post::findOrFail($id);
        return view('blog-post',['posts'=>$posts]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $this->authorize('create',Post::class);

        $inputs=request()->validate([
            'title'=>'required|min:8|max:255',
            'post_image'=>'file',
            'body'=>'required'
        ]);


        if(request('post_image')){
            $inputs['post_image']=request('post_image')->store("images");
        }
        auth()->user()->posts()->create($inputs);

        session()->flash('post-created-message','Post was Created');
        return redirect()->route('post.index');


    }


    public function edit(Post $post)
    {
        $this->authorize('view',$post);

        return view('admin.posts.edit',['post'=>$post]);
    }



    public function destory(Post $post){
        $this->authorize('delete',$post);
        $post->delete();
        Session::flash('message','Post has been deleted !');
        return back();
    }

    public function update(Post $post){
        $inputs=request()->validate([
            'title'=>'required|min:8|max:255',
            'post_image'=>'file',
            'body'=>'required'
        ]);
        if(request('post_image')){
            $inputs['post_image']=request('post_image')->store("images");
            $post->post_image=$inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        $this->authorize('update',$post);

        $post->save();

        session()->flash('post-updeted-message','Post has been Updeted');
        return redirect()->route('post.index');


    }

};
