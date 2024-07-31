<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});
Route::get('/about', function () {
    return view('about', ['nama' => 'Syahrul']);
});
Route::get('/blog', function () {
    return view('blog', ['title' => 'Blog', 'posts' => Post::all()]);
});
Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});


Route::get('/welcome', function () {
    return view('welcome');
});
