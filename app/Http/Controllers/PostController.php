<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|alpha|min:3|max:255',
            'tag' => 'required|alpha|min:3|max:255'
        ]);

        $post = Post::create([
            'name' => $attributes['name']
        ]);

        $post->tags()->create([
            'name' => $attributes['tag']
        ]);

        return to_route('posts.show', $post);
    }

    public function  show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
