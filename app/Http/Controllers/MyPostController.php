<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MyPostController extends Controller
{
    public function index()
    {
        $posts = Post::where('username', Auth::user()->name)->latest()->get();

        return view('mypost', compact( 'posts'));
        
    }

    public function edit_post($id){

        $post=Post::find($id);
        return view('editpost',compact('post'));

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
