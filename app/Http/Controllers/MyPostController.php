<?php

namespace App\Http\Controllers;

use App\Models\post;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MyPostController extends Controller
{

    

    public function index()
    {
        if (Auth::check()) {
            $posts = Post::where('username', Auth::user()->name)->latest()->get();
            return view('mypost', compact('posts'));
        } else {
            return redirect()->route('login');
        }
    }

    public function edit_post($id){

        if (Gate::allows('edit-post', $id)) {
            $post = Post::find($id);
            return view('editpost', compact('post'));
        }
    
        return redirect()->back()->with('error', 'Unauthorized action.');

        // abort(403, 'Unauthorized action.');

    }

    public function update_post(Request $request,$id){

        $post=Post::find($id);

        $post->title = $request->title;
        $post->content = $request->content;

        $image=$request->image;
        if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $image->move('postimage',$imagename);
        $post->image=$imagename;
        } 
        $post->save();
        return redirect('mypost')->with('message', 'Post added succesfully');
    }
    public function remove($id){
        $post=Post::find($id);
        $post->delete();
        return redirect()->back();

    }
}
