<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Message;
use App\Models\Discussion;

class ConversationController extends Controller
{
    public function index()
    {
        $conversations = User::with('discussions.users')->where('id',Auth::user()->id )->first()->discussions;
        return view('conversations.index', compact('conversations'));
    }

    public function show($id)
    {
        $conversations = User::with('discussions.users')->where('id',Auth::user()->id )->first()->discussions;
        $conv = Discussion::whereId($id)->first();
        return view('conversations.show', compact('conversations', 'conv'));
    }

    public function store(Request $request)
    {
        $message = Message::create([
            'content' => $request->content,
            'author_id' => $request->from,
        ]);

        $message->discussions()->attach($request->to);
        return back();

    }
}
