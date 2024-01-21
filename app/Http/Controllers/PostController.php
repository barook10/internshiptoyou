<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest();

        return view('posts', [
            'posts' => Post::latest()->filter(request(['search']))->get(),
            'categories' => Category::all()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts','slug')],
            'excerpt' => 'required',
            'salary' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $attributes['user_id'] = auth()->id();

        Post::create($attributes);

        return redirect('/');
    }

    public function manage(User $author)
    {
        return view('posts.manage',[
            'posts' => $author->posts
        ]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt' => 'required',
            'body' => 'required',
            'salary' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post->update($attributes);

        return back()->with('success', 'Post updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post Deleted');
    }


}


