<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request, Post $post)
    {
        $validated = $request->validated();

        if (auth()->check()) {
            $comment = new Comment();
            $comment->body = $request->body;
            $comment->user_id = auth()->id(); // Устанавливаем user_id
            $comment->post_id = $post->id; // Устанавливаем post_id
            $comment->save();

            return back()->with('success', 'Comment added successfully!');
        }

        return back()->with('error', 'You must be logged in to comment.');
    }

    public function destroy(Comment $comment){
        $comment->delete();

        return redirect()->back()->with('alert', 'Comment deleted successfully!');
    }
}
