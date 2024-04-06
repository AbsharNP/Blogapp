<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public  function addpostpage(){

        return view('addpost');
        
    }

    public function add_post(Request  $request)
    {
        $user=Auth()->user();
        $userid=$user->id;
        $name=$user->name;
       



        $post= new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->poststatus = 'active';
        $post->content = $request->content;
        $post->user_id = $userid;
        $post->username = $name;


        $image=$request->image;
        if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $image->move('postimage',$imagename);
        $post->image=$imagename;
        }
        $post->save();

        return redirect()->back()->with('message', 'Post added succesfully');
        
    
    }

}