<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Jobs\ProcessComment;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request, Post $post)
    {
        $validated = $request->validated();

        if (auth()->check()) {
            $data = [
                'body' => $validated['body'],
                'user_id' => auth()->id(),
                'post_id' => $post->id,
            ];

            ProcessComment::dispatch($data);

            return back()->with('success', 'Comment added successfully!');
        }

        return back()->with('error', 'You must be logged in to comment.');
    }

    public function destroy(Comment $comment){
        $comment->delete();

        return redirect()->back()->with('alert', 'Comment deleted successfully!');
    }
}
