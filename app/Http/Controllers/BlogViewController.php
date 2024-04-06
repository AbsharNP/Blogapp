<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BlogViewController extends Controller
{
    public function index()
    {
        
        $blogs = DB::table('blogs')->latest()->get();
        $posts = Post::latest()->get();

        $categories = Category::all();
        
    
        return view('viewpost', compact('blogs' , 'posts'));
    }

    
   

}
