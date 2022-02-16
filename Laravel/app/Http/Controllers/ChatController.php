<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\Message;

class ChatController extends Controller
{
    public function message(Request $reaquest){
        
        event(new Message($reaquest->input('username'),$reaquest->input('message')));

        return [];
    }
}
