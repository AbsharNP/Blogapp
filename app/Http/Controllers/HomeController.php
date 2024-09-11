<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth'); // Protects all methods in this controller
    // }
    public function home(){


        return view('home');
    }

    public function mypost()
{
    try {
        return view('mypost');
    } catch (\Exception $e) {
        return redirect()->route('login')->withErrors(['error' => 'Something went wrong. Please log in again.']);
    }
}
    public function viewpost()
    {
        return view( 'viewpost' );
    }
}
