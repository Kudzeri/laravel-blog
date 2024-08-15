<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::OrderBy('created_at', 'desc')->paginate(6);

        return view('posts.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function like(Post $post){
        if (!$post->likes()->where('user_id', auth()->id())->exists()) {
            $post->likes()->create(['user_id' => auth()->id()]);
        }

        return redirect()->back();
    }

    public function unlike(Post $post){
        $post->likes()->where('user_id', auth()->id())->delete();

        return redirect()->back();
    }
}
