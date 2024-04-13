<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class Postcontroller extends Controller
{
    public function createPost(Request $request) {
        $incomingPost = $request->validate([
            'title' => ['required', 'min:3', 'max:500'],
            'body' => ['required', 'min:3', 'max:500'],
        ]);

        $incomingPost['title'] = strip_tags($incomingPost['title']);
        $incomingPost['body'] = strip_tags($incomingPost['body']);
        $incomingPost['user_id'] = auth()->id();
        Post::create($incomingPost);

        return redirect('/');
    }
}
