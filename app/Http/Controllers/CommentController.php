<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\comment;
use App\Models\post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
   


    public function store(Request $request, $id)
    {
        
            $post = Post::find($id);
            $user=Auth()->user();
            $userid=$user->id;
            $name=$user->name;

        
            $comment = new Comment();
            $comment->comment = $request->input('comment');
            $comment->post_id = $id; // Assuming you have a 'post_id' column in your 'comments' table
            $comment->user_id = $userid;
            $comment->username = $name;
            $comment->save();
        
            return redirect()->back(); // Redirect back to the previous page after adding the comment
        
    }

    public function index($id,)
{
    $post = Post::find($id);

    $comments = Comment::where('post_id', $id)->get();


    return view('post', compact('comments'));
}





}
