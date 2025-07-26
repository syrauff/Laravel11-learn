<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['nama' => 'Syahrul']);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', function(){return view('dashboard.index');})->name('dashboard.index');
    Route::get('/posts', [App\Http\Controllers\Dashboard\PostController::class, 'index'])->name('dashboard.posts.index');
    Route::post('/posts', [App\Http\Controllers\Dashboard\PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/create', [App\Http\Controllers\Dashboard\PostController::class, 'create'])->name('posts.create');
    Route::get('/posts/{post}/edit', [App\Http\Controllers\Dashboard\PostController::class, 'edit'])->name('dashboard.posts.edit');
    Route::put('/posts/{post}', [App\Http\Controllers\Dashboard\PostController::class, 'update'])->name('dashboard.posts.update');
    Route::delete('/posts/{post}', [App\Http\Controllers\Dashboard\PostController::class, 'destroy'])->name('dashboard.posts.destroy');

    Route::get('/categories', [App\Http\Controllers\Dashboard\CategoryController::class, 'index'])->name('dashboard.categories');
    Route::post('/categories', [App\Http\Controllers\Dashboard\CategoryController::class, 'store'])->name('dashboard.categories.store');
    Route::put('/categories/{category}', [App\Http\Controllers\Dashboard\CategoryController::class, 'update'])->name('dashboard.categories.update');
    Route::delete('/categories/{category}', [App\Http\Controllers\Dashboard\CategoryController::class, 'destroy'])->name('dashboard.categories.destroy');

});    

Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('pages.posts.index');
// Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::get('/posts/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');


Route::get('/test-upload', fn() => view('test-upload'));
Route::post('/test-upload', fn(Illuminate\Http\Request $request) => dd($request->all()))->name('test.upload');

// Route::resource('/posts', PostController::class);

Route::get('users/{user:name}', function (User $user) {
    return view('posts.index', [
        'title' => "Posts by $user->name",
        'posts' => $user->posts
    ]);
})->name('user.posts');

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/welcome', function () {
    return view('welcome');
});
