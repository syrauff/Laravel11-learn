<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $title = 'Your Posts';

        $posts = Auth::user()->posts;

        return view('dashboard.posts.index', [
            'title' => $title,
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('posts.create', [
            'title' => 'Create Blog',
        ]);
    }

    public function store(Request $request)
    {
        try {
        // dd($request->all());
        $validatedData = $request->validate([
            'title' => 'required|max:255|unique',
            'image' => 'nullable|image|file|max:2048',
            'body' => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['slug'] = Str::slug($request->title, '-');
        $validatedData['user_id'] = auth()->id();

        Post::create($validatedData);

        return redirect('/posts')->with('success', 'New blog post created successfully!');
        } catch (\Exception $e) {
            return redirect('/posts/create')->withErrors(['error' => 'Failed to create post: ' . $e->getMessage()]);
        }
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'title' => $post->title,
            'post' => $post
        ]);
    }

    public function edit(Post $post)
    {

        return view('dashboard.posts.edit', [
            'title' => 'Edit Blog',
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'image' => 'image|file|max:2048',
            'body' => 'required'
        ];

        $validatedData = $request->validate($rules);

        if ($request->title !== $post->title) {
            $validatedData['slug'] = Str::slug($request->title, '-');
        }

        $post->update($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Blog post updated successfully!');

    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts')->with('success', 'Blog post deleted successfully!');
    }
}
