<?php

namespace App\Http\Controllers;

use App\Events\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function message(Request $request){
        $user= Auth::user();
        $username= $user->name;
        event(New Message($username, $request->input('message')));
        return[];
    }
}
