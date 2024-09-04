<?php

use App\Http\Controllers\BlogViewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyPostController;
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
// Route::get('/mypost', function () {
//     return view('mypost');
// });

Route::get('/home',[HomeController::class ,'home']);
Route::get('/mypost',[HomeController::class ,'mypost']);
Route::get('/viewpost',[HomeController::class ,'viewpost']);

Route::get('/viewpost', [BlogViewController::class, 'index'])->name('viewpost');
Route::get('/mypost', [MyPostController::class, 'index'])->name('mypost');


Route::get('/edit_post/{id}', [MyPostController::class, 'edit_post']);
Route::post('/update_post/{id}', [MyPostController::class, 'update_post']);

Route::get('/delete/{id}', [MyPostController::class, 'remove']);



Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signupPost'])->name('signup.post');

Route::get('/logout', [AuthController::class, 'logout'])->name( 'logout');

Route::get('/addpost', [PostController::class, 'addpostpage']);
Route::post('/add_post', [PostController::class, 'add_post']);

Route::get('/post/{id}', [PostController::class, 'show']);











