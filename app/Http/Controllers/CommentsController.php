<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $comment = Comment::create([
            'content' => $request->content,
            'author_id' => $request->author_id,
            'user_id' => $request->user_id,
            'note' => $request->note,
        ]);
        
        return response()->json($comment);
    }
}
