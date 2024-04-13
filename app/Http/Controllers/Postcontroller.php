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

    public function editPost(Post $post) {
        if(auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }
        return view('edit-post', ['post' => $post]);
    }

    public function updatePost(Post $post, Request $request){
        if(auth()->user()->id === $post['user_id']){
            $updatedFields = $request->validate([
                'title' => ['required', 'min:3', 'max:500'],
                'body' => ['required', 'min:3', 'max:500'],
            ]);

            $updatedFields['title'] = strip_tags($updatedFields['title']);
            $updatedFields['body'] = strip_tags($updatedFields['body']);

            $post->update($updatedFields);
            return redirect('/');
        }
        return redirect('/');
    }

    public function deletePost(Post $post){
        if(auth()->user()->id === $post['user_id']){
            $post->delete();
        }

        return redirect('/');
    }
}
