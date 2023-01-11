<?php

namespace App\Http\Controllers;

use App\Events\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function message(Request $request){
        event(New Message($request->input('username'), $request->input('message')));
        return[];
    }
}
