<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
        $title = 'All Posts';

        $query = Post::with('user', 'category')->latest();

        return view('pages.posts.index', [
            'title' => $title,
            'posts' => $query->get()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'title' => $post->title,
            'post' => $post
        ]);
    }

}