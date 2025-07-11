<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});


// Route::get('/blog', function () {
//     return view('blog', ['title' => 'Blog', 'posts' => Post::all()]);
// });

// Route::get('/posts/{post:slug}', function(Post $post){

//     // $post = Post::find($id);

//     return view('post', ['title' => 'Single Post', 'post' =>$post]);
// });

Route::get('/about', function () {
    return view('about', ['nama' => 'Syahrul']);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::resource('/posts', PostController::class);

Route::view('/login', 'auth.login', ['title' => 'Login Page'])->name('login');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/welcome', function () {
    return view('welcome');
});
