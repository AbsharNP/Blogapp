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
}
