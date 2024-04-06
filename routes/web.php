<?php

use App\Http\Controllers\BlogViewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});


// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/blogwrite', function () {
//     return view('blogwrite');
// });

Route::get('/home', function () {
    return view('home');
})-> name('home');
Route::get('/contact', function () {
    return view('contact');
});




Route::get('/viewpost', [BlogViewController::class, 'index'])->name('viewpost');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signupPost'])->name('signup.post');

Route::get('/logout', [AuthController::class, 'logout'])->name( 'logout');

Route::get('/addpost', [PostController::class, 'addpostpage']);
Route::post('/add_post', [PostController::class, 'add_post']);












