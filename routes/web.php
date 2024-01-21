<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;



Route::get('/', [PostController::class, 'index']);

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('categories/{category:slug}', function (Category $category) {

    return view('posts', [
        'posts' => $category->posts()->latest()->get(),
        'categories' => Category::all()
    ]);
});

Route::get('authors/{author:username}', function (User $author){

    return view('posts', [
        'posts' => $author->posts()->latest()->get(),
        'categories' => Category::all()
    ]);
});

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');

Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');

Route::post('login', [SessionController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('create', [PostController::class, 'create'])->middleware('auth');

Route::post('create', [PostController::class, 'store'])->middleware('auth');

Route::get('manage/{author:username}', [PostController::class, 'manage'])->middleware('auth');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->middleware('auth');

Route::patch('/posts/{post}', [PostController::class, 'update'])->middleware('auth');

Route::delete('posts/{post}', [PostController::class, 'destroy'])->middleware('auth');

