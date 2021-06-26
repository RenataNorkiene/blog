<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function addComment(Post $post){
        Comment::create([
            'comment' => request('body'),
            'post_id' => $post->id,
            'user_id' => Auth::id()
        ]);

        return back();
    }
}
