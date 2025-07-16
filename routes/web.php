<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::middleware('auth')->group(function () {
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});    

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
// Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');


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
