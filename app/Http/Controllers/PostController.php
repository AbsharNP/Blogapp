<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{

    public  function addpostpage(){

        return view('addpost');
        
    }

    public function add_post(Request  $request)

    {
        try {
            // Retrieve authenticated user details
            $user = Auth()->user();
            $userid = $user->id;
            $name = $user->name;

            // Create a new Post instance
            $post = new Post;
            $post->title = $request->title;
            $post->content = $request->content;
            $post->poststatus = 'active';
            $post->user_id = $userid;
            $post->username = $name;

            // Handle the image upload
            $image = $request->image;
            if ($image) {
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $image->move('postimage', $imagename);
                $post->image = $imagename;
            }

            $post->save();

           
            return redirect('viewpost')->with('message', 'Post added successfully');
        } catch (Exception $e) {
            
            Log::error('Error adding post: ' . $e->getMessage());

           
            return redirect('addpost')->with('error', 'An error occurred while adding the post. Please try again.');
        }
    }


   

    

    

}