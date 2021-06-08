<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Post;
use Illuminate\Http\Request;
use App\User;


class PostController extends Controller
{
    

    public function index() {

        $posts=Post::all();
        
        return view('admin.posts.index', ['posts'=>$posts]);
    }

    public function shoow(Post $post) {

        return view('blog-post', ['post'=>$post]);
    }

    public function create() {
       
        $this->authorize('create', Post::class);
       
        return view('admin.posts.create');
    }




    public function store(Request $request) {

        $this->authorize('create', Post::class);

        $this->validate($request, [
            'title'=>'required',
            'body'=>'required',
            'post_image'=>'image|nullable|max:1999'
        ]);

            if($request->hasFile('post_image')) {
                $filenameWithExt=$request->file('post_image')->getClientOriginalName();
                
                $filename=pathinfo($filenameWithExt, PATHINFO_FILENAME);

                $extension=$request->file('post_image')->getClientOriginalExtension();

                $fileNameToStore=$filename.'_'.time().'.'.$extension;

                $path=$request->file('post_image')->storeAs('public/post_images', $fileNameToStore);
            } else {
                $fileNameToStore='noimage.jpg';
            }

        //Create
        $post=new Post;
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->user_id=auth()->user()->id;
        $post->post_image=$fileNameToStore;
        $post->save();

        return redirect('/admin/posts')->with('success', 'Post Created');
/*
       $inputs=request()->validate([
            'title'=>'required|min:8|max:255',
            'post_image'=>'file',
            'body'=>'required'
       ]);

       if(request('post_image')) {
           $inputs['post_image']=request('post_image')->store('images');
       }
        
       auth()->user()->posts()->create($inputs);

       session()->flash('post-created-message', 'Post with title was Created'. $inputs['title']);

       return redirect()->route('post.index');
*/
    }




    public function edit(Post $post) {

        $this->authorize('view', $post);

        return view('admin.posts.edit', ['post'=>$post]);
    }
    

    public function destroy(Post $post, Request $request) {
        
        $this->authorize('delete', $post);

        $post->delete();
        
        $request->session()->flash('message', 'Post was Deleted');

        return back();
    }


    public function updatee (Request $request, $id) {
       
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required'
        ]);

        
        

            if($request->hasFile('post_image')) {
                $filenameWithExt=$request->file('post_image')->getClientOriginalName();
                
                $filename=pathinfo($filenameWithExt, PATHINFO_FILENAME);

                $extension=$request->file('post_image')->getClientOriginalExtension();

                $fileNameToStore=$filename.'_'.time().'.'.$extension;

                $path=$request->file('post_image')->storeAs('public/post_images', $fileNameToStore);
            } 

        //Create
        $post=Post::find($id);
        $post->title=$request->input('title');
        $post->body=$request->input('body');
    
        if($request->hasFile('post_image')) {
            $post->post_image=$fileNameToStore;
        }

        $this->authorize('update', $post);
       
        $post->save();

        return redirect('/admin/posts');
    }
}
