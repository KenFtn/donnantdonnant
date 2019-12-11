<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ConversationsController extends Controller{

    public function index(Request $request){
        return response()->jsons([
            'conversations' => $conversations = User::with('discussions.users')->where('id',Auth::user()->id )->first()->discussions,
        ]);
    }





}