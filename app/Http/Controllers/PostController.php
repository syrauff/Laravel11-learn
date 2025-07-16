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

        $query = Post::with('user')->latest();

        // if (request('user')){
        //     $user = User::findOrFail(request('user'));
        //     $query->where('user_id', $user->id);

        //     $title = 'Posts by ' . $user->name;
        // }
        
        return view('posts.index', [
            'title' => $title,
            'posts' => $query->get()
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
            'title' => 'required|max:255',
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
        return view('posts.edit', [
            'title' => 'Edit Blog',
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'image' => 'image|file|max:2048',
            'body' => 'required'
        ];

        $validatedData = $request->validate($rules);

        if ($request->title !== $post->title) {
            $validatedData['slug'] = Str::slug($request->title, '-');
        }

        $post->update($validatedData);

        return redirect('/posts')->with('success', 'Blog post updated successfully!');

    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts')->with('success', 'Blog post deleted successfully!');
    }
}