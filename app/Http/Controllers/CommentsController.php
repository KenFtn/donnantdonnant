<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use Auth;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        /* !!!!!!ATTENTION CHANGER LA TABLE USER POUR METTRE UNE VALEUR PAR DEFAUT A NOTE DANS USER : MAJ : EN FAIT PAS SUR ....*/
        $comment = Comment::create([
            'content' => $request->content,
            'author_id' => $request->author_id,
            'user_id' => $request->user_id,
            'note' => $request->note,
        ]);
        $notes = [];        
        $user = User::whereId($request->user_id)->first();
        foreach($user->comments as $comment){
            array_push($notes, intval($comment->note));
        }
        $moyenne = array_sum($notes) / count($notes);
        $user->note = floatval($moyenne);
        $user->save();
        return response()->json($comment);
    }
}
