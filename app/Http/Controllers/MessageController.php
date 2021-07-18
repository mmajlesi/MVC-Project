<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;

class MessageController extends Controller
{
    public function addMessage(Request $request)
    {
        $message =  Message::create(['text' => $request->text, 'sender' => $request->sender, 'receiver' => $request->receiver, 'chat_id' => $request->chatId]);
        return ['message' => $message];
    }
    public function getChat($advertisement)
    {
        $chat = Chat::where([['buyer', Auth::user()->id], ['advertisement_id', $advertisement->id]])
            ->orWhere([['advertiser', Auth::user()->id], ['advertisement_id', $advertisement->id]])->get();

        return $chat;
    }
    public function getMessages(Chat $chat)
    {

        $chatMessage = $chat->load(['messages.user']);
        return view('messenger', ['chatMessage' => $chatMessage]);
    }
}
