<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Postcontroller;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    // $posts = Post::all();
    $posts = [];

    if(auth()->check()){
        $posts = auth()->user()->userPosts()->latest()->get();
    }
    return view('welcome', ['posts' => $posts]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);


// Blog Post routes

Route::post('/create-post', [Postcontroller::class, 'createPost']);
Route::get('/edit-post/{post}', [Postcontroller::class, 'editPost']);
Route::put('edit-post/{post}', [Postcontroller::class, 'updatePost']);
Route::delete('/delete-post/{post}', [Postcontroller::class, 'deletePost']);